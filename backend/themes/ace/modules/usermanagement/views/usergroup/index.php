<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\usermanagement\models\UsergroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Usergroups');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usergroups-index">
    <p>
        <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i>', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::button('<i class="fa fa-recycle" aria-hidden="true"></i>', ['id'=>'groupRemove','class' => 'btn btn-danger']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            [ 'class' => 'yii\grid\CheckboxColumn',],

            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->title);
                },

            ],
            [
                'attribute' => 'parent_id',
                'format' => 'raw',
                'value' =>function ($data) {

                    if($data->parent_id)
                        return Html::encode($data->parent->title);

                    return null ;
                },

            ],
            [
                'attribute' => 'default',
                'format' => 'raw',
                'value' =>function ($data) {
                    if($data->default)
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
                'template'=> '{update} {delete}',
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
