<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\helpers\LanguageHelper;
use yii\helpers\Html;

use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="super_container">
    <header class="header trans_300">
        <!-- Burger Menu -->
        <div class="burger-menu-block">
            <span id="popup-close-button"><a class="fa fa-close"></a></span>
            <div class="burger-menu-content">
                <h3><?= Yii::t('app' ,'Other PAges') ?></h3>
                <ul>
                    <li><?= Html::a('My account', ['account'], ['class'=>'']) ?></li>
                    <li><?= Html::a('Contact us', ['contact'], ['class'=>'']) ?></li>
                    <li><?= Html::a('Second hand products', ['marketform'], ['class'=>'']) ?></li>
                    <li><?= Html::a('Blogs', ['blogs'], ['class'=>'']) ?></li>
                    <li><?= Html::a('FAQ', ['faq'], ['class'=>'']) ?></li>
                    <li><?= Html::a('About us', ['about'], ['class'=>'']) ?></li>
                </ul>
            </div>

        </div><!-- Burger Menu /- -->
        <!-- Top Navigation -->

        <div class="top_nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="top_nav_left">
                            <a href="">
                                <?= Html::img('@web/img/logo.jpg',['class' => 'img-responsive', 'style' => 'height: 40px; margin-top: 5px;']) ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9 text-right">
                        <div class="top_nav_right">
                            <ul class="top_nav_menu">

                                <!-- Currency / Language / My Account -->

                                <li class="currency">

                                    <div id="sb-search" class="sb-search " >
                                            <form>
                                                    <input class="sb-search-input " onkeyup="buttonUp();" placeholder="<?= Yii::t('app' ,'Enter your search term...') ?>" onblur="monkey();" type="search" value="" name="search" id="search">
                                                    <input class="sb-search-submit" type="submit"  value="">
                                                    <span class="sb-icon-search"><i class="fa fa-search"></i></span>
                                                </form>
                                    </div>

                                </li>

                                <li class="language">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['/order/cart']) ?>">
                                        <?= Html::img('@web/img/shopping-bag.png',['class' => '']) ?>
                                    </a>
                                    <ul class="language_selection">
                                        <?php
                                            if(\app\helper\productOrderFacade::countOfBasket() == 0):
                                        ?>
                                            <div class="emprt-cart">
                                                <?= Html::img('@web/img/empty-cart.jpg') ?>
                                                <p><?= Yii::t('app' ,'Your Cart Is Empty') ?></p>
                                            </div>
                                        <?php
                                            endif;
                                        ?>
                                    </ul>
                                </li>
                                <li class="language btn-login">
                                    <?= Html::a('', ['/site/login'], ['class'=>'fa fa-user']) ?>
                                </li>
                                <li class="account">
                                    <a href="#">
                                        <?php
                                        $cookies = Yii::$app->request->cookies;

                                        if(isset($cookies['language']) && $cookies['language']->value == 'fa-IR')
                                            echo Html::img('@web/img/ir-flag.png',['class' => '']) ;
                                        else
                                            echo Html::img('@web/img/eng-flag.png',['class' => ''])
                                        ?>

                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="account_selection">
                                        <li><a href="<?= Yii::$app->urlManager->createUrl(['/site/lang' , 'lang'=>'fa-IR']) ?>"><?= Html::img('@web/img/ir-flag.png') ?>Persian</a></li>
                                        <li><a href="<?= Yii::$app->urlManager->createUrl(['/site/lang' , 'lang'=>'en-US']) ?>"><?= Html::img('@web/img/eng-flag.png') ?>English</a></li>
                                    </ul>
                                </li>

                                <li class="account" style="margin-top: -50px; padding-left: 2em;">
                                    <a href="#">
                                        <div class="">
                                            <div class="burger-menu">
                                                                                    <a href="#" title="menu">
                                                                                        <?= Html::img('@web/img/burger-menu-ic.png',['class' => '']) ?>
                                                                                        </a>
                                                                                </div>
                                        </div>
                                    </a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
<div class="menu-block">
    <!-- Container -->
    <div class="">
        <!-- nav -->
        <nav class="navbar ow-navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="">
                        <a href="<?= Yii::$app->urlManager->createUrl(['/'])?>" class="" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                    </li>
                    <?= \frontend\widgets\MenuWidget::widget() ?>

                </ul>
            </div><!--/.nav-collapse -->
        </nav><!-- nav /- -->
    </div><!-- Container /- -->
</div>

<?= $content ?>
<div class="footer-main footer-section2 footer6 container-fluid no-padding">
    <div class="padding-60"></div>
    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <aside class="ftr-widget ftr_about_widget">
                    <a href="#" title="Logo">
                        <?= Html::img('@web/img/logo.jpg',['class' => 'img-responsive', 'style' => '']) ?>
                    </a>
                    <p><?= Yii::t('app' ,'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences.') ?></p>
                    <p><i class="fa fa-map-marker"></i>
                        <?= Yii::t('app' ,'W105NN Portobello Square, London') ?></p>
                    <p><i class="fa fa-phone"></i> <a href=""><?= Yii::t('app' ,'+98 987 654 123') ?></a></p>
                    <p><i class="fa fa-envelope-o"></i> <a href=""><?= Yii::t('app' ,'info@masa.co.ir') ?></a></p>
                    <ul>
                        <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" title="Twiiter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" title="LinkedIn"><i class="fa fa-paper-plane"></i></a></li>
                        <li><a href="#" title="Dribbble"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </aside>
            </div>
            <div class="col-md-3 col-sm-6">
                <aside class="ftr-widget ftr_link">
                    <h3 class="widget-title"><?= Yii::t('app' ,'Information') ?></h3>
                    <ul>
                        <?php
                            $info = \common\helpers\InformationHelper::getBottomInformation(8) ;
                            if($info):
                            foreach ($info as $id => $title):
                        ?>
                            <li><a href="<?= Yii::$app->urlManager->createUrl(['information/information' ,'infoId' => $id]) ?>"><?= $title ?></a></li>
                        <?php
                            endforeach;
                            endif;
                        ?>
                    </ul>
                </aside>
            </div>
            <div class="col-md-3 col-sm-6">
                <aside class="ftr-widget ftr_link">
                    <h3 class="widget-title"><?= Yii::t('app' ,'links') ?></h3>
                    <ul>
                        <li><a href="#">Single project</a></li>
                        <li><a href="#">Portfolio masonry</a></li>
                        <li><a href="#">Client testionials</a></li>
                        <li><a href="#">New page examples</a></li>
                        <li><a href="#">Blog with sidebar</a></li>
                        <li><a href="#">Single blog post</a></li>
                        <li><a href="#">Homepage slider</a></li>
                        <li><a href="#">Shopping cart</a></li>
                    </ul>
                </aside>
            </div>
            <div class="col-md-3 col-sm-6">
                <aside class="ftr-widget ftr_gallery_widget">
                    <h3 class="widget-title"><?= Yii::t('app' ,'Newsletter') ?></h3>
                    <p><?= Yii::t('app' ,'Subscribe to our newsletter and get off your first purchase') ?></p>
                    <form action="post">
                        <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                            <input id="newsletter_email" type="email" placeholder="<?= Yii::t('app' ,'Your email') ?>" required="required" data-error="Valid email is required.">
                            <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit"><?= Yii::t('app' ,'subscribe') ?></button>
                        </div>
                    </form>
                </aside>
            </div>
        </div>
    </div><!-- Container /- -->
    <div class="copyright container-fluid">
        <div class="container">
            <p><?= Yii::t('app' ,'Powered by') ?> <a href="http://masa.co.ir" target="_blanck"><?= Yii::t('app' ,'masa designers') ?></a></p>
            <p><?= Yii::t('app' ,'&copy; Copyright 2016 Metrica. All rights reserved.') ?></p>
        </div>
    </div><!-- Bottom Footer /- -->
</div><!-- Footer 6 /- -->



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
