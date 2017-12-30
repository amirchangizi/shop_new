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
					<h3 class="blocktitle"><?= Yii::t('app' ,'Enter Your address.') ?></h3>
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="form-group">
								<label><?= Yii::t('app' ,'Postal code') ?></label>
                                <?= $form->field($model, 'postalcode')->textInput(['id'=> 'input_name' , 'class'=>'form-control','maxlength' => true])->label(false) ?>

							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="form-group">
								<label><?= Yii::t('app' ,'state') ?></label>
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
                                ])->label(false) ?>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label><?= Yii::t('app' ,'city') ?></label>
                                <?= $form->field($model, 'city')->dropDownList( [],[ 'class'=>'form-control','maxlength' => true ,'id'=>'city'])->label(false) ?>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label><?= Yii::t('app' ,'address') ?></label>
                                <?= $form->field($model, 'address')->textInput([ 'class'=>'form-control','maxlength' => true])->label(false) ?>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label><?= Yii::t('app' ,'mobil') ?></label>
                                <?= $form->field($model, 'mobil')->textInput([ 'class'=>'form-control','maxlength' => true])->label(false) ?>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
							<label><?= Yii::t('app' ,'phon') ?></label>
                                <?= $form->field($model, 'phon')->textInput([ 'class'=>'form-control','maxlength' => true])->label(false) ?>
							</div>
						</div>

                    <?= Html::input('submit','Next',Yii::t('app','Send & Next'), ['id' =>'btn_submit' ,'class'=>'btn btn-success']) ?>
					</div>
                    <?php  ActiveForm::end(); ?>
				</div>
				<div class="col-md-4">

				</div>
				<!-- Order Payment Block -->

			<div class="padding-100"></div>
		</div>
	</main>
     