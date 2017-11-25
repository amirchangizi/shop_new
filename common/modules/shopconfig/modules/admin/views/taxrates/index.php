<?php

use common\helpers\TaxHelper;
use common\helpers\ZoneHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\shopconfig\models\TaxratesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tax Rates');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-rates-index">


    <p>
        <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i>', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::button('<i class="fa fa-recycle" aria-hidden="true"></i>', ['id'=>'groupRemove','class' => 'btn btn-danger']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],


            [
                'attribute' => 'tax_zone_id',
                'format' => 'raw',
                'value' =>function ($data) {
                    if($data->tax_zone_id)
                        return Html::encode($data->taxZone->zone_name);

                    return ;
                },
                'filter'=> ZoneHelper::getByValue()
            ],

            [
                'attribute' => 'tax_class_id',
                'format' => 'raw',
                'value' =>function ($data) {
                    if($data->tax_class_id)
                        return Html::encode($data->taxClass->tax_class_title);

                    return ;
                },
                'filter'=> TaxHelper::getByValue()
            ],

            'tax_priority',
            'tax_rate',

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
