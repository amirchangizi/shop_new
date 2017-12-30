<?php
use yii\helpers\Html;
/* @var $this yii\web\View */


?>
<a href=""><img src="img/banner.jpg" class="img-responsive" style="width: 100%; height: 450px; margin-top: 7em;"></a>

<!-- Deal of the week -->

<div class="deal_ofthe_week">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="deal_ofthe_week_img">
                    <?= Html::img('@web/img/offer.jpg',['class' => 'img-responsive']) ?>
                </div>
            </div>
            <div class="col-lg-6 text-right deal_ofthe_week_col">
                <div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
                    <div class="section_title">
                        <h2><?= Yii::t('app' ,'Offer Products') ?></h2>
                    </div>
                    <ul class="timer">
                        <li class="d-inline-flex flex-column justify-content-center align-items-center">
                            <div id="day" class="timer_num"><?= Yii::t('app' ,'03') ?></div>
                            <div class="timer_unit"><?= Yii::t('app' ,'Day') ?></div>
                        </li>
                        <li class="d-inline-flex flex-column justify-content-center align-items-center">
                            <div id="hour" class="timer_num"><?= Yii::t('app' ,'15') ?></div>
                            <div class="timer_unit"><?= Yii::t('app' ,'Hours') ?></div>
                        </li>
                        <li class="d-inline-flex flex-column justify-content-center align-items-center">
                            <div id="minute" class="timer_num"><?= Yii::t('app' ,'45') ?></div>
                            <div class="timer_unit"><?= Yii::t('app' ,'Mins') ?></div>
                        </li>
                        <li class="d-inline-flex flex-column justify-content-center align-items-center">
                            <div id="second" class="timer_num"><?= Yii::t('app' ,'23') ?></div>
                            <div class="timer_unit"><?= Yii::t('app' ,'Sec') ?></div>
                        </li>
                    </ul>
                    <div class="btn-cont">
                        <a href="javascript:void(0)"><div class="btn"><span><?= Yii::t('app' ,'Shop Now') ?></span></div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="category-index padding-100" style="z-index: 9;">

    <div class="category-index padding-100" style="z-index: 9;">
        <div class="col-md-5 col-xs-12 no-padding padding-l padding-xs-r margin-b pic1">
            <a href="#">
                <div class="category-img">
                    <?= Html::img('@web/img/prod/pic1.png',['class' => 'img-responsive height-lg']) ?>
                    <div class="categoty-text">
                        <h3 class="text"><?= Yii::t('app' ,'Title1') ?></h3>
                        <div class="border"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-7 col-xs-12 no-padding margin-b">
            <div class="col-md-4 col-xs-6 margin-t pic1">
                <a href="#">
                    <div class="category-img">
                        <?= Html::img('@web/img/prod/pic2.png',['class' => 'img-responsive height-lg']) ?>
                        <div class="categoty-text">
                            <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                            <div class="border"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-xs-6 no-padding margin-t padding-xs-r pic1">
                <a href="#">
                    <div class="category-img">
                        <?= Html::img('@web/img/prod/pic3.png',['class' => 'img-responsive height-lg']) ?>
                        <div class="categoty-text">
                            <h3 class="text"><?= Yii::t('app' ,'Title3') ?></h3>
                            <div class="border"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="col-md-12 col-xs-6 no-padding margin-t padding-xs-r pic1"  style="margin-bottom: 13px;">
                    <a href="#">
                        <div class="category-img">
                            <?= Html::img('@web/img/prod/pic4.png',['class' => 'img-responsive height-md']) ?>
                            <div class="categoty-text">
                                <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                                <div class="border"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 col-xs-6 no-padding margin-t pic1">
                    <a href="#">
                        <div class="category-img">
                            <?= Html::img('@web/img/prod/pic5.png',['class' => 'img-responsive height-md']) ?>
                            <div class="categoty-text">
                                <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                                <div class="border"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-xs-12 no-padding padding-l padding-xs-r margin-b pic1">
            <a href="#">
                <div class="category-img">
                    <?= Html::img('@web/img/prod/pic6.png',['class' => 'img-responsive height-lg']) ?>
                    <div class="categoty-text">
                        <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                        <div class="border"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-7 col-xs-12 no-padding margin-b">
            <div class="col-md-8 col-xs-12 no-padding padding-l">
                <div class="col-md-12 no-padding margin-t padding-xs-r pic1" style="margin-bottom: 13px;">
                    <a href="#">
                        <div class="category-img">
                            <?= Html::img('@web/img/prod/pic7.png',['class' => 'img-responsive height-md']) ?>
                            <div class="categoty-text">
                                <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                                <div class="border"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xs-6 no-padding padding-r-sm pic1">
                    <a href="#">
                        <div class="category-img">
                            <?= Html::img('@web/img/prod/pic8.png',['class' => 'img-responsive height-md']) ?>
                            <div class="categoty-text">
                                <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                                <div class="border"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xs-6 no-padding padding-l-sm padding-xs-r pic1">
                    <a href="#">
                        <div class="category-img">
                            <?= Html::img('@web/img/prod/pic9.png',['class' => 'img-responsive height-md']) ?>
                            <div class="categoty-text">
                                <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                                <div class="border"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-6 margin-t pic1">
                <a href="#">
                    <div class="category-img">
                        <?= Html::img('@web/img/prod/pic10.png',['class' => 'img-responsive height-lg']) ?>
                        <div class="categoty-text">
                            <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                            <div class="border"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-5 col-xs-12 no-padding padding-l padding-xs-r margin-b">
            <div class="col-md-12 col-xs-12 no-padding margin-t pic1" style="margin-bottom: 13px;">
                <a href="#">
                    <div class="category-img">
                        <?= Html::img('@web/img/prod/pic11.png',['class' => 'img-responsive height-md']) ?>
                        <div class="categoty-text">
                            <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                            <div class="border"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xs-6 no-padding padding-r-sm pic1">
                <a href="#">
                    <div class="category-img">
                        <?= Html::img('@web/img/prod/pic12.png',['class' => 'img-responsive height-md']) ?>
                        <div class="categoty-text">
                            <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                            <div class="border"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xs-6 no-padding padding-l-sm pic1">
                <a href="#">
                    <div class="category-img">
                        <?= Html::img('@web/img/prod/pic13.png',['class' => 'img-responsive height-md']) ?>
                        <div class="categoty-text">
                            <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                            <div class="border"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-7 col-xs-12 no-padding margin-b">
            <div class="col-md-8 col-xs-8 no-padding padding-l margin-t pic1">
                <a href="#">
                    <div class="category-img">
                        <?= Html::img('@web/img/prod/pic14.png',['class' => 'img-responsive height-lg']) ?>
                        <div class="categoty-text">
                            <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                            <div class="border"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-xs-4 margin-t pic1">
                <a href="#">
                    <div class="category-img">
                        <?= Html::img('@web/img/prod/pic15.png',['class' => 'img-responsive height-lg']) ?>
                        <div class="categoty-text">
                            <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                            <div class="border"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-5 col-xs-12 no-padding padding-l padding-xs-r margin-t pic1">
            <a href="#">
                <div class="category-img">
                    <?= Html::img('@web/img/prod/pic17.png',['class' => 'img-responsive height-lg']) ?>
                    <div class="categoty-text">
                        <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                        <div class="border"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-7 col-xs-12 no-padding">
            <div class="col-md-8 col-xs-12 no-padding padding-l">
                <div class="col-md-12 no-padding margin-t padding-xs-r pic1" style="margin-bottom: 13px;">
                    <a href="#">
                        <div class="category-img">
                            <?= Html::img('@web/img/prod/pic16.png',['class' => 'img-responsive height-md']) ?>
                            <div class="categoty-text">
                                <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                                <div class="border"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 no-padding margin-t padding-xs-r pic1" style="margin-bottom: 13px;">
                    <a href="#">
                        <div class="category-img">
                            <?= Html::img('@web/img/prod/pic18.png',['class' => 'img-responsive height-md']) ?>
                            <div class="categoty-text">
                                <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                                <div class="border"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="col-md-12 col-xs-6 no-padding padding-xs-r pic1" style="margin-bottom: 13px;">
                    <a href="#">
                        <div class="category-img">
                            <?= Html::img('@web/img/prod/pic19.png',['class' => 'img-responsive height-md']) ?>
                            <div class="categoty-text">
                                <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                                <div class="border"></div>
                            </div>
                        </div>
                        <div class="overlay overlay-pic4">
                            <h3 class="text"><?= Yii::t('app' ,'Title19') ?></h3>
                            <div class="border"></div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 col-xs-6 no-padding pic1">
                    <a href="#">
                        <div class="category-img">
                            <?= Html::img('@web/img/prod/pic20.png',['class' => 'img-responsive height-md']) ?>
                            <div class="categoty-text">
                                <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                                <div class="border"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-xs-12 no-padding padding-l padding-xs-r margin-b pic1">
            <a href="#">
                <div class="category-img">
                    <?= Html::img('@web/img/prod/pic21.png',['class' => 'img-responsive height-lg']) ?>
                    <div class="categoty-text">
                        <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                        <div class="border"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-7 col-xs-12 no-padding margin-b">
            <div class="col-md-4 col-xs-12 no-padding padding-l padding-xs-r">
                <div class="col-md-12 col-xs-6 no-padding margin-t padding-xs-r-sm pic1" style="margin-bottom: 13px;">
                    <a href="#">
                        <div class="category-img">
                            <?= Html::img('@web/img/prod/pic22.png',['class' => 'img-responsive height-md']) ?>
                            <div class="categoty-text">
                                <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                                <div class="border"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12 col-xs-6 no-padding margin-t padding-xs-l-sm pic1" style="margin-bottom: 13px;">
                    <a href="#">
                        <div class="category-img">
                            <?= Html::img('@web/img/prod/pic23.png',['class' => 'img-responsive height-md']) ?>
                            <div class="categoty-text">
                                <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                                <div class="border"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-6 no-padding padding-l padding-xs-r-sm pic1">
                <a href="#">
                    <div class="category-img">
                        <?= Html::img('@web/img/prod/pic24.png',['class' => 'img-responsive height-lg']) ?>
                        <div class="categoty-text">
                            <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                            <div class="border"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-xs-6 no-padding padding-r padding-l padding-xs-l-sm pic1">
                <a href="#">
                    <div class="category-img">
                        <?= Html::img('@web/img/prod/pic25.png',['class' => 'img-responsive height-lg']) ?>
                        <div class="categoty-text">
                            <h3 class="text"><?= Yii::t('app' ,'Title2') ?></h3>
                            <div class="border"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title" style="margin-left: 13em;">
                        <h2><?= Yii::t('app' ,'Second Hand Products') ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                        <!-- Product 1 -->

                        <div class="product-item">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <?= Html::img('@web/img/second-hand/product_1.png',['class' => 'img-responsive']) ?>
                                </div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href=""><?= Yii::t('app' ,'product name') ?></a></h6>
                                    <div class="product_price"><?= Yii::t('app' ,'$520.00') ?><span><?= Yii::t('app' ,'$590.00') ?></span></div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 2 -->

                        <div class="product-item">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <?= Html::img('@web/img/second-hand/product_2.png',['class' => 'img-responsive']) ?>
                                </div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href=""><?= Yii::t('app' ,'product name') ?></a></h6>
                                    <div class="product_price"><?= Yii::t('app' ,'$520.00') ?><span><?= Yii::t('app' ,'$590.00') ?></span></div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 3 -->

                        <div class="product-item">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <?= Html::img('@web/img/second-hand/product_3.png',['class' => 'img-responsive']) ?>
                                </div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href=""><?= Yii::t('app' ,'product name') ?></a></h6>
                                    <div class="product_price"><?= Yii::t('app' ,'$520.00') ?><span><?= Yii::t('app' ,'$590.00') ?></span></div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 4 -->

                        <div class="product-item">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <?= Html::img('@web/img/second-hand/product_4.png',['class' => 'img-responsive']) ?>
                                </div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href=""><?= Yii::t('app' ,'product name') ?></a></h6>
                                    <div class="product_price"><?= Yii::t('app' ,'$520.00') ?><span><?= Yii::t('app' ,'$590.00') ?></span></div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 5 -->

                        <div class="product-item">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <?= Html::img('@web/img/second-hand/product_5.png',['class' => 'img-responsive']) ?>
                                </div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href=""><?= Yii::t('app' ,'product name') ?></a></h6>
                                    <div class="product_price"><?= Yii::t('app' ,'$520.00') ?><span><?= Yii::t('app' ,'$590.00') ?></span></div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 6 -->

                        <div class="product-item">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <?= Html::img('@web/img/second-hand/product_6.png',['class' => 'img-responsive']) ?>
                                </div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href=""><?= Yii::t('app' ,'product name') ?></a></h6>
                                    <div class="product_price"><?= Yii::t('app' ,'$520.00') ?><span><?= Yii::t('app' ,'$590.00') ?></span></div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 7 -->

                        <div class="product-item">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <?= Html::img('@web/img/second-hand/product_7.png',['class' => 'img-responsive']) ?>
                                </div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href=""><?= Yii::t('app' ,'product name') ?></a></h6>
                                    <div class="product_price"><?= Yii::t('app' ,'$520.00') ?><span><?= Yii::t('app' ,'$590.00') ?></span></div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 8 -->

                        <div class="product-item">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <?= Html::img('@web/img/second-hand/product_8.png',['class' => 'img-responsive']) ?>
                                </div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href=""><?= Yii::t('app' ,'product name') ?></a></h6>
                                    <div class="product_price"><?= Yii::t('app' ,'$520.00') ?><span><?= Yii::t('app' ,'$590.00') ?></span></div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 9 -->

                        <div class="product-item">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <?= Html::img('@web/img/second-hand/product_9.png',['class' => 'img-responsive']) ?>
                                </div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href=""><?= Yii::t('app' ,'product name') ?></a></h6>
                                    <div class="product_price"><?= Yii::t('app' ,'$520.00') ?><span><?= Yii::t('app' ,'$590.00') ?></span></div>
                                </div>
                            </div>
                        </div>

                        <!-- Product 10 -->

                        <div class="product-item">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <?= Html::img('@web/img/second-hand/product_10.png',['class' => 'img-responsive']) ?>
                                </div>
                                <div class="favorite favorite_left"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href=""><?= Yii::t('app' ,'product name') ?></a></h6>
                                    <div class="product_price"><?= Yii::t('app' ,'$520.00') ?><span><?= Yii::t('app' ,'$590.00') ?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="benefit">
        <div class="container">
            <div class="row benefit_row">
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon col-md-2"><i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="benefit_content col-md-10">
                            <h6><?= Yii::t('app' ,'free shipping') ?></h6>
                            <p><?= Yii::t('app' ,'Suffered Alteration in Some Form') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon col-md-2"><i class="fa fa-money" aria-hidden="true"></i></div>
                        <div class="benefit_content col-md-10">
                            <h6><?= Yii::t('app' ,'cach on delivery') ?></h6>
                            <p><?= Yii::t('app' ,'The Internet Tend To Repeat') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon col-md-2"><i class="fa fa-undo" aria-hidden="true"></i></div>
                        <div class="benefit_content col-md-10">
                            <h6><?= Yii::t('app' ,'45 days return') ?></h6>
                            <p><?= Yii::t('app' ,'Making it Look Like Readable') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon col-md-2"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        <div class="benefit_content col-md-10">
                            <h6><?= Yii::t('app' ,'opening all week') ?></h6>
                            <p><?= Yii::t('app' ,'8AM - 09PM') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="padding-100"></div>
    <div class="col text-center">
        <div class="section_title" style="margin-left: 13em;">
            <h2><?= Yii::t('app' ,'Brands') ?></h2>
        </div>
    </div>
    <div class="border-holder container no-padding">
        <div class="padding-100"></div>
        <div class="col-md-2 col-sm-6 col-xs-6 img-border-holder no-padding">
            <a href="">
                <?= Html::img('@web/img/brands/brand-1.jpg',['class' => 'img-responsive', 'style' => 'height: 200px; width: 200px;']) ?>
            </a>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6 img-border-holder no-padding">
            <a href="">
                <?= Html::img('@web/img/brands/brand-1.jpg',['class' => 'img-responsive', 'style' => 'height: 200px; width: 200px;']) ?>
            </a>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6 img-border-holder no-padding">
            <a href="">
                <?= Html::img('@web/img/brands/brand-1.jpg',['class' => 'img-responsive', 'style' => 'height: 200px; width: 200px;']) ?>
            </a>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6 img-border-holder no-padding">
            <a href="">
                <?= Html::img('@web/img/brands/brand-1.jpg',['class' => 'img-responsive', 'style' => 'height: 200px; width: 200px;']) ?>
            </a>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6 img-border-holder no-padding">
            <a href="">
                <?= Html::img('@web/img/brands/brand-1.jpg',['class' => 'img-responsive', 'style' => 'height: 200px; width: 200px;']) ?>
            </a>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6 img-border-holder no-padding">
            <a href="">
                <?= Html::img('@web/img/brands/brand-1.jpg',['class' => 'img-responsive', 'style' => 'height: 200px; width: 200px;']) ?>
            </a>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6 img-border-holder no-padding">
            <a href="">
                <?= Html::img('@web/img/brands/brand-1.jpg',['class' => 'img-responsive', 'style' => 'height: 200px; width: 200px;']) ?>
            </a>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6 img-border-holder no-padding">
            <a href="">
                <?= Html::img('@web/img/brands/brand-1.jpg',['class' => 'img-responsive', 'style' => 'height: 200px; width: 200px;']) ?>
            </a>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6 img-border-holder no-padding">
            <a href="">
                <?= Html::img('@web/img/brands/brand-1.jpg',['class' => 'img-responsive', 'style' => 'height: 200px; width: 200px;']) ?>
            </a>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6 img-border-holder no-padding">
            <a href="">
                <?= Html::img('@web/img/brands/brand-1.jpg',['class' => 'img-responsive', 'style' => 'height: 200px; width: 200px;']) ?>
            </a>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6 img-border-holder no-padding">
            <a href="">
                <?= Html::img('@web/img/brands/brand-1.jpg',['class' => 'img-responsive', 'style' => 'height: 200px; width: 200px;']) ?>
            </a>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6 img-border-holder no-padding">
            <a href="">
                <?= Html::img('@web/img/brands/brand-1.jpg',['class' => 'img-responsive', 'style' => 'height: 200px; width: 200px;']) ?>
            </a>
        </div>
    </div><!-- Border Holder /- -->
    <!-- Blogs -->
    <div class="padding-50"></div>
    <div class="blogs">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title" style="margin-left: 13em;">
                        <h2><?= Yii::t('app' ,'Latest Blogs') ?></h2>
                    </div>
                </div>
            </div>
            <div class="row blogs_container">
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background">
                            <?= Html::img('@web/img/blogs/blog1.jpg',['class' => '','style' => 'height: 253px; width: 100%;' ]) ?>
                        </div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title"><?= Yii::t('app' ,'Here are the trends I see coming this fall') ?></h4>
                            <span class="blog_meta"><?= Yii::t('app' ,'by admin | dec 01, 2017') ?></span>
                            <a class="blog_more" href="#"><?= Yii::t('app' ,'Read more') ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background">
                            <?= Html::img('@web/img/blogs/blog2.jpg',['class' => '','style' => 'height: 253px; width: 100%;' ]) ?>
                        </div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title"><?= Yii::t('app' ,'Here are the trends I see coming this fall') ?></h4>
                            <span class="blog_meta"><?= Yii::t('app' ,'by admin | dec 01, 2017') ?></span>
                            <a class="blog_more" href="#"><?= Yii::t('app' ,'Read more') ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background">
                            <?= Html::img('@web/img/blogs/blog3.jpg',['class' => '','style' => 'height: 253px; width: 100%;' ]) ?>
                        </div>
                        <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title"><?= Yii::t('app' ,'Here are the trends I see coming this fall') ?></h4>
                            <span class="blog_meta"><?= Yii::t('app' ,'by admin | dec 01, 2017') ?></span>
                            <a class="blog_more" href="#"><?= Yii::t('app' ,'Read more') ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="padding-100"></div>



