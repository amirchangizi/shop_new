<?php


use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

$this->title = ($model->isNewRecord) ? Yii::t('app','Create '.Yii::$app->controller->id) : Yii::t('app','Update '.Yii::$app->controller->id.' '.(isset($option['name']) ? $option['name']: '')) ;

if(is_array($model->errors) && count($model->errors)>1 )
{
    $err = []  ;
    foreach ($model->errors as $error)
    {

        if(in_array($error[0],$err))
            continue ;
        $err[]= implode(',',$error) ;

    }
    echo implode(',',$err).'<br/>';

}
echo  Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => Yii::$app->controller->id,
            'url' => [Yii::$app->controller->id.'/index'],
            'template' => "<li><b>{link}</b></li>\n", // template for this link only
        ],

        $this->title,
    ],
]);

?>

<div class="row">
    <div class="col-sm-12">
        <div class="widget-box">
            <?php $form = ActiveForm::begin([
                'id'=>Yii::$app->controller->id.'-form',
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>
            <div class="widget-header">
                <h4 class="widget-title">
                    <?php
                        if(isset($option['title']) && !empty($option['title']))
                            echo $option['title'] ;
                        else
                            echo ($model->isNewRecord) ? Yii::t('app','Create') : Yii::t('app','Update') ?>
                </h4>

                <span class="widget-toolbar">

                    <?php if(isset($option['collapse']) && $option['collapse']) : ?>
                        <a href="#" data-action="collapse">
                            <i class="ace-icon fa fa-chevron-up"></i>
                        </a>
                    <?php endif; ?>

                    <?= Html::a('<i class="glyphicon glyphicon-floppy-saved"></i>',($model->isNewRecord) ? [ Yii::$app->controller->id.'/create'] : [Yii::$app->controller->id.'/update','id'=>(isset($option['recordId']) ? $option['recordId'] :'')] , [
                        'data' => [
                            'method' => 'post',
                        ]
                    ])?>

                    <?php if(isset($option['closeButton']) && $option['closeButton'] ) : ?>
                        <a href="<?= Url::to([Yii::$app->controller->id.'/index'])?>" >
                            <i class="ace-icon fa fa-times"></i>
                        </a>
                    <?php endif; ?>


                </span>
            </div>

            <div class="widget-body">
                <?= $content ?>
            </div>

            <?php  ActiveForm::end(); ?>
        </div>
    </div>


</div>