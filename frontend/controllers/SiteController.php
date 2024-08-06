<?php

namespace frontend\controllers;

use common\models\Faq;
use common\models\ProductProperty;
use common\models\Search\ProductsSearchArrayProvider;
use frontend\models\ContactForm;
use frontend\models\OrderForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use common\models\Products;
use common\models\Tree;
use yii\helpers\Html;
use common\components\Catalog;
use common\Exceptions\ValidationErrorException;
use common\models\Property;
use common\models\Pages;
use frontend\components\CatalogHeader\CatalogHeaderWidget;

/**
 * Site controller
 */
class SiteController extends Controller
{

  public $bodyClass = 'index';
  public $loginFormModel;
  public $categories = [];
  public $catalog = [];

  public static function allowedDomains()
  {
    return [
      '*',
      'http://admin',
      'http://admin/user/update/1',
      'http://theme/',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {

    return [
      'corsFilter' => [
        'class' => \yii\filters\Cors::className(),
        'cors' => [
          // restrict access to domains:
          'Origin' => static::allowedDomains(),
          'Access-Control-Request-Method' => ['POST', 'GET', 'OPTIONS', 'DELETE'],
          'Access-Control-Allow-Credentials' => false,
          'Access-Control-Max-Age' => 3600,
          'Access-Control-Allow-Origin' => true,
        ],
      ],
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
          'contacts' => ['post','get'],
        ],
      ],
    ];
  }

  public function init()
  {

    CatalogHeaderWidget::widget();

    $this->loginFormModel = new LoginForm();
    $catalog = new Catalog();
    $this->bodyClass = 'index';
    $this->catalog = $catalog->getCatalog();

    parent::init();
  }

  /**
   * {@inheritdoc}
   */
  public function actions()
  {

    return [
      'error' => [
        'class' => 'yii\web\ErrorAction',
      ],
      'captcha' => [
        'class' => 'yii\captcha\CaptchaAction',
        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
      ],
    ];
  }

  public function actionIndex()
  {



    return $this->render('index', [

    ]);
  }

  public function actionAbout()
  {

    $page = Yii::$app->pages->get(Pages::PAGE_ABOUT);

    return $this->render('_blank', [
      'title' => $page->name,
      'content' => $page->text,
    ]);
  }

  public function actionTerms()
  {

    $page = Yii::$app->pages->get(Pages::PAGE_TERMS);

    return $this->render('_blank', [
      'title' => $page->name,
      'content' => $page->text
    ]);
  }

  public function actionFaqs()
  {

    $faq = new Faq();
    $faq = $faq->find()->all();

    return $this->render('faqs', [
      'model' => $faq
    ]);
  }

  public function actionContacts()
  {

    $params = Yii::$app->request->bodyParams;
    $model = new ContactForm();
    $send = false;

    if(Yii::$app->request->isPost) {

      if (!empty($params) && $model->load($params) && $model->validate()) {

        if($model->sendEmail()) {

          $send = true;
        }
      }
    }

    return $this->render('contacts', [
      'model' => $model,
      'content' => Yii::$app->pages->getContent(Pages::PAGE_CONTACTS),
      'send' => $send
    ]);
  }

  public function beforeAction($action)
  {

    if (in_array($action->id, ['contacts'])) {
      $this->enableCsrfValidation = false;
    }
    return parent::beforeAction($action);
  }

}
