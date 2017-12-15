<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\shopconfig\models\GeozonesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Geo Zones');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="geo-zones-index">

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
                'attribute' => 'geo_zone_name',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->geo_zone_name);

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
                'attribute' => 'last_modified',
                'format' => 'raw',
                'value' =>function ($data) {
                    return date('Y-m-d H:i',$data->last_modified);

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
