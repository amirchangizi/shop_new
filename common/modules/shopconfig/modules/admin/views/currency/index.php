<?php

use common\models\enums\ConfirmStatus;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\shopconfig\models\CurrencySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Currencies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currency-index">

    <p>
        <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i>', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            [
                'attribute' => 'currency_title',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->currency_title);

                },
            ],
            [
                'attribute' => 'currency_name',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->currency_name);

                },
            ],
            [
                'attribute' => 'currency_value',
                'format' => 'raw',
                'value' =>function ($data) {
                    return number_format($data->currency_value ,$data->decimal_placement);
                },
            ],
            [
                'attribute' => 'is_default',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode(ConfirmStatus::getLabel($data->is_default));

                },
                'filter' => ConfirmStatus::listData()
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
                            'data' => [
                                'method' => 'post',
                            ] ,
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
