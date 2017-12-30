<?php

/* @var $this \yii\web\View */
/* @var $content string */


use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

?>

    <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <?php

                        echo  Breadcrumbs::widget([
                            'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
                            'links' => [
                                Yii::t('app' ,'register\login'),
                            ],
                        ]);

                    ?>


                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>ثبت نام</h1>

                        <?php
                            $form = ActiveForm::begin([
                                'id'=>'signup-form',
                            ]);
                        ?>

                            <div class="form-group">
                                <label for="name">نام </label>
                                <?= $form->field($signupModel, 'customer_name')->textInput([ 'class'=>'form-control','maxlength' => true])->label(false) ?>
                            </div>

                            <div class="form-group">
                                <label for="name">نام کاربری</label>
                                <?= $form->field($signupModel, 'customer_username')->textInput([ 'class'=>'form-control','maxlength' => true])->label(false) ?>
                            </div>

                            <div class="form-group">
                                <label for="password">رمز عبور</label>
                                <?= $form->field($signupModel, 'customer_password')->passwordInput([ 'class'=>'form-control','maxlength' => true])->label(false) ?>
                            </div>

                            <div class="form-group">
                                <label for="email">پست الکترونیک</label>
                                <?= $form->field($signupModel, 'customer_email')->textInput([ 'class'=>'form-control','maxlength' => true])->label(false) ?>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i>عضویت</button>
                            </div>
                        <?php  ActiveForm::end(); ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>ورود</h1>

                       
                        <hr>


                            <?php
                                $form = ActiveForm::begin([
                                    'id'=>'login-form',
                                ]);
                            ?>
                            <div class="form-group">
                                <?= $form->field($model, 'username')->textInput([ 'class'=>'form-control','maxlength' => true])->label(false) ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control','maxlength' => true])->label(false) ?>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i>ورود</button>
                            </div>
                        <?php  ActiveForm::end(); ?>
                    </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
    
    
