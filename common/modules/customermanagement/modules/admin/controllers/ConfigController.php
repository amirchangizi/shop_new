<?php
namespace  common\modules\customermanagement\modules\admin\controllers;

use app\commons\BaseController;
use app\models\Modules;
use Yii;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\usermanagement\models\ConfigForm;

/**
 * UsergroupController implements the CRUD actions for Usergroups model.
 */
class ConfigController extends BaseController
{
    public function actionConfig($id,$config)
    {
        $model = new ConfigForm();

        $config = json_decode($config,true) ;

        return $this->render('config',compact('model','id','config'));

    }

    public function actionSet()
    {
        $model = new ConfigForm();

        if($model->load($post = Yii::$app->request->post()) && $model->validate())
        {
            unset($post['ConfigForm']['moduleId']);
            $moduleModel = Modules::findOne($model->moduleId);
            $moduleModel->config = json_encode($post['ConfigForm']);//$post['ConfigForm']
            $moduleModel->save();

        }

        return $this->redirect(['/module/index']);

    }

}