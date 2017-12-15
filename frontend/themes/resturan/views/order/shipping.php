<?php


/* @var $this \yii\web\View */
/* @var $content string */

use common\helpers\ZoneHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */

$this->title = Yii::t('app' ,'Check out') ;
?><section id="" class="slider">

    <div class="slider_overlay">
        <div class="container">
            <div class="row">
                <div class="main_slider text-center">
                    <div class="col-md-12">
                        <div class="main_slider_content wow zoomIn" data-wow-duration="1s">
                            <div class="page-checkout">
                                <h4 style="padding-right: 10px;">روش حمل و نقل</h4>
                                <hr style="border-top: 2px solid #e7a331; ">


                                <?php
                                $form = ActiveForm::begin([
                                    'id'=>'shipping-form',
                                ]);

                                    foreach ($shippingMethod as  $method) :
                                ?>
                                        <input type="radio" name="delivery" value="<?= $method ?>" style="margin-top: 10px;"></i><?= $method ?><br>
                                <?php endforeach; ?>

                                <div style="margin: 0px 5px 60px 15px;">
                                    <?= Html::submitButton('Next step', [''], ['class'=>'checkout']) ?>
                                </div>
                                <?php  ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
