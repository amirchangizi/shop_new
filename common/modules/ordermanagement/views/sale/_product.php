<?php

use common\modules\ordermanagement\models\OrdersProducts;

$productList = OrdersProducts::find()->where(['order_id'=>$model->orders_id])->all();

if(!$productList)
    echo  Yii::t('app','There is no product in this order');



?>

<table class="table table-responsive" >
    <thead>
        <tr>
            <th><?= Yii::t('app','product model') ?></th>
            <th><?= Yii::t('app','product name') ?></th>
            <th><?= Yii::t('app','product price') ?></th>
            <th><?= Yii::t('app','final price') ?></th>
            <th><?= Yii::t('app','product tax') ?></th>
            <th><?= Yii::t('app','product quantity') ?></th>
            <th><?= Yii::t('app','cost') ?></th>
        </tr>
    </thead>
    <?php
        foreach ($productList as $product):
    ?>
    <tr>
        <td><?= $product->products_model ?></td>
        <td><?= $product->products_name ?></td>
        <td><?= $product->products_price ?></td>
        <td><?= $product->final_price ?></td>
        <td><?= $product->products_tax ?></td>
        <td><?= $product->product_quantity ?></td>
        <td><?= $product->cost ?></td>
    </tr>
    <?php
        endforeach;
    ?>

</table>
