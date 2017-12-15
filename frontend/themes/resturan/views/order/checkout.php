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
                                    	<h4 style="padding-right: 10px;">اطلاعات ارسال سفارش</h4>
                                    	<hr style="border-top: 2px solid #e7a331; ">


                                        <?php
                                        $form = ActiveForm::begin([
                                            'id'=>'address-form',
                                        ]);
                                        ?>


                                        <?= $form->field($model, 'state')->dropDownList( ZoneHelper::getCountry(),[
                                            'class'=>'form-control',
                                            'maxlength' => true,
                                            'prompt' => '-- select an item --' ,
                                            'onChange' =>'
                                                                                                                        $.get( "'.Url::toRoute('/order/zone').'", { id: $(this).val() } )
                                                                                                                            .success(function( data ) {
                                                                                                                                    $("#city").empty();
                                                                                                                                    $.each(data, function(text, key) {
                                                                                                                                        var option = new Option(key, text);
                                                                                                                                        $("#city").append($(option));
                                                                                                                                        
                                                                                                                                    });
                                                                                                                            }
                                                                                                                        );
                                                                                                                    '
                                        ])->label(false) ?>
                                        <?= $form->field($model, 'city')->dropDownList( [],[ 'class'=>'form-control','maxlength' => true ,'id'=>'city'])->label(false) ?>

                                        <?= $form->field($model, 'address')->textInput([ 'placeholder'=> Yii::t('app','Enter Address') ,'class'=>'form-control','maxlength' => true])->label(false) ?>

                                        <?= $form->field($model, 'mobil')->textInput(['placeholder'=> Yii::t('app','Enter mobile') , 'class'=>'form-control','maxlength' => true])->label(false) ?>

                                        <?= $form->field($model, 'phon')->textInput(['placeholder'=> Yii::t('app','Enter Phone') , 'class'=>'form-control','maxlength' => true])->label(false) ?>

                                        <div style="margin: 0px 5px 60px 15px;">
                                            <?= Html::submitButton('checkout ', [''], ['class'=>'checkout']) ?>
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
     