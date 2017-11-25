<?php

use common\helpers\CategoryHelper;
use common\helpers\LanguageHelper;
use common\models\enums\ActivateStatus;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\shopconfig\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

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
                'attribute' => 'name',
                'format' => 'raw',
                'value' =>function ($data) {
                    $level = 0 ;
                    if($data->level)
                        $level = str_repeat('-' ,$data->level);
                        return Html::encode($level.' '.$data->name);

                },
            ],
            [
                'attribute' => 'parent_id',
                'format' => 'raw',
                'value' =>function ($data) {
                    if($data->parent_id)
                        return Html::encode($data->parent->name);

                    return ;
                },
                'filter'=> CategoryHelper::getCategory()
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' =>function ($data) {
                    $value = ActivateStatus::getLabel($data->status) ;
                    if($data->status)
                        return Html::encode($value);

                    return Html::encode($value);
                },
                'filter'=> ActivateStatus::listData()
            ],
            [
                'attribute' => 'hits',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->hits);

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
                'attribute' => 'language_id',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->language_id);
                },
                'filter'=> LanguageHelper::getByValue()
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
