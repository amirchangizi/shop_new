<?php

use common\helpers\LanguageHelper;
use common\models\enums\ActivateStatus;
use common\models\enums\ConfirmStatus;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\catalog\models\InformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Informations');
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="information-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                'attribute' => 'title',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->title);
                },

            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' =>function ($data) {
                    $list = ActivateStatus::$list ;
                    if($data->status)
                    {
                        return Html::encode($list[$data->status]);
                    }
                    return Html::encode($list[0]) ;
                },
                'filter'=> ActivateStatus::listData()

            ],
            [
                'attribute' => 'bottom',
                'format' => 'raw',
                'value' =>function ($data) {
                    $confirm = ConfirmStatus::$list ;
                    if($data->bottom)
                    {
                        return Html::encode($confirm[$data->bottom]);

                    }

                    return Html::encode($confirm[0]);

                },
                'filter'=> ConfirmStatus::listData()
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
