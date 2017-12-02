<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\shopconfig\models\GeoZones */
?>
<div class="geo-zones-update">
    <?= $this->render('_form', [
        'model' => $model,
        'ztgModel' => $ztgModel,
    ]) ?>
</div>
