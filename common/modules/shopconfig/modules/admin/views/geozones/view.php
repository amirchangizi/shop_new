<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\shopconfig\models\GeoZones */

$this->title = $model->geo_zone_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Geo Zones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="geo-zones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->geo_zone_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->geo_zone_id], [
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
            'geo_zone_id',
            'geo_zone_name',
            'geo_zone_description',
            'last_modified',
            'date_added',
        ],
    ]) ?>

</div>
