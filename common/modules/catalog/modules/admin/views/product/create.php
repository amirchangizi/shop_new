<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\catalog\models\Product */

?>
<div class="product-create">

    <?= $this->render('_form', [
        'model' => $model,
        'relatedModel' => $relatedModel,
        'categoryModel' => $categoryModel,
        'discountModel' => $discountModel,
        'imagesModel' => $imagesModel,
    ]) ?>

</div>
