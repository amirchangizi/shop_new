<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\shopconfig\models\TaxRates */

$this->title = $model->tax_rates_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tax Rates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-rates-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->tax_rates_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->tax_rates_id], [
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
            'tax_rates_id',
            'tax_zone_id',
            'tax_class_id',
            'tax_priority',
            'tax_rate',
            'tax_description',
            'date_modified',
            'date_added',
        ],
    ]) ?>

</div>
