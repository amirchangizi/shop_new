<?php

namespace common\modules\shopconfig\modules\admin\controllers;

use app\commons\BaseController;
use common\helpers\ZoneHelper;
use common\modules\shopconfig\models\ZonesToGeoZones;
use Yii;
use common\modules\shopconfig\models\GeoZones;
use common\modules\shopconfig\models\GeozonesSearch;
use yii\base\Exception;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

/**
 * GeozonesController implements the CRUD actions for GeoZones model.
 */
class GeozonesController extends BaseController
{


    public function actionZone()
    {

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id = Yii::$app->request->get('id') ;
        $zones = ZoneHelper::getZoneByCountry($id);

        if(!$zones)
            return [] ;

        return $zones;
        //return ;
    }

    /**
     * Lists all GeoZones models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GeozonesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Creates a new GeoZones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GeoZones();
        $ztgModel = [new ZonesToGeoZones ] ;

        if ($model->load(Yii::$app->request->post()) ) {
            Model::loadMultiple($ztgModel, Yii::$app->request->post());

            $valid = $model->validate();

            $valid = Model::validateMultiple($ztgModel) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($ztgModel as $ztg) {
                            $ztg->customer_id = $model->id;
                            if (! ($flag = $ztg->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }

                } catch (Exception $e) {

                    $transaction->rollBack();
                }

            }

        } else {
            return $this->render('create', [
                'model' => $model,
                'ztgModel' => $ztgModel,
            ]);
        }
    }

    /**
     * Updates an existing GeoZones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $ztgModel = $model->zonesToGeoZones;

        if(count($ztgModel)<=0)
            $ztgModel = [new ZonesToGeoZones ] ;

        if ($model->load(Yii::$app->request->post())) {


            $oldIDs = ArrayHelper::map($ztgModel, 'association_id', 'association_id');
            Model::loadMultiple($ztgModel, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($ztgModel, 'association_id', 'association_id')));

            $valid = $model->validate();
            $valid = Model::validateMultiple($ztgModel) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            ZonesToGeoZones::deleteAll(['association_id' => $deletedIDs]);
                        }
                        foreach ($ztgModel as $ztg) {
                            $ztg->geo_zone_id = $model->geo_zone_id;
                            if (! ($flag = $ztg->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

        } else {
            return $this->render('update', [
                'model' => $model,
                'ztgModel' => $ztgModel,
            ]);
        }
    }

    /**
     * Deletes an existing GeoZones model.
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
     * Finds the GeoZones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return GeoZones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GeoZones::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
