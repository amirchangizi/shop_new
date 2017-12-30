<?php


/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */

$this->title =   Yii::t('app' ,'Shopping cart');
?>

<main class="site-main page-spacing">
		<!-- Page Breadcrumb -->
		<div class="page-breadcrumb container-fluid no-padding">
			<div class="container">
                <?php
                echo  Breadcrumbs::widget([
                    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
                    'links' => [
                        Yii::t('app' ,'Shopping cart'),
                    ],
                ]);
                ?>
			</div>
		</div><!-- Page Breadcrumb /- -->
		<!-- Shop Section -->
		<div id="product-cart" class="product-cart woocommerce container-fluid no-padding">
			<div class="padding-100"></div>
			<!-- Container -->
			<div class="container">
				<div class="row">
					<!-- Order Summary -->
					<div class="col-md-9 col-sm-9 col-xs-12 order-summary">
						<div class="order-summary-content">
							<table class="shop_cart">
								<thead>
									<tr>
										<th colspan="3" class="product-thumbnail"> <?= Yii::t('app' ,'Product') ?> </th>
										<th class="product-price"><?= Yii::t('app' ,'Price') ?></th>
										<th class="product-quantity"><?= Yii::t('app' ,'Quantity') ?></th>
										<th class="product-subtotal"><?= Yii::t('app' ,'Total') ?></th>
									</tr>
								</thead>
								<tbody>

                                <?php
                                $sumOfProduct = 0  ;
                                    foreach ($product as $item):
                                ?>

									<tr class="cart_item">
										<td data-title="Remove" class="product-remove">
											<a href="<?= Yii::$app->urlManager->createUrl(['order/remove' , 'id'=>$item['productId']]) ?>" title="Remove"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
										</td>
										<td data-title="Product" class="product-thumbnail">
											<a href="<?= Yii::$app->urlManager->createUrl(['product/view' , 'id'=>$item['productId']]) ?>">
                                                <?= Html::img('@web/img/products/'.$item['productImage'] ,['class'=>'attachment-shop_thumbnail wp-post-image']) ?>
                                            </a>
										</td>
										<td data-title="Product Name" class="product-name">
											<a title="Product Name" href="<?= Yii::$app->urlManager->createUrl(['product/view' , 'id'=>$item['productId']]) ?>"><?= $item['productName'] ?></a>
										</td>
										<td data-title="Total" class="product-price">
											<span><?= $item['productPrice'] ?></span>
										</td>										
										<td data-title="Quantity" class="product-quantity">
											<!-- <input type="button" data-field="quantity1" class="qtyminus btn" value="-"> -->
											<input type="text" class="qty btn" value="<?= $item['count'] ?>" name="quantity1">
                                            <!-- <input type="button" data-field="quantity1" class="qtyplus btn" value="+"> -->
										</td>
										<td data-title="Total" class="product-price">
											<span><?= $item['productPrice'] ?></span>
										</td>
									</tr>

                                <?php
                                        $sumOfProduct += $item['sum'] ;
                                    endforeach;
                                ?>
								</tbody>
							</table>
						</div>
					</div><!-- Order Summary /- -->
					<div class="col-md-3 col-sm-3 col-xs-12 calculate-shipping">


					</div>
				</div>
            <div class="box-footer">

                <div class="pull-left">
                    <?= Html::a('<span class="fa fa-chevron-left">  </span>  ' .Yii::t('app','Next'), ['checkout'], ['class'=>' btn btn-primary']) ?>
                </div>
                <div class="pull-right">
                    <?= Html::a('<span class="fa fa-chevron-right"></span>  '.Yii::t('app','Back') , ['/'], ['class'=>'btn btn-default']) ?>
                </div>
            </div>
			</div><!-- Container /- -->
			<div class="padding-100"></div>

		</div><!-- Shop Section /- -->
	</main>

