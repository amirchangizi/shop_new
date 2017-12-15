<?php

namespace common\modules\catalog\modules\admin\controllers;

use app\commons\BaseController;
use common\modules\catalog\models\OptionValue;
use Yii;
use common\modules\catalog\models\Option;
use common\modules\catalog\models\OptionSearch;
use yii\base\Model;
use yii\httpclient\Exception;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;

/**
 * OptionController implements the CRUD actions for Option model.
 */
class OptionController extends BaseController
{


    /**
     * Lists all Option models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OptionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Option model.
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
     * Creates a new Option model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Option();
        $modelsOptionValue = [new OptionValue()] ;

        if ($model->load(Yii::$app->request->post()) ) { //&& $model->save()

            //$modelsOptionValue = Model::createMultiple(OptionValue::classname());
            Model::loadMultiple($modelsOptionValue, Yii::$app->request->post());


            foreach ($modelsOptionValue as $index => $modelOptionValue) {
                $modelOptionValue->sort_order = $index;
                $modelOptionValue->image = 'test'; //\yii\web\UploadedFile::getInstance($modelOptionValue, "[{$index}]image");
            }

            // ajax validation

            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON ;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsOptionValue),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();

            $valid = Model::validateMultiple($modelsOptionValue) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsOptionValue as $modelOptionValue) {
                            $modelOptionValue->option_id = $model->option_id;
                            if (($flag = $modelOptionValue->save(false)) === false) {
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

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'modelsOptionValue'=> $modelsOptionValue
        ]);
    }

    /**
     * Updates an existing Option model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsOptionValue = $model->optionValues;

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsOptionValue, 'option_value_id', 'option_id');
            //$modelsOptionValue = Model::createMultiple(OptionValue::classname(), $modelsOptionValue);

            Model::loadMultiple($modelsOptionValue, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsOptionValue, 'option_value_id', 'option_id')));

            // ajax validation

            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsOptionValue),
                    ActiveForm::validate($model)
                );
            }

            $i = 0 ;


            foreach ($modelsOptionValue as $index => $modelOptionValue) {
                $modelOptionValue->sort_order = $index;
                $modelOptionValue->image =  'test'.$i; $i++ ;//\yii\web\UploadedFile::getInstance($modelOptionValue, "[{$index}]img");
            }





            // validate all models

            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsOptionValue) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            $flag = OptionValue::deleteByIDs($deletedIDs);
                        }

                        if ($flag) {
                            foreach ($modelsOptionValue as $modelOptionValue) {
                                $modelOptionValue->option_id = $model->option_id;
                                if (($flag = $modelOptionValue->save(false)) === false) {
                                    $transaction->rollBack();
                                    break;
                                }
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
                'modelsOptionValue'=>$modelsOptionValue
            ]);
        }
    }

    /**
     * Deletes an existing Option model.
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
     * Finds the Option model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Option the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Option::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
