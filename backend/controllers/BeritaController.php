<?php

namespace backend\controllers;

use Yii;
use common\models\Berita;
use backend\models\BeritaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BeritaController implements the CRUD actions for Berita model.
 */
class BeritaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Berita models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BeritaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Berita model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Berita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Berita();

        if ($model->load(Yii::$app->request->post())) {
          // $model->publish_at = date('YYYY-mm-dd');
          $model->oleh = Yii::$app->user->identity->id;
          $sampull =UploadedFile::getInstance($model,'sampul');
          if(!empty($sampull)){
          $NameImage = $model->oleh.'-'.date('YmdHis').'.'.$sampull->extension;
          $model->sampul = 'uploads/berita/'.$NameImage;
          if ($model->save()){
          $sampull-> saveAs('uploads/berita/'.$NameImage);
          return $this->redirect(['view', 'id' => $model->ID]);
          }
          }
          $model->save();
          return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Berita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $sementara = $model->sampul;
        if ($model->load(Yii::$app->request->post())) {
          $model->oleh = Yii::$app->user->identity->id;
          $sampull =UploadedFile::getInstance($model,'sampul');
          if(!empty($sampull)){
          $NameImage = $model->ID.'-'.$model->oleh.'-'.date('YmdHis').'.'.$sampull->extension;
          $model->sampul = 'uploads/berita/'.$NameImage;
          if ($model->save()){
          $sampull-> saveAs('uploads/berita/'.$NameImage);
          unlink($sementara);
          return $this->redirect(['view', 'id' => $model->ID]);
          }
          }
          $model->sampul = $sementara;
          $model->save();
          return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Berita model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Berita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Berita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Berita::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
