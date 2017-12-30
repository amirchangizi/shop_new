<?php

/* @var $this \yii\web\View */
/* @var $content string */


use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

?>

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <?php

                    echo  Breadcrumbs::widget([
                        'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
                        'links' => [
                            Yii::t('app' ,'factor'),
                        ],
                    ]);

                ?>
            </div>

            <div class="col-md-12" id="checkout">

                <div class="box pull-right">

                        <h2>اطلاعات تحویل محصول</h2>
                        <ul class="nav nav-pills nav-justified">
                            <li class="">
                                <?= Html::a('<span class="fa fa-map-marker"></span> اطلاعات شخصی', ['']) ?>
                            </li>
                            <li class="">
                                <?= Html::a('<span class="fa fa-truck"></span> نوع تحویل', ['']) ?>
                            </li>
                            <li class="">
                                <?= Html::a('<span class="fa fa-money"></span> نوع پرداخت', ['']) ?>
                            </li>
                            <li class="active">
                                <?= Html::a('<span class="fa fa-eye"></span> نمایش فاکتور', ['review']) ?>
                            </li>
                        </ul>
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
                        <!-- /.content -->


                    <div class="box-footer">
                        <div class="pull-right">
                            <?= Html::a('<span class=" fa fa-chevron-right"></span>  بازگشت ', ['payment'], ['class'=>'btn btn-default']) ?>
                        </div>
                        <div class="pull-left">
                            <?= Html::a('<span class=" fa fa-chevron-left"></span>  پرداخت', [''], ['class'=>'btn btn-primary']) ?>
                        </div>
                    </div>

                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

            <!-- /.col-md-3 -->

        </div>
        <!-- /.container -->
    </div>
