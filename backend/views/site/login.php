<?php

/* @var $this \yii\web\View */
/* @var $content string */


use app\modules\usermanagement\models\ForgotForm;
use app\modules\usermanagement\models\LoginForm;
use app\modules\usermanagement\models\User;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\themes\ace\assets\LoginAsset;


$this->title = Yii::t('app','Login');

$bundle = LoginAsset::register($this);

/*if(isset($message)){
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'title' => 'System message!',
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => $message,
        'showSeparator' => true,
        'delay' => 3000
    ]);
    $message = null ;
}*/


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title ) ?></title>
    <?php $this->head() ?>

</head>

<body class="login-layout">

<?php $this->beginBody() ?>

    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="center">
                            <h1>
                                <i class="ace-icon fa fa-leaf green"></i>
                                <span class="red"><?= Yii::t('app',' Grapes') ?> </span>
                                <span class="white" id="id-text2"><?= Yii::t('app','Application') ?></span>
                            </h1>
                            <h4 class="blue" id="id-company-text"><?= Yii::t('app','&copy; Masa Co') ?> </h4>
                        </div>

                        <div class="space-6"></div>

                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger">
                                            <i class="ace-icon fa fa-coffee green"></i>
                                            <?= Yii::t('app','Please Enter Your Information') ?>
                                        </h4>

                                        <div class="space-6"></div>

                                        <?php
                                            $model = new LoginForm();
                                            $form = ActiveForm::begin(
                                                                        [
                                                                            'id' => 'login-form'
                                                                        ]);

                                        ?>

                                            <fieldset>
                                                <label class="block clearfix">
                                                            <span class="block input-icon input-icon-right">
                                                                <?= $form->field($model, 'username')->textInput(['autofocus' => true ,'class'=>'form-control','placeholder'=>Yii::t('app',"Username") ])->label(false) ?>
                                                                <i class="ace-icon fa fa-user"></i>
                                                            </span>
                                                </label>

                                                <label class="block clearfix">
                                                            <span class="block input-icon input-icon-right">
                                                                <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control','placeholder'=>Yii::t('app',"Password") ])->label(false) ?>
                                                                <i class="ace-icon fa fa-lock"></i>
                                                            </span>
                                                </label>

                                                <div class="space"></div>

                                                <div class="clearfix">
                                                    <label class="inline">

                                                        <span class="lbl"> </span>
                                                    </label>

                                                    <?= Html::submitButton('<i class="ace-icon fa fa-key"></i><span class="bigger-110">'. Yii::t("app","Login").'</span>', ['class' => 'width-35 pull-right btn btn-sm btn-primary', 'name' => 'login-button']) ?>
                                                </div>

                                                <div class="space-4"></div>
                                            </fieldset>

                                        <?php ActiveForm::end(); ?>

                                        <div class="social-or-login center">
                                            <span class="bigger-110"><?= Yii::t("app","Or Login Using") ?></span>
                                        </div>

                                        <div class="space-6"></div>

                                        <div class="social-login center">
                                            <a class="btn btn-primary">
                                                <i class="ace-icon fa fa-facebook"></i>
                                            </a>

                                            <a class="btn btn-danger">
                                                <i class="ace-icon fa fa-google-plus"></i>
                                            </a>
                                        </div>
                                    </div><!-- /.widget-main -->

                                    <div class="toolbar clearfix">
                                        <div>
                                            <a href="#" data-target="#forgot-box" class="forgot-password-link">
                                                <i class="ace-icon fa fa-arrow-left"></i>
                                                <?= Yii::t('app','I forgot my password') ?>
                                            </a>
                                        </div>

                                        <div>
                                            <a href="#" data-target="#signup-box" class="user-signup-link">
                                                <?= Yii::t('app','I want to register') ?>
                                                <i class="ace-icon fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div><!-- /.widget-body -->
                            </div><!-- /.login-box -->

                            <div id="forgot-box" class="forgot-box widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header red lighter bigger">
                                            <i class="ace-icon fa fa-key"></i>
                                            <?= Yii::t('app','Retrieve Password') ?>
                                        </h4>

                                        <div class="space-6"></div>
                                        <p>
                                            <?= Yii::t('app','Enter your email and to receive instructions') ?>
                                        </p>


                                        <?php
                                            $forgot = new ForgotForm() ;
                                            $form = ActiveForm::begin(['action'=>Yii::$app->urlManager->createUrl('forgot'),'id' => 'Retrieve-form']); ?>


                                            <fieldset>
                                                <label class="block clearfix">
                                                            <span class="block input-icon input-icon-right">
                                                                <?= $form->field($forgot, 'email')->textInput(['class'=>'form-control','placeholder'=>Yii::t('app',"Email") ])->label(false) ?>
                                                                <i class="ace-icon fa fa-envelope"></i>
                                                            </span>
                                                </label>

                                                <div class="clearfix">
                                                    <?= Html::submitButton('<i class="ace-icon fa fa-lightbulb-o"></i><span class="bigger-110"> '.Yii::t('app','Send Me!').' </span>', ['class' => 'width-35 pull-right btn btn-sm btn-danger', 'name' => 'register-button']) ?>


                                                </div>
                                            </fieldset>


                                        <?php ActiveForm::end(); ?>

                                    </div><!-- /.widget-main -->

                                    <div class="toolbar center">
                                        <a href="#" data-target="#login-box" class="back-to-login-link">
                                            <?= Yii::t('app','Back to login') ?>
                                            <i class="ace-icon fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div><!-- /.widget-body -->
                            </div><!-- /.forgot-box -->

                            <div id="signup-box" class="signup-box widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header green lighter bigger">
                                            <i class="ace-icon fa fa-users blue"></i>
                                            <?= Yii::t('app','New User Registration') ?>
                                        </h4>

                                        <div class="space-6"></div>
                                        <p> <?= Yii::t('app','Enter your details to begin:') ?> </p>

                                        <?php
                                            $register = new  User(['scenario' => User::SCENARIO_REGISTER]);
                                            $form = ActiveForm::begin(['action'=>Yii::$app->urlManager->createUrl('register'),'id' => 'register-form']); ?>

                                            <fieldset>
                                                <label class="block clearfix">
                                                            <span class="block input-icon input-icon-right">
                                                                <?= $form->field($register, 'email')->textInput(['class'=>'form-control','placeholder'=>Yii::t('app',"Email") ])->label(false) ?>
                                                                <i class="ace-icon fa fa-envelope"></i>
                                                            </span>
                                                </label>

                                                <label class="block clearfix">
                                                            <span class="block input-icon input-icon-right">
                                                                <?= $form->field($register, 'name')->textInput(['class'=>'form-control','placeholder'=>Yii::t('app',"Name") ])->label(false) ?>
                                                                <i class="ace-icon fa fa-user"></i>
                                                            </span>
                                                </label>

                                                <label class="block clearfix">
                                                            <span class="block input-icon input-icon-right">
                                                                <?= $form->field($register, 'user_name')->textInput(['class'=>'form-control','placeholder'=>Yii::t('app',"Username") ])->label(false) ?>
                                                                <i class="ace-icon fa fa-user"></i>
                                                            </span>
                                                </label>

                                                <label class="block clearfix">
                                                            <span class="block input-icon input-icon-right">
                                                                <?= $form->field($register, 'password')->passwordInput(['class'=>'form-control','placeholder'=>Yii::t('app',"Password") ])->label(false) ?>
                                                                <i class="ace-icon fa fa-lock"></i>
                                                            </span>
                                                </label>

                                                <label class="block clearfix">
                                                            <span class="block input-icon input-icon-right">
                                                                <?= $form->field($register, 'repeat_password')->passwordInput(['class'=>'form-control','placeholder'=>Yii::t('app',"Repeat password") ])->label(false) ?>
                                                                <i class="ace-icon fa fa-retweet"></i>
                                                            </span>
                                                </label>

                                                <label class="block">
                                                    <?= $form->field($register, 'accept')->checkbox([])->label(false) ?>

                                                    <span class="lbl">
                                                                <?= Yii::t('app','I accept the')?>
                                                                <a href="#"><?= Yii::t('app','User Agreement')?> </a>
                                                            </span>
                                                </label>

                                                <div class="space-24"></div>

                                                <div class="clearfix">

                                                    <?= Html::resetButton('<i class="ace-icon fa fa-refresh"></i><span class="bigger-110">'.Yii::t('app','Reset').'</span>',['class' =>'width-30 pull-left btn btn-sm']) ?>

                                                    <?= Html::submitButton('<span class="bigger-110">'.Yii::t('app','Register').'</span><i class="ace-icon fa fa-arrow-right icon-on-right"></i>', ['class' => 'width-65 pull-right btn btn-sm btn-success', 'name' => 'register-button']) ?>
                                                </div>
                                            </fieldset>

                                        <?php ActiveForm::end(); ?>

                                    </div>

                                    <div class="toolbar center">
                                        <a href="#" data-target="#login-box" class="back-to-login-link">
                                            <i class="ace-icon fa fa-arrow-left"></i>
                                            <?= Yii::t('app','Back to login') ?>
                                        </a>
                                    </div>
                                </div><!-- /.widget-body -->
                            </div><!-- /.signup-box -->
                        </div><!-- /.position-relative -->

                        <div class="navbar-fixed-top align-right">
                            <br />
                            &nbsp;
                            <a id="btn-login-dark" href="#">Dark</a>
                            &nbsp;
                            <span class="blue">/</span>
                            &nbsp;
                            <a id="btn-login-blur" href="#">Blur</a>
                            &nbsp;
                            <span class="blue">/</span>
                            &nbsp;
                            <a id="btn-login-light" href="#">Light</a>
                            &nbsp; &nbsp; &nbsp;
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <script type="text/javascript">
        if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function($) {
            $(document).on('click', '.toolbar a[data-target]', function(e) {
                e.preventDefault();
                var target = $(this).data('target');
                $('.widget-box.visible').removeClass('visible');//hide others
                $(target).addClass('visible');//show target
            });
        });



        //you don't need this, just used for changing background
        jQuery(function($) {
            $('#btn-login-dark').on('click', function(e) {
                $('body').attr('class', 'login-layout');
                $('#id-text2').attr('class', 'white');
                $('#id-company-text').attr('class', 'blue');

                e.preventDefault();
            });
            $('#btn-login-light').on('click', function(e) {
                $('body').attr('class', 'login-layout light-login');
                $('#id-text2').attr('class', 'grey');
                $('#id-company-text').attr('class', 'blue');

                e.preventDefault();
            });
            $('#btn-login-blur').on('click', function(e) {
                $('body').attr('class', 'login-layout blur-login');
                $('#id-text2').attr('class', 'white');
                $('#id-company-text').attr('class', 'light-blue');

                e.preventDefault();
            });

        });
    </script>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>