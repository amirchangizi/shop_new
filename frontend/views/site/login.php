<?php
$this->title = Yii::t('app' ,'Login');
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
                        Yii::t('app' ,'login'),
                    ],
                ]);

                ?>
			</div>
		</div><!-- Page Breadcrumb /- -->
			
		<!-- Shop MyAccount Section -->
		<div class="container shopmy-account-section">
			<div class="padding-100"></div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="accounts-box">
						<h3>I'm a returning customer</h3>
                        <?php
                        $form = ActiveForm::begin([
                            'id'=>'login-form',
                            'options' => ['class' => 'accountsform'],

                        ]);
                        ?>
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-6">
									<div class="form-group">
										<label><?= Yii::t('app' ,'Username') ?> </label>
                                        <?= $form->field($model, 'username')->textInput([ 'class'=>'form-control', 'id' => "input_name",'maxlength' => true])->label(false) ?>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-6">
									<div class="form-group">
										<label><?= Yii::t('app' ,'password') ?> </label>
										<a href="#" title="Forgot your password?"><?= Yii::t('app' ,'Forgot your password?') ?> </a>
                                        <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control', 'id' => "input_password" ,'maxlength' => true])->label(false) ?>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
                                        <?= Html::input('submit',Yii::t('app','Login'),"Login", ['id' =>'btn_submit']) ?>

									</div>
								</div>
							</div>
                        <?php  ActiveForm::end(); ?>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="accounts-box layout2">
						<h3><?= Yii::t('app','Register an account') ?></h3>
						<form class="accountsform">
                                                    <div class="form-group">
                                                        <label>
                                                            <?= Yii::t('app','CREATE NEW ACCOUNT :') ?>
                                                            <br>
                                                            <?= Yii::t('app','With a NI user account, you can shop online, register and activate products, download updates, and take advantage of other protected services.') ?>
                                                        </label>
                                                    </div>
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-section">
                                        <div class="buttons-bg">
                                            <?= Html::a('Register', ['/site/register'], ['class'=>'btn btn-primary btn-lg pull-right']) ?>

                                        </div>
                                    </div>
									
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="padding-100"></div>
		</div><!-- Shop MyAccount Section /- -->
	</main>

