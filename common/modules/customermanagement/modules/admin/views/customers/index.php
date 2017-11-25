<?php

use common\modules\customermanagement\models\CustomerGroup;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\customermanagement\models\CustomersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Customers');
?>
<div class="customers-index">

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
                'attribute' => 'customer_name',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->customer_name);
                },

            ],
            [
                'attribute' => 'customer_username',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->customer_username);
                },

            ],
            [
                'attribute' => 'customer_group_id',
                'format' => 'raw',
                'value' =>function ($data) {
                    if($data->customer_group_id)
                        return Html::encode($data->customerGroup->name);

                    return ;
                },
                'filter'=> ArrayHelper::map(CustomerGroup::find()->all(),'customer_group_id','name')


            ],
            [
                'attribute' => 'customer_email',
                'format' => 'email',
                'value' =>function ($data) {
                    return Html::encode($data->customer_email);
                },

            ],
            [
                'attribute' => 'is_block',
                'format' => 'raw',
                'value' =>function ($data) {
                    if($data->is_block)
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
                'template'  => '{view} {update} {delete}',
                'buttons'=>[
                    'update' => function ($url, $model) {
                        return Html::a('<img src="'.Yii::getAlias('@web').'/images/icons/edit16.png" />', $url, [
                            'title' => Yii::t('yii', 'update'),
                        ]);

                    },
                    'view' => function ($url, $model) {
                        return Html::a('<img src="'.Yii::getAlias('@web').'/images/icons/view.png" />', $url, [
                            'title' => Yii::t('yii', 'view'),
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
