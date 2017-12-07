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
<?php $this->title = 'music'; ?>
    <div id="content">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-top: -31px;">
  <!— Indicators —>
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    
  </ol>

  <!— Wrapper for slides —>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/slider1.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="img/slider3.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
  </div>

  <!— Controls —>
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        <?php
            echo \frontend\widgets\html\MasaHtmlWidget::widget();
        ?>

        <!-- /.container -->
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
    </div>







