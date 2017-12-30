<?php

use yii\helpers\Html;
?>
<div class="play-video">
    <?= Html::img('@web/img/banner.jpg',['class' => 'img-responsive', 'style' => 'height: 450px; width: 100%;']) ?>
    <div class="">
        <li>
            <a id="play-video" class="video-play-button" href="#">
                <span></span>
            </a>


            <div id="video-overlay" class="video-overlay">
                <a class="video-overlay-close">&times;</a>
            </div>
        </li>
        </ul></div>
</div>


<main class="site-main page-spacing">
    <div class="container-fluid" style="background: #727272;">
        <div class="buttons-section container-fluid no-padding col-md-3">
            <div class="buttons-bg buttons-bg-black" style="margin: 10px 0 0 7em;">
                <?= Html::a(Yii::t('app' ,'Buy Now') ,['order/add', 'id'=>$model->product_id ] ,['class'=>'btn btn-primary btn-md']) ?>
            </div>
        </div>
        <div class="col-md-2">
            <div class="product_price" style="margin-top: 25px;"><?= Yii::t('app' ,'$520.00') ?><span><?= Yii::t('app' ,'$590.00') ?></span></div>
        </div>

        <div class="col-md-7"></div>
    </div>
    <div class="tab-section container-fluid no-padding">
        <!-- Tab Section 1 -->
        <div class="tab-section tab-section-1 container-fluid no-padding">
            <div class="padding-50"></div>
            <!-- Container -->
            <div class="container">
                <div class="row">
                    <div class="main-tab">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#first1" aria-controls="first1" role="tab" data-toggle="tab"><?= Yii::t('app' ,'Product Information') ?></a></li>
                            <li role="presentation"><a href="#second1" aria-controls="second1" role="tab" data-toggle="tab"><?= Yii::t('app' ,'Attribute') ?></a></li>
                            <li role="presentation"><a href="#third1" aria-controls="third1" role="tab" data-toggle="tab"><?= Yii::t('app' ,'Driver') ?></a></li>
                            <li role="presentation"><a href="#fourth1" aria-controls="fourth1" role="tab" data-toggle="tab"><?= Yii::t('app' ,'Related') ?></a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="first1">
                                <div class="content-slider-section container-fluid no-padding">
                                    <div id="content-slider-carousel" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active">
                                                <div class="col-md-6 content-slider-img"><?= Html::img('@web/img/products/'.$model->image) ?></div>
                                                <div class="col-md-6 content-slider-content">
                                                    <h3><?= $model->name ?></h3>
                                                    <p><?= $model->description ?></p>
                                                    <div class="padding-60"></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div><!-- Content Slider /- -->
                            </div>
                            <div role="tabpanel" class="tab-pane" id="second1">
                                <!-- Service Table 1 -->
                                <div class="service-table service-table-1 container-fluid no-padding">
                                    <div class="padding-50"></div>
                                    <!-- Container -->
                                    <div class="container">
                                        <div class="row">

                                            <div class="col-md-8 col-sm-6 col-xs-6">
                                                <div class="service-box">
                                                    <h3><?= Yii::t('app' ,'explications') ?></h3>
                                                    <div class="service-content" style="text-align: right;">
                                                        <ul>
                                                            <li><?= Yii::t('app' ,'explications 1') ?></li>
                                                            <li><?= Yii::t('app' ,'explications 2') ?></li>
                                                            <li><?= Yii::t('app' ,'explications 3') ?></li>
                                                            <li><?= Yii::t('app' ,'explications 4') ?></li>
                                                            <li><?= Yii::t('app' ,'explications 5') ?></li>
                                                            <li><?= Yii::t('app' ,'explications 6') ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-6">
                                                <div class="service-box">
                                                    <h3><?= Yii::t('app' ,'Particulars') ?></h3>
                                                    <div class="service-content">
                                                        <ul>
                                                            <li><?= Yii::t('app' ,'Particulars 1') ?></li>
                                                            <li><?= Yii::t('app' ,'Particulars 2') ?></li>
                                                            <li><?= Yii::t('app' ,'Particulars 3') ?></li>
                                                            <li><?= Yii::t('app' ,'Particulars 4') ?></li>
                                                            <li><?= Yii::t('app' ,'Particulars 5') ?></li>
                                                            <li><?= Yii::t('app' ,'Particulars 6') ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- Container /- -->
                                    <div class=""></div>
                                </div><!-- Service Table 1 /- -->
                            </div>
                            <div role="tabpanel" class="tab-pane" id="third1">
                                <!-- Service Table 1 -->
                                <div class="service-table service-table-1 container-fluid no-padding">
                                    <div class="padding-20"></div>
                                    <!-- Container -->
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-4 col-xs-3">
                                                <div class="service-box">

                                                    <div class="service-content">
                                                        <ul>
                                                            <li>
                                                                <div class="buttons-section">
                                                                    <div class="buttons-bg">
                                                                        <a href="" class="btn btn-primary btn-lg"><?= Yii::t('app' ,'mac') ?></a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="buttons-section">
                                                                    <div class="buttons-bg">
                                                                        <a href="" class="btn btn-primary btn-lg"><?= Yii::t('app' ,'windows') ?></a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="buttons-section">
                                                                    <div class="buttons-bg">
                                                                        <a href="" class="btn btn-primary btn-lg"><?= Yii::t('app' ,'mac') ?></a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="buttons-section">
                                                                    <div class="buttons-bg">
                                                                        <a href="" class="btn btn-primary btn-lg"><?= Yii::t('app' ,'windows') ?></a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-4 col-xs-3">
                                                <div class="service-box">
                                                    <div class="service-content">
                                                        <ul>
                                                            <li><?= Yii::t('app' ,'Version 2') ?></li>
                                                            <li><?= Yii::t('app' ,'version 3') ?></li>
                                                            <li><?= Yii::t('app' ,'version 3.5') ?></li>
                                                            <li><?= Yii::t('app' ,'version 2.5') ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-4 col-xs-3">
                                                <div class="service-box">

                                                    <div class="service-content">
                                                        <ul>
                                                            <li><?= Yii::t('app' ,'One-Click Import') ?></li>
                                                            <li><?= Yii::t('app' ,'Woocommerce Plugin') ?></li>
                                                            <li><?= Yii::t('app' ,'Responsive And Retina Ready') ?></li>
                                                            <li><?= Yii::t('app' ,'Fully Equiped Demos') ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- Container /- -->
                                    <div class="padding-20"></div>
                                </div><!-- Service Table 1 /- -->
                            </div>
                            <div role="tabpanel" class="tab-pane" id="fourth1">
                                <!-- Service Table 1 -->
                                <div class="service-table service-table-1 container-fluid no-padding">

                                    <!-- Container -->
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-6 col-xs-6">
                                                <div class="service-box">
                                                    <div class="service-content" style="margin-right: 2em;">
                                                        <ul class="attachment">
                                                            <?php
                                                            $relatedList = \common\helpers\ProductHelper::getProductRelated($id) ;
                                                            if($relatedList)
                                                            foreach ($relatedList as $related):
                                                            ?>
                                                            <li>
                                                                <div class="col-md-3" style="margin-top: -9em;">
                                                                    <?= Html::img('@web/img/products/'.$related->image,['class' => 'img-responsive']) ?>
                                                                </div>
                                                                <div class="col-md-5" style="margin-top: -8em;">
                                                                    <h2><?= $related->name ?></h2>
                                                                    <p><?= substr($related->description, 0, 200)  ?></p>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="product_price" style="margin-top: -1em;"><?= number_format($related->price,2) ?><span><?= number_format($related->price,2) ?></span></div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <div class="buttons-section">
                                                                        <div class="buttons-bg">
                                                                            <a href="<?= Yii::$app->urlManager->createUrl(['order/add' ,'id'=>$related->product_id]) ?>" class="btn btn-primary btn-lg"><?= Yii::t('app' ,'Buy Now') ?></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <?php endforeach;  ?>


                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div><!-- Container /- -->
                                    <div class="padding-20"></div>
                                </div><!-- Service Table 1 /- -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Container /- -->
            <div class="padding-50"></div>
        </div><!-- Tab Section 1 -->
    </div>
    <div class="padding-50" style="background: #efefef;"></div>
    <!-- Slider Section -->
    <div class="slider-section container-fluid no-padding" style="background: #efefef">
        <!-- Container -->
        <div class="container">
            <div id="photo-slider3" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#photo-slider3" data-slide-to="0" class="active"></li>
                    <li data-target="#photo-slider3" data-slide-to="1"></li>
                    <li data-target="#photo-slider3" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <?= Html::img('@web/img/sliders/slide-1.jpg') ?>

                    </div>
                    <div class="item">
                        <?= Html::img('@web/img/sliders/slide-2.jpg') ?>
                    </div>
                    <div class="item">
                        <?= Html::img('@web/img/sliders/slide-3.jpg') ?>
                    </div>
                </div>
                <div class="padding-100"></div>
            </div>
        </div><!-- Container /- -->
    </div><!-- Slider Section /- -->
    <div class="padding-100" style="background: #efefef;"></div>


</main>