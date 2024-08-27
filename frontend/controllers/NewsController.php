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
use yii\helpers\ArrayHelper;
use yii\data\Pagination;

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
      $newsModel = new NewsSearch();

      $breadCrumbs = [];
      $breadCrumbs[] = [
        'url' => '/news',
        'name' => 'Новости'
      ];

      $breadCrumbs[] = [
        'url' => '/news/'.$category->id,
        'name' => $category->name
      ];

      $newsCycles = false;
      if($model->news_cycle_id) {

        $newsCycles = $newsModel->search(['notIn' => [$model->id], 'news_cycle_id' => $model->news_cycle_id]);
      }
      //$this->view->title = $category->name.': '.$model->title;
//      $this->view->registerMetaTag(['name' => 'keywords', 'content' => $category->name.' '.$model->title]);
//      $this->view->registerMetaTag(['name' => 'description', 'content' => $category->name.' '.$model->announce]);
      $this->view->title = $model->keywords->meta_tag_keywords??$category->name.': '.$model->title;
      $this->view->registerMetaTag(['name' => 'keywords', 'content' => $model->keywords->meta_tag_keywords??'']);
      $this->view->registerMetaTag(['name' => 'description', 'content' => $model->keywords->meta_tag_description??'']);

      return $this->render('view', [
        'breadCrumbs' => $breadCrumbs,
        'categories' => $categories,
        'category' => $category,
        'model' => $model,
        'newsCycles' => $newsCycles ? $newsCycles->getModels() : false
      ]);
    }

    return $this->redirect(['/']);
  }

  public function actionIndex($category_id = null, $tag_id = null) {

    $category = NewsCategory::find()->where(['id' => $category_id])->one();
    $newsModel = new NewsSearch();
    $news = $newsModel->search(Yii::$app->request->queryParams);

    $newsIds = [];
    foreach ($news->getModels() as $item) {

      $newsIds[] = $item->id;
    }

    $popular = $newsModel->search(ArrayHelper::merge(Yii::$app->request->queryParams, ['notIn' => $newsIds]));

    Yii::$app->params['category'] = $category;
    if($tag_id) {
      Yii::$app->params['tags'] = [
        'tags' => Tags::find()->all(),
        'current' => $tag_id
      ];
    }

    $pages = new Pagination([
      'totalCount' => $news->totalCount,
      'forcePageParam' => false,
    ]);

    return $this->render('index',[
      'category' => $category,
      'mode' => $tag_id ? 'tags' : 'news',
      'category_id' => $category_id,
      'news' => $news->getModels(),
      'popular' => $popular->getModels(),
      'pages' => $pages,
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
