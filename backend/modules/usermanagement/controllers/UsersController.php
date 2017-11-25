<?php

namespace app\modules\usermanagement\controllers;


use app\modules\usermanagement\models\UsergroupMap;
use Yii;
use app\modules\usermanagement\commons\BaseUserController;
use app\modules\usermanagement\models\User;
use app\modules\usermanagement\models\UserSearch;
use yii\bootstrap\Html;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;


/**
 * UserController implements the CRUD actions for User model.
 */
class UsersController extends BaseUserController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behavior = parent::behaviors() ;

        $myBehavior = [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view' ,'create' ,'update','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];

        return array_merge($behavior,$myBehavior) ;
    }

    public function actions()
    {
        return [
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
            ],
        ];
    }

    public function actionSuccessCallback($client)
    {
        $attributes = $client->getUserAttributes();

        echo '<pre>';
        print_r($client) ;
        echo '<hr/>';
        print_r($attributes) ;
        exit;
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User(['scenario' => User::SCENARIO_REGISTER]);
        $groupMap = new UsergroupMap() ;

        if ($model->load($post = Yii::$app->request->post()) ) {

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if($model->save())
                return $this->redirect(['view', 'id' => $model->user_id]);
        }

        return $this->render('create', compact('model','groupMap') );

    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $groupMap =  new UsergroupMap() ;

        $model->scenario = 'admineditprofile' ;

        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->user_id]);
        }

        return $this->render('update', compact('model','groupMap'));

    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
