<?php

namespace common\modules\catalog\modules\admin\controllers;

use app\commons\BaseController;
use Yii;
use common\modules\catalog\models\Category;
use common\modules\shopconfig\models\CategorySearch;
use yii\web\NotFoundHttpException;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends BaseController
{

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $countries = Category::findOne(['name' => 'Root']);
//        $australia = new Category(['name' => 'Australia','status'=>1]);
//        $australia->appendTo($countries);

        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) ) {
            if(!is_null($model->categoryName)  && $findParent = Category::findOne(['name' => $model->categoryName]))
            {
                $model->parent_id = $findParent->category_id ;
                $category = new Category($model->attributes);
                $category->appendTo($findParent);
            }

            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {

            if(!is_null($model->categoryName)  && $findParent = Category::findOne(['name' => $model->categoryName]))
            {
                $model->parent_id = $findParent->category_id ;
                $updateRecord = Category::findOne(['name' => $model->oldAttributes['name']]) ;


                $updateRecord->prependTo($findParent);
            }

            if(!$model->save())
                return $this->render('update', [
                    'model' => $model,
                ]);

            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if($model = Category::findOne(['category_id' => $id ]))
            $model->deleteWithChildren() ;

        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
