<?php

use common\models\enums\ActivateStatus;
use common\models\enums\ConfirmStatus;
use common\modules\shopconfig\models\Countries;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\customermanagement\models\CustomergroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Customer Groups');

$countries = ArrayHelper::map(Countries::find()->all(),'countries_iso_code_2','countries_name');

?>
<div class="customer-group-index">


    <p>
        <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i>', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::button('<i class="fa fa-recycle" aria-hidden="true"></i>', ['id'=>'groupRemove','class' => 'btn btn-danger']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
            ],
            [
                'attribute' => 'language',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->language);
                },

            ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->name);
                },

            ],
            [
                'attribute' => 'country',
                'format' => 'raw',
                'value' =>function ($data) use ($countries) {
                    if($data->country)
                        return Html::encode($countries[strtoupper($data->country)]);

                    return Yii::t('app','No');

                },
                'filter'=> $countries

            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' =>function ($data) {
                    if($data->status)
                        return Html::encode(Yii::t('app','Active'));

                    return Yii::t('app','Deactive');

                },
                'filter'=>ActivateStatus::getConstantsByValue()

            ],
            [
                'attribute' => 'is_rtl',
                'format' => 'raw',
                'value' =>function ($data) {
                    if($data->is_rtl)
                        return Html::encode(Yii::t('app','Yes'));

                    return Yii::t('app','No');

                },
                'filter'=>ConfirmStatus::getConstantsByValue()

            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons'=>[
                    'update' => function ($url, $model) {
                        return Html::a('<img src="'.Yii::getAlias('@web').'/images/icons/edit16.png" />', $url, [
                            'title' => Yii::t('yii', 'update'),
                        ]);

                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<img src="'.Yii::getAlias('@web').'/images/icons/trash.png" />', $url, [
                            'title' => Yii::t('yii', 'delete'),
                        ]);

                    },
                ]
            ],
        ],
        'tableOptions' =>['class' => 'table  table-bordered table-hover'],
    ]); ?>
</div>

<?php
$url = Url::to(['default/remove']);
$this->registerJs("
$(document).ready(function(){

        $( \"#groupRemove\" ).click(function() {
            var favorite = [];
            $.each($(\"input[name='selection[]']:checked\"), function(){
                favorite.push($(this).val());
            });

            $.post( '".$url."' ,{'ids': favorite} ,function( data ) {
                alert('Remove selected item .') ;
            });

            location.reload();
        });


    });
");
?>

