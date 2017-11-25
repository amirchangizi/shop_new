<?php
namespace app\modules\usermanagement\controllers;

use app\models\Modules;
use app\modules\usermanagement\models\ConfigForm;
use Yii;
use app\modules\usermanagement\commons\BaseUserController ;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsergroupController implements the CRUD actions for Usergroups model.
 */
class ConfigController extends BaseUserController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['config', 'set'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

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