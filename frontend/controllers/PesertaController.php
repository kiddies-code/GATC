<?php

namespace frontend\controllers;

use Yii;
use common\models\Peserta;
use common\models\Course;
use common\models\User;
use frontend\models\PesertaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

/**
 * PesertaController implements the CRUD actions for Peserta model.
 */
class PesertaController extends Controller
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
     * Lists all Peserta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PesertaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $course = \common\models\Course::find()->all();
        $course = ArrayHelper::map($course,'ID','nama_course');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'course'=>$course,
        ]);
    }

    /**
     * Displays a single Peserta model.
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
     * Creates a new Peserta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Peserta();
            $model->id_course = $_GET['id_kursus'];
            $model->username = Yii::$app->user->identity->username;
        
         if ($model->load(Yii::$app->request->post())) {
            $bukti_bayar =UploadedFile::getInstance($model,'bukti_bayar');
            if(!empty($bukti_bayar)){
            $NameImage = 'Bayar-'.$model->atas_nama.'.'.$bukti_bayar->extension;
            $model->bukti_bayar = $NameImage;
            $model->status = 'verifikasi';
            if ($model->save()){
            $bukti_bayar -> saveAs('uploads/'.$model->coursePeserta->nama_course.'/'.$NameImage);
            $model = Course::find()->all();
            return $this->redirect(['index','model'=>$model]);
            }
            }
            $model->save();
        return $this->redirect(['index','model'=>$model]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Peserta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $sementara = $model->bukti_bayar;
         if ($model->load(Yii::$app->request->post())) {
            $bukti_bayar =UploadedFile::getInstance($model,'bukti_bayar');
            if(!empty($bukti_bayar)){
            $NameImage = 'Bayar-'.$model->atas_nama.'.'.$bukti_bayar->extension;
            $model->bukti_bayar = $NameImage;
            $model->status = 'verifikasi';
            if ($model->save()){
            $bukti_bayar -> saveAs('uploads/'.$model->coursePeserta->nama_course.'/'.$NameImage);
            return $this->redirect(['index','model'=>$model]); 
            }
            }
            $model->bukti_bayar=$sementara;
            $model->save();
            return $this->redirect(['index','model'=>$model]); 
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Peserta model.
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
     * Finds the Peserta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Peserta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Peserta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionDownload($id) 
   { 
    $download = Peserta::findOne($id); 
    $path=Yii::getAlias('@webroot').'/uploads/'.$download->coursePeserta->nama_course.'/'.$download->bukti_bayar;
    if (file_exists($path)) {
        return Yii::$app->response->sendFile($path);
    }else{
        echo 'file not exists...';
    }
   }
    
    public function actionDisplay($id) 
   { 
    $download = Peserta::findOne($id); 
    $path=Yii::getAlias('@webroot').'/uploads/'.$download->coursePeserta->nama_course.'/'.$download->bukti_bayar;
    if (file_exists($path)) {
        return Yii::$app->response->sendFile($path,$download->bukti_bayar,['inline'=>true]);
    }else{
        echo 'file not exists...';
    }
   }
}
