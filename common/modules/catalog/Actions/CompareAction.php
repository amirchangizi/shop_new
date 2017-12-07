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

class CompareAction extends Action
{


    public function run()
    {

        return $this->controller->render('information' ,compact('model'));
    }
}