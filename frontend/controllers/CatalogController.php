<?php

namespace frontend\controllers;

use api\modules\regular\components\Order;
use common\models\CategoryNestedSets;
use common\models\Forms\OrderForm\OrderFormExtended;
use common\models\Forms\OrderForm\OrderFormFactory;
use common\models\Search\ProductsSearchArrayProvider;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\RegisterForm;
use frontend\models\ContactForm;
use frontend\models\News;
use common\models\User;
use common\models\Products;
use common\models\Tree;
use yii\helpers\Html;
use yii\base\Module;
use yii\helpers\ArrayHelper;
use common\models\UserFavorites;
use common\components\Catalog;
use common\models\Brands;
use common\models\Search\ProductsSearch;
use common\models\Property;
use common\models\ProductProperty;

use common\models\ProductStockBalance;

/**
 * Site controller
 */
class CatalogController extends Controller
{

  public $bodyClass = 'index';
  public $loginFormModel;
  public $categories = [];
  public $catalog = [];

  /**
   * @var Request
   */
  public $request;

  public function __construct(
    $id,
    Module $module,
    array $config = []
  )
  {
    $this->request = Yii::$app->request;
    parent::__construct($id, $module, $config);
  }

  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {

    return [

      'access' => [
        'class' => AccessControl::className(),
        'only' => ['logout', 'signup'],
        'rules' => [
          [
            'actions' => ['signup'],
            'allow' => true,
            'roles' => ['?'],
          ],
          [
            'actions' => ['logout'],
            'allow' => true,
            'roles' => ['@'],
          ],
        ],
      ],
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'logout' => ['post'],
          'view' => ['post', 'get'],
        ],
      ],
    ];
  }

  public function beforeAction($action)
  {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
  }


  public function init()
  {

    $this->loginFormModel = new LoginForm();
    $this->bodyClass = 'index';
    $roots = Tree::find()->where(['lvl' => 0])->addOrderBy('root, lft')->all();
    $this->categories = $this->getFullTreeStructure($roots);
    $this->catalog = new Catalog();

    parent::init();
  }

  public static function getCatalogTree(array $categories = [])
  {
    $tree = [];
    foreach ($categories as $index => $category) {
      if ($category->id == $index) {
        return $category;
      }
    }
    return $tree;
  }

  public static function getTree($categories, $left = 0, $right = null, $lvl = 1)
  {

    $tree = [];

    foreach ($categories as $index => $category) {
      if ($category->lft >= $left + 1 && (is_null($right) || $category->rgt <= $right) && $category->lvl == $lvl) {
        $count = 0;
        if ($lvl == 2) {
          $count = Products::find()->select('count(id)')->where(['category_id' => $category->id])->scalar();
        }

        $tree[$category->id] = [
          'id' => $category->id,
          'count' => $count,
          'label' => $category->name,
          'items' => self::getTree($categories, $category->lft, $category->rgt, $category->lvl + 1),
        ];
      }
    }

    return $tree;
  }

  public static function getFullTreeStructure($roots)
  {

    $tree = [];
    foreach ($roots as $root) {

      $tree [$root->id] = [
        'id' => $root->id,
        'label' => $root->name,
        'items' => self::getTree($root->children()->all()),
      ];
    }
    return $tree;
  }

  public function actionFavorites()
  {

    $breadCrumbs = [];
    $breadCrumbs[] = [
      'url' => '',
      'name' => 'Избранное'
    ];

    return $this->render('view', [
      'favorites' => UserFavorites::find()->where(['user_id' => Yii::$app->user->identity->id])->all(),
      'breadCrumbs' => $breadCrumbs
    ]);
  }

  public function actionProduct(int $category_id = null, int $id = null)
  {

    $params = $this->request->queryParams;
    $searchModel = new ProductsSearchArrayProvider();
    $dataProvider = $searchModel->search($params ?? []);


  }

  public function actionView(int $category_id = null, int $id = null)
  {

    $params = $this->request->queryParams;
    $searchModel = new ProductsSearchArrayProvider();
    $model = $searchModel->search($params ?? [], 'model');

    if(Yii::$app->request->isAjax) {

      return json_encode($model);
    }

    $breadCrumbs = [];
    $catalogComponent = new Catalog();
    $parent = null;


    if ($category_id) {
      $category = Tree::findOne($category_id);
      $parent = $category->parents(2)->one();
    }

    $catalog = $catalogComponent->getCatalog($category_id) ?? [];
    $category = $catalogComponent->getCatalogCategory();

    $breadCrumbs = $this->catalog->getCatalogBreadCrumbs();
    $stock = ProductStockBalance::find()->where(['product_id' => $id])->one();

    $cartForm = OrderFormFactory::get(isset($model['colors']) && count($model['colors']) ? OrderFormFactory::CART_EXTENDED : '');

    if($model ) {

      $product = Yii::$app->cart->getItem($model['id']);
      $cartForm->id = $model['id']??0;
      $cartForm->quantity = $product ? $product->getQuantity() : 1;
      if($cartForm instanceof OrderFormExtended) {
        $cartForm->color_id = $model['colors'][0]['id']??0;
        $cartForm->size_id = $model['colors'][0]['sizes'][0]['id']??0;
      }
    }

    return $this->render('view-full', [
      'product' => $model,
      'categories' => isset($parent) ? $this->categories[$parent->id]['items'] : [],
      'breadCrumbs' => $breadCrumbs,
      'catalog' => $catalog['parent'],
      'category' => $category,
      'stock' => $stock??[],
      'cartForm' => $cartForm
    ]);

  }

  public function actionSearch(int $category_id = null)
  {


  }

  public function actionIndex(int $category_id = null)
  {

    $filters = [];
    $catalogComponent = new Catalog();
    $params = $this->request->queryParams;

    $parents = $catalogComponent->getParents(); //children
    $catalog = $catalogComponent->getCatalog($category_id) ?? [];
    $breadCrumbs = $catalogComponent->getCatalogBreadCrumbs();
    $lvl = $catalogComponent->getCategoryLvl($category_id);
    $category = $catalogComponent->getCatalogCategory();

    if($catalog && !count($catalog['sub'])) {

      $catalog = $catalogComponent->getCatalog($parents['parent']['id']) ?? [];
    }

    switch ($lvl) {

      case Tree::LVL_ZERO:

        if($children = $catalog['sub']??false) {

          $params['categoryIds'] = $children;
        }

        $searchModel = new ProductsSearchArrayProvider();
        $dataProvider = $searchModel->search($params ?? []);
        $cartForm = OrderFormFactory::get();

        return $this->render('products', [
          'dataProvider' => $dataProvider,
          'catalog' => $catalog['parent'],
          'filters' => $filters??[],
          'sub' => $catalog['sub'],
          'category' => $category,
          'lvl' => $catalogComponent->getCategoryLvl($category['id']),
          'breadCrumbs' => $breadCrumbs,
          'cartForm' => $cartForm
        ]);

      case Tree::LVL_ONE:
      case Tree::LVL_TWO:

        $searchModel = new ProductsSearchArrayProvider();
        $dataProvider = $searchModel->search($params ?? []);
        $products = $dataProvider->getModels();

        $from = 0;
        $to = 0;
        if($prices = Products::getProductsPrices($params['category_id'])) {
          $from = min(ArrayHelper::map($prices, 'id', 'price'));
          $to = max(ArrayHelper::map($prices, 'id', 'price'));
        }

        $filters = [
          [
            'id' => uniqid(),
            'items' => ArrayHelper::toArray(Products::getProductsBrands($params['category_id']??'')),
            'value' => $params['brands'] ?? 0,
            'type' => 'checkbox',
            'field' => 'brands',
            'title' => 'Бренд'
          ],
          [
            'id' => uniqid(),
            'items' => ArrayHelper::toArray(Products::getProductsManufacturers($params['category_id']??'')),
            'value' => $params['manufacturers'] ?? 0,
            'type' => 'checkbox',
            'field' => 'manufacturers',
            'title' => 'Производитель'
          ],
          [
            'id' => uniqid(),
            'type' => 'slider',
            'field' => 'price',
            'max' => 20000, //max(ArrayHelper::map($products, 'id', 'price')),
            'min' => 0, //min(ArrayHelper::map($products, 'id', 'price')),
            'from' => $params['price_from'] ?? $from,
            'to' => $params['price_to'] ?? $to,
            'title' => 'Цена'
          ],
        ];

        $cartForm = OrderFormFactory::get();

        return $this->render('products', [
          'dataProvider' => $dataProvider,
          'catalog' => $catalog['parent'],
          'filters' => $filters,
          'sub' => $catalog['sub'],
          'category' => $category,
          'lvl' => $catalogComponent->getCategoryLvl($category['id']),
          'breadCrumbs' => $breadCrumbs,
          'cartForm' => $cartForm
        ]);

    }
  }

  private function findModel($id)
  {
    if (!$model = Tree::findOne($id)) {
      throw new NotFoundHttpException(Yii::t('app', 'Не найдена категория с id={id}', ['id' => $id]));
    }

    return $model;
  }
}
