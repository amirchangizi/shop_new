<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\catalog\models\ManufacturersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Manufacturers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manufacturers-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                'attribute' => 'manufacturers_name',
                'format' => 'raw',
                'value' =>function ($data) {

                    return Html::encode($data->manufacturers_name);

                },
            ],
            [
                'attribute' => 'manufacturers_url',
                'format' => 'url',
                'value' =>function ($data) {

                    return Html::encode($data->manufacturers_url);

                },
            ],

            [
                'attribute' => 'date_added',
                'format' => 'raw',
                'value' =>function ($data) {
                    return date('Y-m-d H:i',$data->date_added);

                },
                'filter'=> false
            ],
            [
                'attribute' => 'date_modified',
                'format' => 'raw',
                'value' =>function ($data) {
                    return date('Y-m-d H:i',$data->date_modified);

                },
                'filter'=> false
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
                        return Html::a('<img src="'.Yii::getAlias('@web').'/images/icons/trash.png" />', $url, ['data' => [
                            'method' => 'post',
                            'confirm' => 'Are you sure you want to delete this item ?',
                        ],
                            'title' => Yii::t('yii', 'delete'),
                        ]);

                    },
                ]
            ],
        ],
        'tableOptions' =>['class' => 'table  table-bordered table-hover'],
    ]); ?>
</div>
