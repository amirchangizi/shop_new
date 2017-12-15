<?php

namespace common\modules\catalog\modules\admin\controllers;

use app\commons\BaseController;
use common\helpers\JdfHelper;
use common\modules\catalog\models\ProductDiscount;
use common\modules\catalog\models\ProductImage;
use common\modules\catalog\models\ProductRelated;
use common\modules\catalog\models\ProductToCategory;
use Yii;
use common\modules\catalog\models\Product;
use common\modules\catalog\models\ProductSearch;
use yii\base\Model;
use yii\web\NotFoundHttpException;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends BaseController
{


    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $relatedModel = new ProductRelated() ;
        $categoryModel = new ProductToCategory() ;
        $discountModel = [new ProductDiscount] ;
        $imagesModel = [new ProductImage] ;


        if ($model->load($post = Yii::$app->request->post()) ) {//&& $model->save()

            Model::loadMultiple($discountModel, Yii::$app->request->post());

            $valid = $model->validate();
            $valid = Model::validateMultiple($discountModel) && $valid;

            if($model->save())
            {
                $model->saveDiscount($discountModel[0] , $post[$discountModel[0]->formName()],$model->product_id) ;

                $model->saveRelated($relatedModel , $post[$relatedModel->formName()] ,$model->product_id) ;
                $model->saveCategory($categoryModel ,$post[$categoryModel->formName()] ,$model->product_id) ;
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'relatedModel' => $relatedModel,
                'categoryModel' => $categoryModel,
                'discountModel' => $discountModel,
                'imagesModel' => $imagesModel,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $relatedModel = new ProductRelated() ;
        $categoryModel = new ProductToCategory() ;
        $discountModel = $model->productDiscounts ;
        $imagesModel = $model->productImages ;

        if(count($imagesModel) <= 0)
            $imagesModel = [new ProductImage] ;

        if(count($discountModel) <= 0)
            $discountModel = [new ProductDiscount] ;


        if ($model->load($post = Yii::$app->request->post()) && $model->save() ) { //

            $model->saveRelated($relatedModel , $post[$relatedModel->formName()] ,$model->product_id) ;
            $model->saveCategory($categoryModel ,$post[$categoryModel->formName()] ,$model->product_id) ;

            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'relatedModel' => $relatedModel,
                'categoryModel' => $categoryModel,
                'discountModel' => $discountModel,
                'imagesModel' => $imagesModel,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
