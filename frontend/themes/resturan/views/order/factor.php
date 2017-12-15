<?php


/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;


/* @var $this yii\web\View */

$this->title = Yii::t('app','factor');
?>
<section id="" class="slider">

    <div class="slider_overlay">
        <div class="container">
            <div class="row">
                <div class="main_slider text-center">
                    <div class="col-md-12">
                        <div class="main_slider_content wow zoomIn" data-wow-duration="1s">
                            <div class="page-checkout">
                                <h4 style="padding-right: 10px;">فاکتور</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td class="text-right">نام غذا</td>
                                            <td class="text-right">تعداد</td>
                                            <td class="text-right">قیمت واحد</td>
                                            <td class="text-right">تخفیف</td>
                                            <td class="text-right">جمع کل</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sumOfProduct = 0 ;
                                        foreach ($products as $product ) :
                                            $sumOfProduct += $product['sum'] ;
                                        ?>

                                        <tr>
                                            <td class="text-right"><a href="#"><?= $product['productName'] ?></a></td>
                                            <td class="text-right"><?= $product['count'] ?></td>
                                            <td class="text-right"><?= $product['productPrice'] ?></td>
                                            <td class="text-right"><?= $product['productDiscount'] ?></td>
                                            <td class="text-right"><?= $product['productPrice'] * $product['count']  ?></td>
                                        </tr>

                                        <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-right"><strong>جمع جزء:</strong></td>
                                            <td class="text-right"><?= $sumOfProduct ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right"><strong>هزینه ارسال:</strong></td>
                                            <td class="text-right">0</td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="text-right"><strong>جمع کل:</strong></td>
                                            <td class="text-right"><?= $sumOfProduct ?></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div style="margin: 0px 15px 60px 15px;">
                                    <button class="checkout pull-left"><?= Html::a('تایید سفارش ', [''], ['class'=>'checkout']) ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>