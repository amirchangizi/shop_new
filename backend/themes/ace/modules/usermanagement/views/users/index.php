<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\user\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;

?>
<script >
    var keys = $('#grid').yiiGridView('getSelectedRows');
</script>
<div class="user-index">

    <p>

        <?= Html::a('<img src="'.Yii::getAlias('@web').'/images/icons/user_24.png" />', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::button('<i class="fa fa-recycle" aria-hidden="true"></i>', ['id'=>'groupRemove','class' => 'btn btn-danger']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
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
                'attribute' => 'user_name',
                'format' => 'raw',
                'value' =>function ($data) {
                    return Html::encode($data->username);
                },

            ],
            [
                'attribute' => 'parent_id',
                'format' => 'raw',
                'value' =>function ($data) {
                    if(!is_null($data->parent_id))
                        return Html::encode($data->parent->name);

                    return ;
                },

            ],
            [
                'attribute' => 'email',
                'format' => 'email',
                'value' =>function ($data) {
                    return Html::encode($data->email);
                },

            ],
            [
                'attribute' => 'block',
                'format' => 'raw',
                'value' =>function ($data) {
                    if($data->block)
                        return Html::encode(Yii::t('app','Yes'));

                    return Html::encode(Yii::t('app','No'));
                },

            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete}',
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



