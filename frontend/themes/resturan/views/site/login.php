<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app' ,'Login');

?>
<section id="" class="slider">
            
            <div class="slider_overlay">
                <div class="container">
                    
                        <div class="main_slider text-center">
                            <div class="col-md-12">
                                <div class="main_slider_content wow zoomIn" data-wow-duration="1s">
                                     
                                  <div class="login">
                                    <div class="card"></div>
                                    <div class="card">
                                      <h5 class="title">ورود به حساب کاربری</h5>

                                        <?php
                                            $form = ActiveForm::begin([
                                                'id'=>'login-form',
                                            ]);
                                        ?>

                                            <div class="input-login">

                                                <?= $form->field($model, 'username')->textInput([ 'class'=>'',  'placeholder'=>Yii::t('app','نام کاربری یا کد اشتراک'),'maxlength' => true])->label(false) ?>

                                              <div class="bar"></div>
                                            </div>
                                            <div class="input-login">

                                                <?= $form->field($model, 'password')->passwordInput(['class'=>'', 'placeholder'=>Yii::t('app','رمز عبور'),'maxlength' => true])->label(false) ?>

                                              <div class="bar"></div>
                                            </div>

                                            <div class="button-login">
                                                <?= Html::submitButton(Yii::t('app' ,'ورود')) ?>
                                            </div>


                                        <?php  ActiveForm::end(); ?>

                                        <div class="footer"><a href="<?= Yii::$app->urlManager->createUrl(['site/forgot']) ?>">فراموشی رمز عبور ؟</a></div>

                                    </div>
                                    <div class="card alt">
                                      <div class="toggle"></div>
                                      <h5 class="title">ثبت نام<br><br>
                                          <p>کد اشتراک به آدرس ایمیل شما ارسال خواهد شد</p>
                                          
                                        <div class="close"></div>
                                      </h5>

                                        <?php
                                            $form = ActiveForm::begin([
                                                'id'=>'signup-form',
                                            ]);
                                        ?>

                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-login">
                                                      <?= $form->field($signupModel, 'customer_username')->textInput([ 'class'=>'', 'placeholder'=>Yii::t('app','نام کاربری'),'maxlength' => true])->label(false) ?>

                                                    <div class="bar"></div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-login">
                                                    <?= $form->field($signupModel, 'customer_name')->textInput([ 'class'=>'', 'placeholder'=>Yii::t('app','نام و نام خانوادگی'),'maxlength' => true])->label(false) ?>

                                                    <div class="bar"></div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-login">
                                                    <?= $form->field($signupModel, 'phone')->textInput([ 'class'=>'', 'placeholder'=>Yii::t('app','شمراه تماس (ثابت)'),'maxlength' => true])->label(false) ?>
                                                    <div class="bar"></div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-login">
                                                    <?= $form->field($signupModel, 'customer_email')->textInput([ 'class'=>'', 'placeholder'=>Yii::t('app','ایمیل'),'maxlength' => true])->label(false) ?>

                                                    <div class="bar"></div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                          	<div class="col-lg-12">
                                          		<div class="input-login">
                                                    <?= $form->field($signupModel, 'customer_name')->textInput([ 'class'=>'', 'placeholder'=>Yii::t('app','آدرس'),'maxlength' => true])->label(false) ?>

                                                    <div class="bar"></div>
                                                  </div>
                                          	</div>
                                          </div>
                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-login">
                                                    <?= $form->field($signupModel, 'customer_name')->textInput([ 'class'=>'', 'placeholder'=>Yii::t('app','شماره تلفن همراه'),'maxlength' => true])->label(false) ?>
                                                    <div class="bar"></div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-login">
                                                    <?= $form->field($signupModel, 'customer_name')->textInput([ 'class'=>'', 'placeholder'=>Yii::t('app','کد پستی'),'maxlength' => true])->label(false) ?>

                                                    <div class="bar"></div>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="row">
                                              <div class="col-lg-6">
                                                  <div class="input-login">
                                                      <?= $form->field($signupModel, 'customer_password')->passwordInput([ 'class'=>'', 'placeholder'=>Yii::t('app','رمز عبور'),'maxlength' => true])->label(false) ?>

                                                    <div class="bar"></div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="input-login">
                                                      <?= $form->field($signupModel, 'customer_password')->passwordInput([ 'class'=>'', 'placeholder'=>Yii::t('app','تکرار رمز عبور'),'maxlength' => true])->label(false) ?>
                                                    <div class="bar"></div>
                                                  </div>
                                              </div>
                                          </div>
                                        <div class="button-login">
                                          <?= Html::submitButton(Yii::t('app' , 'عضویت')) ?>
                                        </div>
                                          <div class="footer"><a href="#"></a></div>
                                        <?php  ActiveForm::end(); ?>
                                    </div>
                                  </div>
                                </div>
                            </div>	
                        
                    </div>
                </div>
            </div>
        </section>

