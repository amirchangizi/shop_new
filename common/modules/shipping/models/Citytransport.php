<?php
/**
 * Created by PhpStorm.
 * User: shabake
 * Date: 11/11/2017
 * Time: 10:57 PM
 */

namespace common\modules\shipping\models;

use common\helpers\TaxHelper;
use common\modules\shopconfig\models\Setting;
use \Yii ;
use yii\base\Exception;
use yii\base\Model;

class Citytransport extends Model
{

    public $rangeRate ,$taxClass ,$zone ,$status  ;

    public function rules()
    {
        return [
            [['taxClass', 'zone', 'status', 'rangeRate'], 'required'],
            [['taxClass' ,'zone' ,'status'], 'integer'],
            ['taxClass', 'in', 'range' => TaxHelper::getByName()],
            [['rangeRate'], 'string'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'taxClass' => Yii::t('app', 'Tax Class'),
            'zone' => Yii::t('app', 'Zone'),
            'status' => Yii::t('app', 'Status'),
            'rangeRate' => Yii::t('app', 'Rate'),
        ];
    }


    public function save()
    {
        $model = new Setting() ;


        $transaction = Yii::$app->db->beginTransaction() ;
        try{
            foreach (Yii::$app->request->post($this->formName()) as $key => $value)
            {
                $cloneModel = clone $model ;
                $cloneModel->attributes = [
                    'code'  => 'shipping' ,
                    'key'   => $key ,
                    'value' => $value,
                    'method'=>'city transport',
                    'language_id'   => Yii::$app->language
                ] ;

                if(!$cloneModel->save())
                {
                    $transaction->rollBack();
                    return false ;
                }
            }

            $transaction->commit() ;
            return true ;
        }
        catch (Exception $e)
        {
            $transaction->rollBack() ;
            return false ;
        }
    }

    public function update()
    {
        try{
            foreach (Yii::$app->request->post($this->formName()) as $key => $value)
            {
                $model = Setting::find()->where(['language_id'=>Yii::$app->language ,'code'  => 'shipping','method'=>'city transport'])->all() ;
                $model->attributes = [
                    'code'  => 'shipping' ,
                    'key'   => $key ,
                    'value' => $value,
                    'method'=>'city transport',
                    'language_id'   => Yii::$app->language
                ] ;

                if(!$model->save())
                {
                    return false ;
                }
            }

            return true ;
        }
        catch (Exception $e)
        {
            return false ;
        }
    }



}