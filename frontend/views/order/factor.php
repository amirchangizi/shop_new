<?php
use common\helpers\ZoneHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

$this->title =   Yii::t('app' ,'Check out');
?>
<main>
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumb container-fluid no-padding">
        <div class="container">
            <?php
            echo  Breadcrumbs::widget([
                'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links

                'links' => [
                    [
                        'label' => Yii::t('app' ,'Shopping cart'),
                        'url' => ['/order/cart'],
                        'template' => "<li><b>{link}</b></li>\n", // template for this link only
                    ],
                    Yii::t('app' ,'Check out'),
                ],
            ]);
            ?>
        </div>
    </div><!-- Page Breadcrumb /- -->

    <div class="container shop_checkout-section" style="margin-bottom: 20px;">
        <div class="padding-100"></div>
        <?php
        $form = ActiveForm::begin([
            'id'=>'address-form',
        ]);
        ?>
        <div class="col-md-8">


            <div class="col-md-12 box pull-right">

                <h2>   <?= Yii::t('app' ,'Factor') ?>  </h2><br>


                <div class="content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="2">نام محصول</th>
                                <th>تعداد</th>
                                <th>قیمت واحد</th>
                                <th>تخفیف</th>
                                <th>مجموع</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $sumOfProduct = 0 ;
                            foreach ($products as $product ) :
                                $sumOfProduct += $product['sum'] ;
                                ?>
                                <tr>
                                    <td>
                                        <a href="#">
                                            <?= Html::img('@web/img/product/'.$product['productImage']) ?>
                                        </a>
                                    </td>
                                    <td><?= $product['productName'] ?></td>
                                    <td><?= $product['count'] ?></td>
                                    <td><?= $product['productPrice'] ?></td>
                                    <td><?= $product['productDiscount'] ?></td>
                                    <td><?= $product['sum'] ?></td>
                                </tr>
                            <?php endforeach; ?>


                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="5">Total</th>
                                <th><?= $sumOfProduct ?></th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.table-responsive -->
                </div>




            </div>
            <div class="col-md-4">

            </div>
            <!-- Order Payment Block -->

            <div class="padding-100"></div>
        </div>
</main>
