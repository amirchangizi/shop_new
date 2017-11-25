<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\shopconfig\models\Currency */

$this->title = $model->currency_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Currencies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currency-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->currency_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->currency_id], [
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
            'currency_id',
            'currency_title',
            'currency_name',
            'currency_value',
            'currency_min',
            'currency_max',
            'currency_last_update',
            'is_default',
            'currency_symbol',
            'currency_possition',
            'decimal_placement',
        ],
    ]) ?>

</div>
