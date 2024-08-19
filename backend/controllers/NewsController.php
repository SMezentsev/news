<?php

namespace backend\controllers;

use common\models\Files;
use phpseclib3\File\ASN1\Maps\RelativeDistinguishedName;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\News;
use common\models\NewsTags;
use common\models\NewsGallery;
use common\models\Tags;
use yii\web\UploadedFile;
use common\components\Services\ImageService;


class NewsController extends Controller
{

  protected $imageService;

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

  public function actionUpdate($id)
  {

    $model = new News();
    $model = $model->find()->where(['id' => $id])->one();


    if ($model && $model->load(Yii::$app->request->post())) {

      //Удаляем
      Yii::$app
        ->db
        ->createCommand()
        ->delete('news_tags', ['news_id' => $model->id])
        ->execute();

      if($model->news_tags) {

        foreach ($model->news_tags as $key=>$item) {
          $tags = new NewsTags([
            'news_id' => $model->id,
            'tag_id' => $item
          ]);
          $tags->save();
        }
      }

      if ($newTags = $model->new_tag ?? false) {

        $tags = new Tags();
        $newTags = explode(',', str_replace(' ', '', $newTags));

        foreach ($newTags as $key => $item) {

          if ($tag = $tags->find()->where(['name' => $item])->one()) {

          } else {
            $tag = new Tags(['name' => $item]);
            $tag->save();
          }

          $newsTags = new NewsTags([
            'tag_id' => $tag->id,
            'news_id' => $model->id
          ]);
          $newsTags->save();
        }
      }
      $model->save();
    }


    if ($newsTags = NewsTags::find()->where(['news_id' => $model->id])->all()) {

      foreach ($newsTags as $item) {

        $tags = Tags::find()->where(['id' => $item->tag_id])->one();
        $tagsArray[] = $tags;
      }
      $model->news_tags = $tagsArray;
    }

    return $this->render('_update_news', [
      'model' => $model,
      'files' => $model->getFiles()->all(),
    ]);
  }

  public function actionUpdateFiles($id)
  {

    $model = News::find()->where(['id' => $id])->one();

    if (Yii::$app->request->isPost) {

      if ($id && $model->load(Yii::$app->request->post())) {

        if ($model->save() && isset($_FILES[ucfirst(Yii::$app->controller->id)]['tmp_name']['file']) && !empty($_FILES[ucfirst(Yii::$app->controller->id)]['tmp_name']['file'])) {

          $files = new Files();
          $path = \Yii::getAlias('@newsImages') . '/' . $model->id;
          $path_to_save = '/images/' . Yii::$app->controller->id . '/' . $model->id;
          $file_path = $_FILES[ucfirst(Yii::$app->controller->id)]['tmp_name']['file'];

          if (!empty($file_path)) {

            $fileModel = $files->saveFiles([
              'table_name' => Yii::$app->controller->id,
              'table_id' => $model->id,
              'file_path' => $file_path,
              'file_name' => ucfirst(Yii::$app->controller->id) . '[file]',
//        'file_name' => $_FILES[ucfirst(Yii::$app->controller->id)]['name']['file'][0],
              'path' => $path,
              'path_to_save' => $path_to_save,
            ], ['width' => 250, 'height' => 250]);

            $this->imageService = new ImageService();
            //$imagePath = Yii::$app->params['imageUrl'] . $imagePath;
            $imagePath = $_SERVER['DOCUMENT_ROOT'] . $fileModel->original;
            $imagePath = str_replace('backend', 'frontend', $imagePath);

            if ($this->imageService->isFile($imagePath)) {

              $fileInfo = $this->imageService->imageInfo($imagePath);

              //готовим путь для временного файла для хранения промежуточного варианта jpg
              $tmpDestination = $this->imageService->imagePath($fileInfo['dirname'], $fileInfo['extension']);

              $this->imageService->resize($imagePath, $tmpDestination, [
                'size' => [340, 170],
                'quality' => 80
              ]);

              $size = $this->imageService->size($tmpDestination);
              $destination1 = $this->imageService->imagePath($fileInfo['dirname'], $fileInfo['extension']);

              //вырезаем прямоугольник посредине изображения для последующего ресайза в
              $this->imageService->cropThumbnail($tmpDestination, $destination1, [
                'size' => [160, 160],
                'src_x' => ($size[0] - 160) / 2,
                'quality' => 80
              ]);

              $path = str_replace('backend', 'frontend', $destination1);
              $path = substr($path, strlen($_SERVER['DOCUMENT_ROOT']) + 1);
              $fileModel['resize_image1'] = $path;
              $fileModel->save(false);


              $size = $this->imageService->size($tmpDestination);
              $destination2 = $this->imageService->imagePath($fileInfo['dirname'], $fileInfo['extension']);

              //вырезаем прямоугольник посредине изображения для последующего ресайза в
              $this->imageService->cropThumbnail($tmpDestination, $destination2, [
                'size' => [340, 170],
                'src_x' => ($size[0] - 340) / 2,
                'quality' => 80
              ]);

              $path = str_replace('backend', 'frontend', $destination2);
              $path = substr($path, strlen($_SERVER['DOCUMENT_ROOT']) + 1);

              $fileModel['resize_image2'] = $path;
              $fileModel->save(false);
            }
          }
        }
      }

      return $this->redirect('/news/' . $id . '/update-files');

    }

    $dataProvider = new ActiveDataProvider([
      'query' => $model->getFiles(),
      'pagination' => [
        'pageSize' => 15
      ]
    ]);

    return $this->render('_update_files', [
      'searchModel' => $model,
      'dataProvider' => $dataProvider,
      'total' => $total ?? [],
      'model' => $model
    ]);

  }

  public function actionCreate()
  {

    $model = new News();
    if ($model->load(Yii::$app->request->post()) && $model->save()) {

      return $this->redirect('/news/' . $model->id);
    }

    return $this->render('_update_news', [
      'model' => $model
    ]);
  }

  public function actionGallery($news_id, $file_id) {


    $file = NewsGallery::find()->where(['news_id' => $news_id, 'file_id' => $file_id])->one();
    if(!$file) {
      $file = new NewsGallery([
        'news_id' => $news_id,
        'file_id' => $file_id
      ]);
      $file->save();
    } else {
      $file->delete();
    }

    Yii::$app->getResponse()->setStatusCode(204);
  }

  public function actionIndex()
  {

    $searchModel = new News();
    $query = $searchModel->find()->orderBy('date DESC');
    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 15
      ]
    ]);

    return $this->render('index', [
      'dataProvider' => $dataProvider,
      'searchModel' => $searchModel,
    ]);
  }

  public function actionDelete($id)
  {

    $model = new News();
    $model = $model->find()->where(['id' => $id])->one();
    if ($model) {

      $model->delete();
    }
    return $this->actionIndex();
  }

  protected function findModel($id)
  {
    if (!$model = News::findOne($id)) {
      throw new NotFoundHttpException(Yii::t('app', 'Не найден id={id}', ['id' => $id]));
    }
    return $model;
  }

}
