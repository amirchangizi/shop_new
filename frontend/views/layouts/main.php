<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\helper\productOrderFacade;
use yii\bootstrap\Alert ;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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


<!-- *** TOPBAR ***
_________________________________________________________ -->
<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <li><a href="#"><i class="fa fa-user"></i>حساب کاربری</a></li>
                        <li><a href="#"><i class="fa fa-heart"></i>لیست دلخواه</a></li>
                        <li>
                            <?php

                                if(Yii::$app->user->isGuest)
                                    echo Html::a(Yii::t('app','login vs register' ), ['/site/login']) ;
                                else
                                    echo Html::a( Yii::$app->user->identity->customer_name . "(" .  Yii::t('app','logout' ) .")", ['/site/logout']) ;

                            ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="header-right pull-left">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">زبان :</span><span class="value">FA-IR</span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">FA</a></li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">واحد ارز :</span><span class="value">ریال </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">ریال</a></li>
                                <li><a href="#">$</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <img src="img/logo.jpg">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="shopping-item pull-left">
                    <a href="<?= Yii::$app->urlManager->createUrl(['order/cart']) ?>">سبد خرید- <span class="cart-amunt">
                        <?php
                            $order = new  productOrderFacade();
                            echo $order->sumOfOrder() ;
                        ?></span>
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div> <!-- End site branding area -->

<!-- *** NAVBAR ***
_________________________________________________________ -->
<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>


            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <?= \frontend\widgets\MenuWidget::widget() ?>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">


            <!--/.nav-collapse -->

            <div class="navbar-collapse collapse right" id="search-not-mobile">
                <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>

        </div>

        <div class="collapse clearfix" id="search">

            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="جستجو">
                    <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                </div>
            </form>

        </div>
        <!--/.nav-collapse -->

    </div>
    <!-- /.container -->
</div>

<!-- /#navbar -->

<!-- *** NAVBAR END *** -->

<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>

<?= $content ?>

<!-- *** FOOTER ***

 _________________________________________________________ -->
<br><br><br>
<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">

            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4><?= Yii::t('app','Information') ?></h4>
                <ul>
                    <?php
                        $infoList = \common\helpers\InformationHelper::getBottomInformation(5) ;
                        if($infoList)
                            foreach ($infoList as $infoId => $title):
                    ?>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl(['information/information' ,'infoId' => $infoId ]) ?>"><?= $title ?></a>
                                </li>
                    <?php
                        endforeach;
                    ?>

                </ul>


                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>ارتباط با ما</h4>

                <p><strong>آدرس :</strong>
                    <br>تهران خیابان شهید گمنام
                    <br>کوچه هفتم پلاک 21 واحد 5
                </p>
                <p><strong>شمراه تماس:</strong>
                    <br>021-88989564
                    <br>0912-1234567
                </p>
                <p><strong>آدرس ایمیل:</strong>
                    <br>info@masa.co.ir
                </p>

                <a href="contact.html">صفحه ارتباط با ما</a>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->




            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#footer -->

<!-- *** FOOTER END *** -->




<!-- *** COPYRIGHT ***
_________________________________________________________ -->
<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-right">طراحی شده توسط <a href="http://masa.co.ir" target="-blanck"> گروه طراحی ماسا</a></p>
        </div>
        <div class="col-md-6">
            <p class="pull-left"> تمامی حقوق برای ما محفوظ است All rights reserved ©</p>
        </div>
    </div>
</div>
<!-- *** COPYRIGHT END *** -->



</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
