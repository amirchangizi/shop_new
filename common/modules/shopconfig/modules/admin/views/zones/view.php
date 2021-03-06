<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\shopconfig\models\Zones */

$this->title = $model->zone_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Zones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->zone_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->zone_id], [
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
            'zone_id',
            'zone_country_id',
            'zone_code',
            'zone_name',
        ],
    ]) ?>

</div>
