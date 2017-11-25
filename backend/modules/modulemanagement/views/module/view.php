<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\modulemanagement\models\Modules */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Modules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modules-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->module_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->module_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'module_id',
            'title',
            'module_name',
            'module_path',
            'note',
            'core',
            'client',
            'config:ntext',
            'ordering',
            'position',
            'checked_out',
            'checked_out_time',
            'publish_up',
            'publish_down',
            'published',
            'access',
            'showtitle',
            'params:ntext',
            'added_user',
            'date_added',
            'modified_user',
            'date_modified',
            'language_id',
        ],
    ]) ?>

</div>
