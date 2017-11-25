<?php

use common\helpers\LanguageHelper;
use common\models\enums\SectionStatus;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\shopconfig\models\ShopstatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Settings');

?>
<div class="shop-status-index">


    <p>
        <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i>', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'key',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->key);
                },

            ],
            [
                'attribute' => 'value',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->value);
                },

            ],


            [
                'attribute' => 'language_id',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->language_id);
                },
                'filter'=> LanguageHelper::getByName()

            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons'=>[
                    'update' => function ($url, $model) {
                        return Html::a('<img src="'.Yii::getAlias('@web').'/images/icons/edit16.png" />', ['update', 'language'=>$model->language_id ], [
                            'title' => Yii::t('yii', 'update'),
                        ]);

                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<img src="'.Yii::getAlias('@web').'/images/icons/trash.png" />', ['delete', 'language'=>$model->language_id ], [
                            'title' => Yii::t('yii', 'delete'),
                        ]);

                    },
                ]
            ],
        ],
        'tableOptions' =>['class' => 'table  table-bordered table-hover'],
    ]); ?>
</div>

