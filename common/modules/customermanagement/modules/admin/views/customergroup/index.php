<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\customermanagement\models\CustomergroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Customer Groups');

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
                'attribute' => 'name',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->name);
                },

            ],
            [
                'attribute' => 'is_default',
                'format' => 'raw',
                'value' =>function ($data) {
                    if($data->is_default)
                        return Html::encode(Yii::t('app','Yes'));

                    return Yii::t('app','No');

                },
                'filter'=>[
                    0 => Yii::t('app','No'),
                    1 => Yii::t('app','Yes')
                ]

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

