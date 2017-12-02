<?php
/**
 * Created by PhpStorm.
 * User: shabake
 * Date: 12/1/2017
 * Time: 12:40 PM
 */

namespace common\modules\ordermanagement\controllers;

use common\modules\ordermanagement\models\OrderHistory;
use common\modules\ordermanagement\models\Orders;
use common\modules\ordermanagement\models\OrderSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SaleController  extends Controller
{

    public function actionHistory()
    {
        $model = new OrderHistory() ;

        if($model->load(Yii::$app->request->post()) && $model->save() )
        {

            return $this->redirect(Yii::$app->request->referrer) ;

        }

    }


    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $historyModel = new OrderHistory() ;
        return $this->render('view', [
            'model' => $this->findModel($id),
            'history'   => $historyModel
        ]);
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->orders_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Orders model.
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
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}