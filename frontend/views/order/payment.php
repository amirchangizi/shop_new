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

                <h2> <span class="fa fa-money"></span>  <?= Yii::t('app' ,'Payment Method') ?>  </h2><br>


                <div class="content">
                    <div class="row">
                        <?php
                        $form = ActiveForm::begin([
                            'id'=>'payment-form',
                        ]);

                        foreach ($paymentMethod as $payment) :
                            ?>

                            <div class="col-sm-6">
                                <div class="box payment-method">

                                    <h4><?= $payment ?></h4>

                                    <div class="box-footer text-center">
                                        <input type="radio" name="payment" value="<?= $payment ?>">
                                    </div>

                                </div>
                            </div>

                            <?php
                        endforeach;
                        ?>
                    </div>

                    <div class="box-footer">
                        <div class="pull-right">
                            <?= Html::a('<span class=" fa fa-chevron-right"></span>  بازگشت ', ['delivery'], ['class'=>'btn btn-default']) ?>
                        </div>
                        <div class="pull-left">
                            <?= Html::submitButton('<span class=" fa fa-chevron-left"></span>  ادامه', ['class'=>'btn btn-primary']) ?>
                        </div>
                    </div>

                    <?php
                    ActiveForm::end();
                    ?>
                    <!-- /.row -->

                </div>




            </div>
            <div class="col-md-4">

            </div>
            <!-- Order Payment Block -->

            <div class="padding-100"></div>
        </div>
</main>
