<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\catalog\models\Option */

?>
<div class="option-update">

    <?= $this->render('_form', [
        'model' => $model,
        'modelsOptionValue'=>$modelsOptionValue
    ]) ?>

</div>
