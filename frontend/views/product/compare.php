<?php

/* @var $this \yii\web\View */
/* @var $content string */


use yii\helpers\Html;
use yii\widgets\Breadcrumbs;


?>
<!-- Page Breadcrumb -->
		<div class="page-breadcrumb container-fluid no-padding">
			<div class="container">
                <?php
                    echo  Breadcrumbs::widget([
                        'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
                        'links' => [
                            Yii::t('app' ,'Compare Products'),
                        ],
                    ]);
                ?>

			</div>
		</div><!-- Page Breadcrumb /- -->
<div class="container padding-50" id="compare">
	<div class="table-responsive">
		<table class="table table-bordered">
		 <thead>
		  <tr> 
                <th><?= Yii::t('app' ,'NAME') ?></th>
                <?php foreach ($compare as $product) : ?>
                <th><a href="<?= Yii::$app->urlManager->createUrl(['/product/view' ,'id' =>$product->product_id]) ?>"><?= $product->name ?></a></th>
                <?php  endforeach; ?>

		  </tr> 
		</thead> 
		<tbody> 
			<tr> 
				<th scope="row"><?= Yii::t('app' ,'IMAGE') ?></th>
                <?php foreach ($compare as $product) : ?>
				    <td><?= Html::img('@web/img/products/'.$product->image ,['class' => 'img-responsive' ,'style'=>'height: 200px; width: 100%;']) ?></td>
                <?php  endforeach; ?>

			</tr> 
			<tr> 
				<th scope="row"><?= Yii::t('app' ,'price') ?></th>
                <?php foreach ($compare as $product) : ?>
                    <td><?= $product->price ?></td>
                <?php  endforeach; ?>

			</tr> 
			<tr> 

			<tr> 
				<th scope="row"><?= Yii::t('app' ,'manufacturer') ?></th>
                <?php foreach ($compare as $product) : ?>
                    <td><?= $product->manufacturer->manufacturers_name ?></td>
                <?php  endforeach; ?>
			</tr>

			<tr> 
				<th scope="row"><?= Yii::t('app' ,'weight') ?></th>
                <?php foreach ($compare as $product) : ?>
                    <td><?= $product->weight ?></td>
                <?php  endforeach; ?>
			</tr> 
			<tr>
                <th scope="row"><?= Yii::t('app' ,'height') ?></th>
                <?php foreach ($compare as $product) : ?>
                    <td><?= $product->height ?></td>
                <?php  endforeach; ?>
            </tr>
            <tr>
                <th scope="row"><?= Yii::t('app' ,'length') ?></th>
                <?php foreach ($compare as $product) : ?>
                    <td><?= $product->length ?></td>
                <?php  endforeach; ?>
            </tr>
		</tbody>
	</table> 
</div>
</div>
