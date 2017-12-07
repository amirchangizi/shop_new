<?php
/**
 * Created by PhpStorm.
 * User: shabake
 * Date: 12/4/2017
 * Time: 10:55 AM
 */

namespace common\modules\catalog\actions;

use common\helpers\ManufacturerHelper;
use Yii ;
use yii\base\Action ;
use yii\web\NotFoundHttpException;

class ManufacturerAction extends Action
{
    public $manufacturerId ;

    public function run()
    {
        if(!$this->manufacturerId = Yii::$app->request->get('manufacturerId'))
            throw new NotFoundHttpException('Invalid notification id') ;

        $model = ManufacturerHelper::getManufacturerById($this->manufacturerId);

        if(!$model)
            throw new NotFoundHttpException('Invalid information') ;

        return $this->controller->render('manufacturer' ,compact('model'));
    }
}