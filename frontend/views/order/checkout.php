<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\helpers\ZoneHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div id="content">
    <div class="container">

        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><?= Html::a('', ['index'], ['class'=>'fa fa-home']) ?>
                </li>
                <li><?= Html::a('سبد خرید', ['basket'], ['class'=>'']) ?></li>
                <li>اطلاعات تحویل محصول</li>
            </ul>
        </div>

        <div class="col-md-9" id="checkout">

            <div class="box pull-right">

                    <h2>اطلاعات تحویل محصول</h2><br>
                    <ul class="nav nav-pills nav-justified">
                        <li class="active">
                            <?= Html::a('<span class="fa fa-map-marker"></span> اطلاعات شخصی', ['info']) ?>
                        </li>
                        <li class="disabled">
                            <?= Html::a('<span class="fa fa-truck"></span> نوع تحویل', ['']) ?>
                        </li>
                        <li class="disabled">
                            <?= Html::a('<span class="fa fa-money"></span> نوع پرداخت', ['']) ?>
                        </li>
                        <li class="disabled">
                            <?= Html::a('<span class="fa fa-eye"></span> نمایش محصولات انتخابی شما', ['']) ?>
                        </li>
                    </ul>



                    <!-- /.row -->
                    <?php
                        $form = ActiveForm::begin([
                            'id'=>'address-form',
                        ]);
                    ?>
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'postalcode')->textInput([ 'class'=>'form-control','maxlength' => true]) ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <?= $form->field($model, 'state')->dropDownList( ZoneHelper::getCountry(),[
                                                                                                                'class'=>'form-control',
                                                                                                                'maxlength' => true,
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
                                                                                                            ]) ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <?= $form->field($model, 'city')->dropDownList( [],[ 'class'=>'form-control','maxlength' => true ,'id'=>'city']) ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <?= $form->field($model, 'address')->textInput([ 'class'=>'form-control','maxlength' => true]) ?>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <?= $form->field($model, 'mobil')->textInput([ 'class'=>'form-control','maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?= $form->field($model, 'phon')->textInput([ 'class'=>'form-control','maxlength' => true]) ?>
                            </div>
                        </div>


                    </div>
                    <div class="box-footer">
                        <div class="pull-right">
                            <?= Html::a('<span class=" fa fa-chevron-right"></span>  بازگشت به سبد خرید', ['basket'], ['class'=>'btn btn-default']) ?>
                        </div>
                        <div class="pull-left">
                            <?= Html::submitButton('<span class=" fa fa-chevron-left"></span>  ادامه', ['class'=>'btn btn-primary']) ?>
                        </div>
                    </div>

                <?php  ActiveForm::end(); ?>

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

