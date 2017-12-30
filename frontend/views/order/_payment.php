<?php

/* @var $this \yii\web\View */
/* @var $content string */


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

?>

<div id="content">
            <div class="container">

                <div class="col-md-12">
                    <?php

                    echo  Breadcrumbs::widget([
                        'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
                        'links' => [
                            Yii::t('app' ,'payment'),
                        ],
                    ]);

                    ?>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box pull-right">

                            <h2>اطلاعات تحویل محصول</h2><br>
                            <ul class="nav nav-pills nav-justified">
                                <li class="">
                                    <?= Html::a('<span class="fa fa-map-marker"></span> اطلاعات شخصی', ['info']) ?>
                                </li>
                                <li class="">
                                    <?= Html::a('<span class="fa fa-truck"></span> نوع تحویل', ['delivery']) ?>
                                </li>
                                <li class="active">
                                    <?= Html::a('<span class="fa fa-money"></span> نوع پرداخت', ['payment']) ?>
                                </li>
                                <li class="disabled">
                                    <?= Html::a('<span class="fa fa-eye"></span> نمایش فاکتور', ['review']) ?>
                                </li>
                            </ul>
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
                            <!-- /.content -->



                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">


                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>