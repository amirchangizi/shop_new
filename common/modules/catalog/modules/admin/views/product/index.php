<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\catalog\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

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
                'attribute' => 'name',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->name);

                },
            ],
            [
                'attribute' => 'model',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->model);

                },
            ],
            [
                'attribute' => 'quantity',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->quantity);

                },
            ],

            [
                'attribute' => 'price',
                'format' => 'raw',
                'value' =>function ($data) {
                    return number_format($data->price);

                },
            ],
            [
                'attribute' => 'sort_order',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->sort_order);

                },
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->status);

                },
            ],
            [
                'attribute' => 'viewed',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->viewed);

                },
            ],
            [
                'attribute' => 'date_added',
                'format' => 'raw',
                'value' =>function ($data) {
                    return date('Y-m-d H:i' ,$data->date_added);

                },
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
