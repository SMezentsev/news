<?php
namespace frontend\controllers;

use common\models\NewsCategory;
use common\models\Search\NewsSearch;
use Yii;
use yii\web\Controller;
use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\NotFoundHttpException;
use common\models\News;
use common\models\Tags;

/**
 * Site controller
 */
class NewsController extends Controller {

  public $layout = "main";
  public $bodyClass = 'template-index';

  public function init() {
    parent::init();
    $this->bodyClass = 'template-collection';
  }

  /**
   * {@inheritdoc}
   */
  public function actions() {

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

  public function actionView($category_id, $id) {

    if($model = $this->findModel($id)) {

      $model->views += 1;
      $model->save();
      $categories = NewsCategory::find()->all();
      $category = NewsCategory::findOne($category_id);

      $breadCrumbs = [];
      $breadCrumbs[] = [
        'url' => '/news',
        'name' => 'Новости'
      ];

      $breadCrumbs[] = [
        'url' => '/news/'.$category->id,
        'name' => $category->name
      ];

      $this->view->title = $category->name.': '.$model->title;
      $this->view->registerMetaTag(['name' => 'keywords', 'content' => $category->name.' '.$model->title]);
      $this->view->registerMetaTag(['name' => 'description', 'content' => $category->name.' '.$model->announce]);

      return $this->render('view', [
        'breadCrumbs' => $breadCrumbs,
        'categories' => $categories,
        'category' => $category,
        'model' => $model
      ]);
    }

    return $this->redirect(['/']);
  }

  public function actionIndex($category_id = null, $tag_id = null) {

    $category = NewsCategory::find()->where(['id' => $category_id])->one();
    $news = new NewsSearch();
    $news = $news->search(Yii::$app->request->queryParams);

    Yii::$app->params['category'] = $category;
    if($tag_id) {
      Yii::$app->params['tags'] = [
        'tags' => Tags::find()->all(),
        'current' => $tag_id
      ];
    }

    return $this->render('index',[
      'category' => $category,
      'mode' => $tag_id ? 'tags' : 'news',
      'category_id' => $category_id,
      'news' => $news->getModels(),
    ]);
  }

  private function findModel($id)
  {

    if (!$model = News::find()->where(['id' => $id])->one()) {
      throw new NotFoundHttpException(Yii::t('app', 'Не найдена новость с id={id}', ['id' => $id]));
    }
    return $model;
  }
}
