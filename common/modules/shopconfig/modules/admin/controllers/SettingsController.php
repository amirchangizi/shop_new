<?php

namespace common\modules\shopconfig\modules\admin\controllers ;

use app\commons\BaseController;
use common\modules\shopconfig\models\Setting;
use common\modules\shopconfig\models\SettingSearch;
use common\modules\shopconfig\models\SettingsForm;
use Yii ;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class SettingsController extends BaseController
{

    public function behaviors()
    {
        return [

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new SettingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $settingModel = ArrayHelper::map(Setting::find()->where(['code'=>'config','language_id'=>Yii::$app->language])->all() ,'key','value')  ;
        $model = new SettingsForm() ;

        if($model->load($post = Yii::$app->request->post()) && $model->validate())
        {

            foreach ($post['SettingsForm'] as $key => $item){
                if(!$settingModel = Setting::find()->where(['code'=>'config','key'=>$key])->one())
                    $settingModel = new Setting() ;

                $settingModel->attributes = [
                    'code'=>'config',
                    'key'=>$key ,
                    'value'=>$item ,
                    'language_id'=> Yii::$app->language->value
                ];


                if(!$settingModel->save())
                    continue ;
            }

            return $this->redirect(['index']);

            //$settingModel = ArrayHelper::map(Setting::find()->where(['code'=>'config','language_id'=>Yii::$app->language])->all() ,'key','value','code')  ;

        }

        return $this->render('config',compact('settingModel','model'));

    }

    public function actionUpdate($language)
    {
        $settingModel = ArrayHelper::map(Setting::find()->where(['code'=>'config','language_id'=>$language])->all() ,'key','value')  ;

        $model = new SettingsForm() ;

        if($model->load($post = Yii::$app->request->post()) && $model->validate())
        {

            foreach ($post['SettingsForm'] as $key => $item){
                if(!$settingModel = Setting::find()->where(['code'=>'config','key'=>$key])->one())
                    $settingModel = new Setting() ;

                $settingModel->attributes = [
                    'code'=>'config',
                    'key'=>$key ,
                    'value'=>$item ,
                    'language_id'=> Yii::$app->language->value
                ];


                if(!$settingModel->save())
                    continue ;
            }

            return $this->redirect(['index']);
        }

        return $this->render('config',compact('settingModel','model'));
    }

    public function actionDelete($language)
    {
        $model = Setting::deleteAll(['language_id'=>$language]);

        return $this->redirect(Yii::$app->request->referrer);

    }

}