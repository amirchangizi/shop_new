<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
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
</head>
<body>
<?php $this->title = 'Product'; ?>
<video poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg" id="bgvid" playsinline autoplay muted loop>
      <source src="http://thenewcode.com/assets/videos/polina.webm" type="video/webm">
      <source src="http://thenewcode.com/assets/videos/polina.mp4" type="video/mp4">
    </video>
    <!--tab-->
    <!--tab-->
    <div class="specs">
      <div class="container">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs pull-right" role="tablist">
              <li role="presentation" class="active pull-right">
                <a href="#name" aria-controls="name" role="tab" data-toggle="tab">
                  <h2>
                    <strong>NAME</strong>
                  </h2>
                </a>
              </li>
              <li role="presentation" class="pull-right">
                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                  <h5>مشخصات فنی دستگاه</h5>
                </a>
              </li>
              <li role="presentation" class="pull-right">
                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                  <h5>آپدیت ها و درایورها</h5>
                </a>
              </li>
              <li role="presentation" class="pull-right">
                <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
                  <h5> متعلقات</h5>
                </a>
              </li>
            </ul>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="col-lg-8 col-md-8  col-sm-4 col-xs-4">
            <h4 >999,999,000$</h4>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <button class="btn-custom">خرید</button>
          </div>
        </div>
      </div>
    </div>
    <!--end-tabs-->
      <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="name">
            <div class="product1">
              <div class="container">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                  <h3 >
                     free update that brings powerful upgrades to Smart Play chord and scale features
                      free update that brings powerful upgrades to Smart Play chord and scale features
                      free update that brings powerful upgrades to Smart Play chord and scale features
                      free update that brings powerful upgrades to Smart Play chord and scale features
                      free update that brings powerful upgrades to Smart Play chord and scale features
                  </h3>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                  <img src="img/500-376.png" class="img-responsive pull-right"/>
                </div>
              </div>
            </div>
            <div class="product2">
              <div class="container">
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                  <img src="img/600-319.png" class="img-responsive pull-left"/>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                  <h3 >
                     free update that brings powerful upgrades to Smart Play chord and scale features
                      free update that brings powerful upgrades to Smart Play chord and scale features
                      free update that brings powerful upgrades to Smart Play chord and scale features
                      free update that brings powerful upgrades to Smart Play chord and scale features
                      free update that brings powerful upgrades to Smart Play chord and scale features
                  </h3>
                </div>
              </div>
            </div>
            <!--slider2-->
            <div id="slider2">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img src="img/slide1.jpg" alt="...">
                    <div class="carousel-caption">
                          ...
                    </div>
                  </div>
                  <div class="item">
                    <img src="img/slide2.jpg" alt="...">
                    <div class="carousel-caption">
                          ...
                    </div>
                  </div>
                  <div class="item">
                    <img src="img/slide3.jpg" alt="...">
                    <div class="carousel-caption">
                          ...
                    </div>
                  </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            
            <!--end-slider2-->
          </div>

          <div role="tabpanel" class="tab-pane" id="home">
            <div class="container">
              <table class="table-fill">
                <thead>
                <tr>
                <th class="text-right col-lg-4">مشخصات</th>
                <th class="text-right col-lg-8">توضیحات</th>
                </tr>
                </thead>
                <tbody class="table-hover">
                <tr>
                <td class="text-right col-lg-4">January</td>
                <td class="text-right col-lg-8">$ 50,000.00</td>
                </tr>
                <tr>
                <td class="text-right col-lg-4">February</td>
                <td class="text-right col-lg-8">$ 10,000.00</td>
                </tr>
                <tr>
                <td class="text-right col-lg-4">March</td>
                <td class="text-right col-lg-8">$ 85,000.00</td>
                </tr>
                <tr>
                <td class="text-right col-lg-4">April</td>
                <td class="text-right col-lg-8">$ 56,000.00</td>
                </tr>
                <tr>
                <td class="text-right col-lg-4">May</td>
                <td class="text-right col-lg-8">$ 98,000.00</td>
                </tr>
                </tbody>
              </table>
            </div>
            
          </div>

          <div role="tabpanel" class="tab-pane gap-top-lg gap-bottom-lg" id="profile">
            <div class="container">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                  <button class="btn-custom">Mac<i class="fa fa-apple" aria-hidden="true"></i></button>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                  ver 2.8
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                  free update that brings powerful upgrades to Smart Play chord and scale features
                </div>
              </div>
              <div class="row gap-top-sm">
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                  <button class="btn-custom">Windows<i class="fa fa-windows" aria-hidden="true"></i></button>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                  ver 3
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                  free update that brings powerful upgrades to Smart Play chord and scale features
                </div>
              </div>
               <div class="row gap-top-lg">
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                  <button class="btn-custom">Mac<i class="fa fa-apple" aria-hidden="true"></i></button>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                  ver 2.8
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                  free update that brings powerful upgrades to Smart Play chord and scale features
                </div>
              </div>
              <div class="row  gap-top-sm">
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                  <button class="btn-custom">Windows<i class="fa fa-windows" aria-hidden="true"></i></button>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                  ver 3
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                  free update that brings powerful upgrades to Smart Play chord and scale features
                </div>
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane gap-top-lg" id="messages">
            <div class="container">
              <div class="row" style="border:1px  solid #333333;">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 product-img">
                      <img src="img/600-319.png" class="img-responsive">
                </div>
                
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 gap-top-sm" style="text-align: left;">
                      free update that brings powerful upgrades to Smart Play chord and scale features
                      free update that brings powerful upgrades to Smart Play chord and scale features
                      free update that brings powerful upgrades to Smart Play chord and scale features
                      free update that brings powerful upgrades to Smart Play chord and scale features
                      free update that brings powerful upgrades to Smart Play chord and scale features
                  </div>
                      <div class="col-md-4 pull-right col-sm-12 col-xs-12">
                        <div class="product-price"> 
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>9999000$</b></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                          <button class="btn-custom">خرید محصول</button>
                        </div>
                        </div>
                      </div>                
              </div>
              <div class="row gap-top-lg" style="border:1px  solid #333333;">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 product-img">
                      <img src="img/600-319.png" class="img-responsive">
                </div>
                
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 gap-top-sm" style="text-align: left;">
                      free update that brings powerful upgrades to Smart Play chord and scale features
                      free update that brings powerful upgrades to Smart Play chord and scale features
                      free update that brings powerful upgrades to Smart Play chord and scale features
                      free update that brings powerful upgrades to Smart Play chord and scale features
                      free update that brings powerful upgrades to Smart Play chord and scale features
                  </div>
                      <div class="col-md-4 pull-right col-sm-12 col-xs-12">
                        <div class="product-price"> 
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>9999000$</b></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                          <button class="btn-custom">خرید محصول</button>
                        </div>
                        </div>
                      </div>                
              </div>
              



            </div>
          </div>
        </div>

    
    <br/><br/><br/><br>

<div class="container">
        <div class="brands gap-bottom-lg">
            <div class="products-title">
        <h3>
            <span>BRANDS</span>
        </h3>
    </div>
<div class="col-md-10 col-md-offset-1 gap-top-lg gap-bottom-lg">
<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
  <div class="carousel-inner">
    <div class="item active">
      <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="img/brand/4.png" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="img/brand/5.png" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="img/brand/6.png" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="img/brand/7.png" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="img/brand/4.png" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="img/brand/5.png" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="img/brand/6.png" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="img/brand/7.png" class="img-responsive"></a></div>
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
</div>
</div>
</div>
   </div>
