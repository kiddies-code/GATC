<?php

namespace backend\controllers;

use Yii;
use common\models\Peserta;
use backend\models\PesertaSearch;
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
            'course'=>$course
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
        
        if ($model->load(Yii::$app->request->post())) {
            $bukti_bayar =UploadedFile::getInstance($model,'bukti_bayar');
            $f_id =UploadedFile::getInstance($model,'f_id');
            $f_berkas =UploadedFile::getInstance($model,'f_berkas');
            $f_proposal =UploadedFile::getInstance($model,'f_proposal');
            if(!empty($bukti_bayar)){
            $NameImage1 = 'Bayar-'.$model->atas_nama.'-'.date('YmdHis').'.'.$bukti_bayar->extension;
            $model->bukti_bayar = $NameImage1;
            $bukti_bayar -> saveAs('../../frontend/web/uploads/'.$model->coursePeserta->nama_course.'/'.$NameImage1); 
            }
            if(!empty($f_id)){
            $NameImage2 = 'Id-'.$model->atas_nama.'-'.date('YmdHis').'.'.$f_id->extension;
            $model->f_id = $NameImage2;
            $f_id -> saveAs('../../frontend/web/uploads/'.$model->coursePeserta->nama_course.'/'.$NameImage2); 
            }
            if(!empty($f_berkas)){
            $NameImage3 = 'Berkas-'.$model->atas_nama.'-'.date('YmdHis').'.'.$f_berkas->extension;
            $model->f_berkas = $NameImage3;
            $f_berkas -> saveAs('../../frontend/web/uploads/'.$model->coursePeserta->nama_course.'/'.$NameImage3); 
            }
            if(!empty($f_proposal)){
            $NameImage4 = 'Pro-'.$model->atas_nama.'-'.date('YmdHis').'.'.$f_proposal->extension;
            $model->f_proposal = $NameImage4;
            $f_proposal -> saveAs('../../frontend/web/uploads/'.$model->coursePeserta->nama_course.'/'.$NameImage4); 
            }
            $model->status="verifikasi";
            $model->save();
            return $this->redirect(['view', 'id' => $model->ID]); 
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
        $sementara1 = $model->bukti_bayar;
        $sementara2 = $model->f_id;
        $sementara3 = $model->f_berkas;
        $sementara4 = $model->f_proposal;
        if ($model->load(Yii::$app->request->post())) {
           $bukti_bayar =UploadedFile::getInstance($model,'bukti_bayar');
           $f_id =UploadedFile::getInstance($model,'f_id');
           $f_berkas =UploadedFile::getInstance($model,'f_berkas');
           $f_proposal =UploadedFile::getInstance($model,'f_proposal');
            if(!empty($bukti_bayar)){
            $NameImage1 = 'Bayar-'.$model->atas_nama.'-'.date('YmdHis').'.'.$bukti_bayar->extension;
            $model->bukti_bayar = $NameImage1;
            $bukti_bayar -> saveAs('../../frontend/web/uploads/'.$model->coursePeserta->nama_course.'/'.$NameImage1); 
//            $bukti_bayar -> saveAs('../web/uploads/'.$NameImage1); 
            }else{
            $model->bukti_bayar=$sementara1;
            }
            if(!empty($f_id)){
            $NameImage2 = 'Id-'.$model->atas_nama.'-'.date('YmdHis').'.'.$f_id->extension;
            $model->f_id = $NameImage2;
            $f_id -> saveAs('../../frontend/web/uploads/'.$model->coursePeserta->nama_course.'/'.$NameImage2); 
            }else{
            $model->f_id=$sementara2;
            }
            if(!empty($f_berkas)){
            $NameImage3 = 'Berkas-'.$model->atas_nama.'-'.date('YmdHis').'.'.$f_berkas->extension;
            $model->f_berkas = $NameImage3;
            $f_berkas -> saveAs('../../frontend/web/uploads/'.$model->coursePeserta->nama_course.'/'.$NameImage3); 
            }else{
            $model->f_berkas=$sementara3;
            }
            if(!empty($f_proposal)){
            $NameImage4 = 'Pro-'.$model->atas_nama.'-'.date('YmdHis').'.'.$f_proposal->extension;
            $model->f_proposal = $NameImage4;
            $f_proposal -> saveAs('../../frontend/web/uploads/'.$model->coursePeserta->nama_course.'/'.$NameImage4); 
            }else{
            $model->f_proposal=$sementara4;
            }
            $model->status="verifikasi";
            $model->save();
            return $this->redirect(['view', 'id' => $model->ID]); 
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
    $path='../../frontend/web/uploads/'.$download->coursePeserta->nama_course.'/'.$download->bukti_bayar;
    if (file_exists($path)) {
        return Yii::$app->response->sendFile($path);
    }else{
        echo 'file not exists...';
    }
   }
    
    public function actionDisplay($id) 
   { 
    $download = Peserta::findOne($id); 
    $path='../../frontend/web/uploads/'.$download->coursePeserta->nama_course.'/'.$download->bukti_bayar;
    if (file_exists($path)) {
        return Yii::$app->response->sendFile($path,$download->bukti_bayar,['inline'=>true]);
    }else{
        echo 'file not exists...';
    }
   }
    
    public function actionVid($id) 
   { 
    $download = Peserta::findOne($id); 
    $path='../../frontend/web/uploads/'.$download->coursePeserta->nama_course.'/'.$download->f_id;
    if (file_exists($path)) {
        return Yii::$app->response->sendFile($path,$download->f_id,['inline'=>true]);
    }else{
        echo 'file not exists...';
    }
   }
    
    public function actionDberkas($id) 
   { 
    $download = Peserta::findOne($id); 
    $path='../../frontend/web/uploads/'.$download->coursePeserta->nama_course.'/'.$download->f_berkas;
    if (file_exists($path)) {
        return Yii::$app->response->sendFile($path);
    }else{
        echo 'file not exists...';
    }
   }
    
    public function actionVberkas($id) 
   { 
    $download = Peserta::findOne($id); 
    $path='../../frontend/web/uploads/'.$download->coursePeserta->nama_course.'/'.$download->f_berkas;
    if (file_exists($path)) {
        return Yii::$app->response->sendFile($path,$download->f_berkas,['inline'=>true]);
    }else{
        echo 'file not exists...';
    }
   }
    
    public function actionDproposal($id) 
   { 
    $download = Peserta::findOne($id); 
    $path='../../frontend/web/uploads/'.$download->coursePeserta->nama_course.'/'.$download->f_proposal;
    if (file_exists($path)) {
        return Yii::$app->response->sendFile($path);
    }else{
        echo 'file not exists...';
    }
   }
    
    public function actionVproposal($id) 
   { 
    $download = Peserta::findOne($id); 
    $path='../../frontend/web/uploads/'.$download->coursePeserta->nama_course.'/'.$download->f_proposal;
    if (file_exists($path)) {
        return Yii::$app->response->sendFile($path,$download->f_proposal,['inline'=>true]);
    }else{
        echo 'file not exists...';
    }
   }
    
     public function actionLunas($id){
        
        $model = $this->findModel($id);
        $model->status = 'lunas';
        $model->save();
        return $this->redirect(['view', 'id' => $model->ID]); 
        
    }
    
    public function actionTolak($id){
        
        $model = $this->findModel($id);
        $model->status = 'ditolak';
        $model->save();
        return $this->redirect(['view', 'id' => $model->ID]); 
        
    }
    
     public function actionReset($id){
        
        $model = $this->findModel($id);
        $model->status = 'verifikasi';
        $model->save();
        return $this->redirect(['view', 'id' => $model->ID]); 
        
    }
    
}
