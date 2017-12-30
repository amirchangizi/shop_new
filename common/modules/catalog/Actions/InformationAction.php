<?php
/**
 * Created by PhpStorm.
 * User: shabake
 * Date: 12/4/2017
 * Time: 10:55 AM
 */

namespace common\modules\catalog\actions;

use common\helpers\InformationHelper;
use Yii ;
use yii\base\Action ;
use yii\web\NotFoundHttpException;

class InformationAction extends Action
{
    public $infoId ;
    public function run()
    {
        if(!$this->infoId = Yii::$app->request->get('infoId'))
            throw new NotFoundHttpException(Yii::t('app' ,'Invalid notification id')) ;

        $model = InformationHelper::getInformation($this->infoId);

        if(!$model)
            throw new NotFoundHttpException(Yii::t('app' ,'Invalid information')) ;

        return $this->controller->render('information' ,compact('model'));
    }
}