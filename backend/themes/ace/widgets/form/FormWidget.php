<?php
namespace backend\themes\ace\widgets\form;

use yii\base\Widget;
use yii\helpers\Html;

class FormWidget extends Widget
{

    public $content ;

    public $model ;

    public $recordId ;

    public $option = [] ;

    public function run()
    {
        return $this->render('form', [
            'model'=>$this->model ,
            'content'=>$this->content ,
            'recordId'=>$this->recordId ,
            'option'=>$this->option ,
        ]);
    }
}