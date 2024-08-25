<?php

namespace frontend\controllers;

use common\models\Faq;
use common\models\Search\NewsSearch;
use frontend\models\ContactForm;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\components\Catalog;
use common\models\NewsCategory;
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

    $news = new NewsSearch();
    $news = $news->search(Yii::$app->request->queryParams);

    $pages = new Pagination([
      'totalCount' => $news->totalCount,
      'forcePageParam' => false,
    ]);

    return $this->render('index', [
      'news' => $news->getModels(),
      'pages' => $pages,
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


  public function actionSitemap()
  {
    Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
    Yii::$app->response->headers->add('Content-Type', 'text/xml');
    $categories = NewsCategory::find()->where(['!=', 'parent_id', 0])->all();
    return $this->renderPartial('sitemap', ['categories' => $categories]);
  }

  public function beforeAction($action)
  {

    if (in_array($action->id, ['contacts'])) {
      $this->enableCsrfValidation = false;
    }
    return parent::beforeAction($action);
  }

}
