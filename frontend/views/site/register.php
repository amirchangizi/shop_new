<?php
$this->title = Yii::t('app' ,'Register');
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

?>
<main>
		<!-- Page Breadcrumb -->
		<div class="page-breadcrumb container-fluid no-padding">
			<div class="container">
                <?php

                echo  Breadcrumbs::widget([
                    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
                    'links' => [
                        Yii::t('app' ,'Register'),
                    ],
                ]);

                ?>

			</div>
		</div><!-- Page Breadcrumb /- -->
			
		<!-- Shop MyAccount Section -->
		<div class="container shopmy-account-section">
			<div class="padding-100"></div>
			<div class="row">
				
				<div class="col-md-12 col-sm-12">
					<div class="accounts-box layout2">
						<h3>Register an account</h3>
                        <?php
                        $form = ActiveForm::begin([
                            'id'=>'register-form',
                            'options' => ['class' => 'accountsform'],

                        ]);
                        ?>

							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-6">
									<div class="form-group">
										<label><?= Yii::t('app','name')  ?></label>
                                        <?= $form->field($model, 'customer_name')->textInput([ 'class'=>'form-control', 'id' => "input_name",'maxlength' => true])->label(false) ?>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<div class="form-group">
										<label><?= Yii::t('app','username')  ?></label>
                                        <?= $form->field($model, 'customer_username')->textInput([ 'class'=>'form-control', 'id' => "input_name",'maxlength' => true])->label(false) ?>
									</div>
								</div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
									<div class="form-group">
										<label><?= Yii::t('app','email')  ?></label>
                                        <?= $form->field($model, 'customer_email')->textInput([ 'class'=>'form-control', 'id' => "input_name",'maxlength' => true])->label(false) ?>
									</div>
								</div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
									<div class="form-group">
										<label><?= Yii::t('app','mobile')  ?></label>
                                        <?= $form->field($model, 'mobile')->textInput([ 'class'=>'form-control', 'id' => "input_name",'maxlength' => true])->label(false) ?>
									</div>
								</div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
									<div class="form-group">
										<label><?= Yii::t('app','password')  ?></label>
                                        <?= $form->field($model, 'customer_password')->passwordInput(['class'=>'form-control', 'id' => "input_password" ,'maxlength' => true])->label(false) ?>
									</div>
								</div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
									<div class="form-group">
										<label><?= Yii::t('app','repeat password')  ?></label>
                                        <?= $form->field($model, 'repeat_password')->passwordInput(['class'=>'form-control', 'id' => "input_password" ,'maxlength' => true])->label(false) ?>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
                                        <?= Html::input('submit',Yii::t('app','Register'),"register", ['id' =>'btn_submit2']) ?>

									</div>
								</div>
							</div>
                        <?php  ActiveForm::end(); ?>
					</div>
				</div>
			</div>
			<div class="padding-100"></div>
		</div><!-- Shop MyAccount Section /- -->
	</main>