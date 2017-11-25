<?php
/**
 * Created by PhpStorm.
 * User: shabake
 * Date: 11/11/2017
 * Time: 10:27 PM
 */

namespace common\modules\shipping\controllers;

use common\modules\shipping\models\Citytransport;
use \Yii ;
use app\commons\BaseController;
use common\modules\shopconfig\models\Setting ;
use common\modules\shipping\models\SettingSearch ;
use yii\helpers\ArrayHelper;
use yii\web\MethodNotAllowedHttpException;
use yii\web\NotFoundHttpException;


class CitytransportController extends BaseController
{

    public function actionIndex()
    {
        $searchModel = new SettingSearch() ;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]) ;

    }

    public function actionCreate()
    {
        if($settingModel = Setting::find()->where(['language_id'=>Yii::$app->language ,'method'=>'city transport'])->all())
            throw new MethodNotAllowedHttpException('This method exist.please update this method');

        $model = new Citytransport() ;

        if($model->load(Yii::$app->request->post()) && $model->validate())
        {
            if($model->save())
                return $this->redirect(['index']);

        }

        return $this->render('create', compact('model')) ;
    }

    public function actionUpdate($method ,$language)
    {
        if(!$settingModel = Setting::find()->where(['language_id'=>$language ,'method'=>$method])->all())
            throw new NotFoundHttpException('The requested page does not exist.');

        $model = new Citytransport() ;

        if($model->load(Yii::$app->request->post()) && $model->validate())
        {
            if($model->update())
                return $this->redirect(['index']);
        }

        $settingParams = ArrayHelper::map($settingModel ,'key' ,'value');
        return $this->render('update', compact('model','settingParams' ,'settingModel')) ;
    }

    public function actionDelete($method ,$language)
    {

        Setting::deleteAll(['language_id'=>$language ,'method'=>$method]) ;

        return $this->redirect(['index']);

    }


}