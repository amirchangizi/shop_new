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
<?php $this->title = Yii::t('app','music'); ?>
    <div id="content">
<div class="container">
<div style="padding:0px; margin:0px; margin-top: 20px; background-color:#eee;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">

    <!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: https://www.jssor.com -->
    <script src="js/jssor.slider-26.5.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
              {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $Align: 0,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 6,
                $Orientation: 2,
                $Align: 156
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
        $(document).ready(function() {
  
  var data = { gallery: [
    {title: "Ella me quiso, a veces yo también la quería", img: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/953/murra.jpg", alt: "lorem" },
    {title: "Puedo escribir los versos más tristes esta noche", img: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/953/g1.jpg", alt: "lorem" },
    {title: "Mi voz buscaba el viento para tocar su oído", img: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/953/g2.jpg", alt: "lorem" },
    {title: "Mi alma no se contenta con haberla perdido", img: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/953/g3.jpg", alt: "lorem" },
    {title: "El viento de la noche gira en el cielo y canta", img: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/953/g4.jpg", alt: "lorem" },
    {title: "La noche está estrellada, y tiritan, azules, los astros, a lo lejos", img: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/953/g5.jpg", alt: "lorem" },
    {title: "Cómo no haber amado sus grandes ojos fijos", img: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/953/g6.jpg", alt: "lorem" },
    {title: "De otro. Será de otro. Como antes de mis besos.", img: "https://s3-us-west-2.amazonaws.com/s.cdpn.io/953/g7.jpg", alt: "lorem" }
  ]};
  
  var source   = $('#template').html();
  var template = Handlebars.compile(source);
  $('#content').html(template(data));
  
});

$(window).load(function(){
  var $items = $('.item');
  $items.on({
    mousemove: function(e) {
      var $that = $(this);
      $that.find('.overflow > img').velocity({
        translateZ: 0,
        translateX: Math.floor((e.pageX - $that.offset().left) - ($that.width() / 2)),
        translateY: Math.floor((e.pageY - $that.offset().top) - ($that.height() / 2)),
        scale: '2'
      }, {
        duration: 400,
        easing: 'linear',
        queue: false
      });
    },
    mouseleave: function() {
      $(this).find('.overflow > img').velocity({
        translateZ: 0,
        translateX: 0,
        translateY: 0,
        scale: '1'
      }, {
        duration: 1000,
        easing: 'easeOutSine',
        queue: false
      });
    }
  });
});
    </script>
    <style>
        /* jssor slider loading skin spin css */
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }


        .jssorb111 .i {position:absolute;color:#fff;font-family:"Helvetica neue",Helvetica,Arial,sans-serif;text-align:center;cursor:pointer;z-index:0;}
        .jssorb111 .i .n {display:none;}
        .jssorb111 .i .b {fill:#fff;stroke:#000;stroke-width:500;stroke-miterlimit:10;stroke-opacity:.5;}
        .jssorb111 .i:hover .b {fill:#fea900;stroke:#fea900;stroke-width:6000;stroke-opacity:1;}
        .jssorb111 .iav .b {fill:#000;stroke-width:6000;stroke-opacity:1;}
        .jssorb111 .i.idn {opacity:.3;}
        .jssorb111 .iav .n, .jssorb111 .i:hover .n {display:block;}

        .jssort121 .p {position:absolute;top:0;left:0;border-bottom:1px solid rgba(255,255,255,.2);box-sizing:border-box;color:#fff;background:rgba(0,0,0,.1);opacity:.7;}
        .jssort121 .p .t {position:absolute;padding:10px;box-sizing:border-box;top:0;left:0;width:100%;height:100%;line-height:24px;overflow:hidden;}
        .jssort121 .p .i {margin-right:10px;position:relative;top:0;left:0;width:96px;height:48px;border:none;float:left;}
        .jssort121 .pav, .jssort121 .p:hover {color:#000;background:rgba(255,255,255,.7);}
        .jssort121 .p:hover {opacity:.75;}
        .jssort121 .pav, .jssort121 .p:hover.pdn {opacity:1;}
        .jssort121 .ti {position:relative;font-size:14px;font-weight:bold;}
        .jssort121 .d {position:relative;font-size:12px;}
        /*.jssort121 .d:before {content:'\a';white-space:pre;}*/
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
            <div>
                <img data-u="image" src="img/sliders/022.jpg" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="img/sliders/022-s96x48.jpg" />
                    <span class="ti">Title</span><br />
                    <span class="d">Slide Description</span>
                </div>
            </div>
            <div>
                <img data-u="image" src="img/sliders/023.jpg" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="img/sliders/023-s96x48.jpg" />
                    <span class="ti">Title</span><br />
                    <span class="d">Slide Description</span>
                </div>
            </div>
            <div>
                <img data-u="image" src="img/sliders/024.jpg" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="img/sliders/024-s96x48.jpg" />
                    <span class="ti">Title</span><br />
                    <span class="d">Slide Description</span>
                </div>
            </div>
            <div>
                <img data-u="image" src="img/sliders/025.jpg" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="img/sliders/025-s96x48.jpg" />
                    <span class="ti">Title</span><br />
                    <span class="d">Slide Description</span>
                </div>
            </div>
            <div>
                <img data-u="image" src="img/sliders/026.jpg" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="img/sliders/026-s96x48.jpg" />
                    <span class="ti">Title</span><br />
                    <span class="d">Slide Description</span>
                </div>
            </div>
            <div>
                <img data-u="image" src="img/sliders/027.jpg" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="img/sliders/027-s96x48.jpg" />
                    <span class="ti">Title</span><br />
                    <span class="d">Slide Description</span>
                </div>
            </div>
            <div>
                <img data-u="image" src="img/sliders/021.jpg" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="img/sliders/021-s96x48.jpg" />
                    <span class="ti">Title</span><br />
                    <span class="d">Slide Description</span>
                </div>
            </div>
            <div>
                <img data-u="image" src="img/sliders/028.jpg" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="img/sliders/028-s96x48.jpg" />
                    <span class="ti">Title</span><br />
                    <span class="d">Slide Description</span>
                </div>
            </div>
            <div>
                <img data-u="image" src="img/sliders/029.jpg" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="img/sliders/029-s96x48.jpg" />
                    <span class="ti">Title</span><br />
                    <span class="d">Slide Description</span>
                </div>
            </div>
            <div>
                <img data-u="image" src="img/sliders/030.jpg" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="img/sliders/030-s96x48.jpg" />
                    <span class="ti">Title</span><br />
                    <span class="d">Slide Description</span>
                </div>
            </div>
            <div>
                <img data-u="image" src="img/sliders/031.jpg" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="img/sliders/031-s96x48.jpg" />
                    <span class="ti">Title</span><br />
                    <span class="d">Slide Description</span>
                </div>
            </div>
            <div>
                <img data-u="image" src="img/sliders/032.jpg" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="img/sliders/032-s96x48.jpg" />
                    <span class="ti">Title</span><br />
                    <span class="d">Slide Description</span>
                </div>
            </div>
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort121" style="position:absolute;left:0px;top:0px;width:268px;height:380px;overflow:hidden;cursor:default;" data-autocenter="2" data-scale-left="0.75">
            <div data-u="slides">
                <div data-u="prototype" class="p" style="width:268px;height:68px;">
                    <div data-u="thumbnailtemplate" class="t"></div>
                </div>
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb111" style="position:absolute;bottom:12px;right:12px;" data-scale="0.5">
            <div data-u="prototype" class="i" style="width:24px;height:24px;font-size:12px;line-height:24px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;">
                    <circle class="b" cx="8000" cy="8000" r="3000"></circle>
                </svg>
                <div data-u="numbertemplate" class="n"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End -->
</div>
</div>
<div class="container">
    <div class="products-title">
        <h3>
            <span>FEATURED PRODUCTS</span>
        </h3>
    </div><br/><br/><br/>
</div>
   <div id="all">
        <div class="container">
	<div class="col-md-4">
	    <div class="product">
		    <div class="flip-container">
		        <div class="flipper">
		            <div class="front">
		                <a href="detail.html">
		                    <img src="img/350-320.jpg" alt="" class="img-responsive">
		                </a>
		            </div>
		            <div class="back">
		                <a href="detail.html">
		                    <img src="img/350-320.jpg" alt="" class="img-responsive">
		                </a>
		                <div class="text">
					        <h3><a href="detail.html">Product name</a></h3>
					        <p class="price">$143.00</p>
					            <p class="buttons">
					                
                                                        <?= Html::a('جزئیات', ['product'], ['class'=>'btn btn-default']) ?>
                                                        <?= Html::a('افزودن به سبد خرید', ['basket'], ['class'=>'btn btn-primary']) ?>
					                
					            </p>
					    </div>
		            </div>
		        </div>
		    </div>
		        <a href="detail.html" class="invisible">
		            <img src="img/350-320.jpg" alt="" class="img-responsive">
		        </a>
		    <!-- /.text -->
		</div>
        <!-- /.product -->
	</div>
	<div class="col-md-8">
                <div class="row">
                    <div class="col-md-5">
                        <div class="product">
						    <div class="flip-container">
						        <div class="flipper">
						            <div class="front">
						                <a href="detail.html">
						                    <img src="img/160-150.jpg" alt="" class="img-responsive">
						                </a>
						            </div>
						            <div class="back">
						                <a href="detail.html">
						                    <img src="img/160-150.jpg" alt="" class="img-responsive">
						                </a>
						                <div class="text">
									        <h3><a href="detail.html">Product name</a></h3>
									        <p class="price">$143.00</p>
									            <p class="buttons">
									                <a href="detail.html" class="btn btn-default">View detail</a>
									                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									            </p>
									    </div>
						            </div>
						        </div>
						    </div>
						        <a href="detail.html" class="invisible">
						            <img src="img/160-150.jpg" alt="" class="img-responsive">
						        </a>
						    <!-- /.text -->
						</div>
        				<!-- /.product -->
                    </div>
                    <div class="col-md-7">
                        <div class="product">
						    <div class="flip-container">
						        <div class="flipper">
						            <div class="front">
						                <a href="detail.html">
						                    <img src="img/540-150.jpg" alt="" class="img-responsive">
						                </a>
						            </div>
						            <div class="back">
						                <a href="detail.html">
						                    <img src="img/540-150.jpg" alt="" class="img-responsive">
						                </a>
						                <div class="text">
									        <h3><a href="detail.html">Product name</a></h3>
									        <p class="price">$143.00</p>
									            <p class="buttons">
									                <a href="detail.html" class="btn btn-default">View detail</a>
									                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									            </p>
									    </div>
						            </div>
						        </div>
						    </div>
						        <a href="detail.html" class="invisible">
						            <img src="img/540-150.jpg" alt="" class="img-responsive">
						        </a>
						    <!-- /.text -->
						</div>
				        <!-- /.product -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="product">
						    <div class="flip-container">
						        <div class="flipper">
						            <div class="front">
						                <a href="detail.html">
						                    <img src="img/540-150.jpg" alt="" class="img-responsive">
						                </a>
						            </div>
						            <div class="back">
						                <a href="detail.html">
						                    <img src="img/540-150.jpg" alt="" class="img-responsive">
						                </a>
						                <div class="text">
									        <h3><a href="detail.html">Product name</a></h3>
									        <p class="price">$143.00</p>
									            <p class="buttons">
									                <a href="detail.html" class="btn btn-default">View detail</a>
									                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									            </p>
									    </div>
						            </div>
						        </div>
						    </div>
						        <a href="detail.html" class="invisible">
						            <img src="img/540-150.jpg" alt="" class="img-responsive">
						        </a>
						    <!-- /.text -->
						</div>
				        <!-- /.product -->
                    </div>
                    <div class="col-md-5">
                        <div class="product">
						    <div class="flip-container">
						        <div class="flipper">
						            <div class="front">
						                <a href="detail.html">
						                    <img src="img/160-150.jpg" alt="" class="img-responsive">
						                </a>
						            </div>
						            <div class="back">
						                <a href="detail.html">
						                    <img src="img/160-150.jpg" alt="" class="img-responsive">
						                </a>
						                <div class="text">
									        <h3><a href="detail.html">Product name</a></h3>
									        <p class="price">$143.00</p>
									            <p class="buttons">
									                <a href="detail.html" class="btn btn-default">View detail</a>
									                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									            </p>
									    </div>
						            </div>
						        </div>
						    </div>
						        <a href="detail.html" class="invisible">
						            <img src="img/160-150.jpg" alt="" class="img-responsive">
						        </a>
						    <!-- /.text -->
						</div>
				        <!-- /.product -->
                    </div>
                </div>
            </div>
</div>
<div class="container"><!-- row2 -->    
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product">
						    <div class="flip-container">
						        <div class="flipper">
						            <div class="front">
						                <a href="detail.html">
						                    <img src="img/250-250.jpg" alt="" class="img-responsive">
						                </a>
						            </div>
						            <div class="back">
						                <a href="detail.html">
						                    <img src="img/250-250.jpg" alt="" class="img-responsive">
						                </a>
						                <div class="text">
									        <h3><a href="detail.html">Product name</a></h3>
									        <p class="price">$143.00</p>
									            <p class="buttons">
									                <a href="detail.html" class="btn btn-default">View detail</a>
									                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									            </p>
									    </div>
						            </div>
						        </div>
						    </div>
						        <a href="detail.html" class="invisible">
						            <img src="img/250-250.jpg" alt="" class="img-responsive">
						        </a>
						    <!-- /.text -->
						</div>
				        <!-- /.product -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product">
						    <div class="flip-container">
						        <div class="flipper">
						            <div class="front">
						                <a href="detail.html">
						                    <img src="img/250-250.jpg" alt="" class="img-responsive">
						                </a>
						            </div>
						            <div class="back">
						                <a href="detail.html">
						                    <img src="img/250-250.jpg" alt="" class="img-responsive">
						                </a>
						                <div class="text">
									        <h3><a href="detail.html">Product name</a></h3>
									        <p class="price">$143.00</p>
									            <p class="buttons">
									                <a href="detail.html" class="btn btn-default">View detail</a>
									                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									            </p>
									    </div>
						            </div>
						        </div>
						    </div>
						        <a href="detail.html" class="invisible">
						            <img src="img/250-250.jpg" alt="" class="img-responsive">
						        </a>
						    <!-- /.text -->
						</div>
				        <!-- /.product -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product">
						    <div class="flip-container">
						        <div class="flipper">
						            <div class="front">
						                <a href="detail.html">
						                    <img src="img/160-320.jpg" alt="" class="img-responsive">
						                </a>
						            </div>
						            <div class="back">
						                <a href="detail.html">
						                    <img src="img/160-320.jpg" alt="" class="img-responsive">
						                </a>
						                <div class="text">
									        <h3><a href="detail.html">Product name</a></h3>
									        <p class="price">$143.00</p>
									            <p class="buttons">
									                <a href="detail.html" class="btn btn-default">View detail</a>
									                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									            </p>
									    </div>
						            </div>
						        </div>
						    </div>
						        <a href="detail.html" class="invisible">
						            <img src="img/160-320.jpg" alt="" class="img-responsive">
						        </a>
						    <!-- /.text -->
						</div>
				        <!-- /.product -->
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product">
						    <div class="flip-container">
						        <div class="flipper">
						            <div class="front">
						                <a href="detail.html">
						                    <img src="img/250-250.jpg" alt="" class="img-responsive">
						                </a>
						            </div>
						            <div class="back">
						                <a href="detail.html">
						                    <img src="img/250-250.jpg" alt="" class="img-responsive">
						                </a>
						                <div class="text">
									        <h3><a href="detail.html">Product name</a></h3>
									        <p class="price">$143.00</p>
									            <p class="buttons">
									                <a href="detail.html" class="btn btn-default">View detail</a>
									                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									            </p>
									    </div>
						            </div>
						        </div>
						    </div>
						        <a href="detail.html" class="invisible">
						            <img src="img/250-250.jpg" alt="" class="img-responsive">
						        </a>
						    <!-- /.text -->
						</div>
				        <!-- /.product -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product">
								    <div class="flip-container">
								        <div class="flipper">
								            <div class="front">
								                <a href="detail.html">
								                    <img src="img/250-250.jpg" alt="" class="img-responsive">
								                </a>
								            </div>
								            <div class="back">
								                <a href="detail.html">
								                    <img src="img/250-250.jpg" alt="" class="img-responsive">
								                </a>
								                <div class="text">
											        <h3><a href="detail.html">Product name</a></h3>
											        <p class="price">$143.00</p>
											            <p class="buttons">
											                <a href="detail.html" class="btn btn-default">View detail</a>
											                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											            </p>
											    </div>
								            </div>
								        </div>
								    </div>
								        <a href="detail.html" class="invisible">
								            <img src="img/250-250.jpg" alt="" class="img-responsive">
								        </a>
								    <!-- /.text -->
								</div>
				        <!-- /.product -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="product">
						    <div class="flip-container">
						        <div class="flipper">
						            <div class="front">
						                <a href="detail.html">
						                    <img src="img/540-320.jpg" alt="" class="img-responsive">
						                </a>
						            </div>
						            <div class="back">
						                <a href="detail.html">
						                    <img src="img/540-320.jpg" alt="" class="img-responsive">
						                </a>
						                <div class="text">
									        <h3><a href="detail.html">Product name</a></h3>
									        <p class="price">$143.00</p>
									            <p class="buttons">
									                <a href="detail.html" class="btn btn-default">View detail</a>
									                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									            </p>
									    </div>
						            </div>
						        </div>
						    </div>
						        <a href="detail.html" class="invisible">
						            <img src="img/540-320.jpg" alt="" class="img-responsive">
						        </a>
						    <!-- /.text -->
						</div>
				        <!-- /.product -->
                    </div>
                </div>
            </div>
        </div>
<div class="container"><!-- row3 -->
	<div class="col-md-8">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product">
								    <div class="flip-container">
								        <div class="flipper">
								            <div class="front">
								                <a href="detail.html">
								                    <img src="img/540-150.jpg" alt="" class="img-responsive">
								                </a>
								            </div>
								            <div class="back">
								                <a href="detail.html">
								                    <img src="img/540-150.jpg" alt="" class="img-responsive">
								                </a>
								                <div class="text">
											        <h3><a href="detail.html">Product name</a></h3>
											        <p class="price">$143.00</p>
											            <p class="buttons">
											                <a href="detail.html" class="btn btn-default">View detail</a>
											                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											            </p>
											    </div>
								            </div>
								        </div>
								    </div>
								        <a href="detail.html" class="invisible">
								            <img src="img/540-150.jpg" alt="" class="img-responsive">
								        </a>
								    <!-- /.text -->
								</div>
				        <!-- /.product -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product">
								    <div class="flip-container">
								        <div class="flipper">
								            <div class="front">
								                <a href="detail.html">
								                    <img src="img/540-150.jpg" alt="" class="img-responsive">
								                </a>
								            </div>
								            <div class="back">
								                <a href="detail.html">
								                    <img src="img/540-150.jpg" alt="" class="img-responsive">
								                </a>
								                <div class="text">
											        <h3><a href="detail.html">Product name</a></h3>
											        <p class="price">$143.00</p>
											            <p class="buttons">
											                <a href="detail.html" class="btn btn-default">View detail</a>
											                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											            </p>
											    </div>
								            </div>
								        </div>
								    </div>
								        <a href="detail.html" class="invisible">
								            <img src="img/540-150.jpg" alt="" class="img-responsive">
								        </a>
								    <!-- /.text -->
								</div>
				        <!-- /.product -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product">
								    <div class="flip-container">
								        <div class="flipper">
								            <div class="front">
								                <a href="detail.html">
								                    <img src="img/2.jpg" alt="" class="img-responsive">
								                </a>
								            </div>
								            <div class="back">
								                <a href="detail.html">
								                    <img src="img/2.jpg" alt="" class="img-responsive">
								                </a>
								                <div class="text">
											        <h3><a href="detail.html">Product name</a></h3>
											        <p class="price">$143.00</p>
											            <p class="buttons">
											                <a href="detail.html" class="btn btn-default">View detail</a>
											                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											            </p>
											    </div>
								            </div>
								        </div>
								    </div>
								        <a href="detail.html" class="invisible">
								            <img src="img/2.jpg" alt="" class="img-responsive">
								        </a>
								    <!-- /.text -->
								</div>
				        <!-- /.product -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product">
								    <div class="flip-container">
								        <div class="flipper">
								            <div class="front">
								                <a href="detail.html">
								                    <img src="img/1.jpg" alt="" class="img-responsive">
								                </a>
								            </div>
								            <div class="back">
								                <a href="detail.html">
								                    <img src="img/1.jpg" alt="" class="img-responsive">
								                </a>
								                <div class="text">
											        <h3><a href="detail.html">Product name</a></h3>
											        <p class="price">$143.00</p>
											            <p class="buttons">
											                <a href="detail.html" class="btn btn-default">View detail</a>
											                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											            </p>
											    </div>
								            </div>
								        </div>
								    </div>
								        <a href="detail.html" class="invisible">
								            <img src="img/1.jpg" alt="" class="img-responsive">
								        </a>
								    <!-- /.text -->
								</div>
				        <!-- /.product -->
                    </div>
                    <div class="col-md-6">
                        <div class="product">
								    <div class="flip-container">
								        <div class="flipper">
								            <div class="front">
								                <a href="detail.html">
								                    <img src="img/1.jpg" alt="" class="img-responsive">
								                </a>
								            </div>
								            <div class="back">
								                <a href="detail.html">
								                    <img src="img/1.jpg" alt="" class="img-responsive">
								                </a>
								                <div class="text">
											        <h3><a href="detail.html">Product name</a></h3>
											        <p class="price">$143.00</p>
											            <p class="buttons">
											                <a href="detail.html" class="btn btn-default">View detail</a>
											                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											            </p>
											    </div>
								            </div>
								        </div>
								    </div>
								        <a href="detail.html" class="invisible">
								            <img src="img/1.jpg" alt="" class="img-responsive">
								        </a>
								    <!-- /.text -->
								</div>
				        <!-- /.product -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="product">
								    <div class="flip-container">
								        <div class="flipper">
								            <div class="front">
								                <a href="detail.html">
								                    <img src="img/1.jpg" alt="" class="img-responsive">
								                </a>
								            </div>
								            <div class="back">
								                <a href="detail.html">
								                    <img src="img/1.jpg" alt="" class="img-responsive">
								                </a>
								                <div class="text">
											        <h3><a href="detail.html">Product name</a></h3>
											        <p class="price">$143.00</p>
											            <p class="buttons">
											                <a href="detail.html" class="btn btn-default">View detail</a>
											                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											            </p>
											    </div>
								            </div>
								        </div>
								    </div>
								        <a href="detail.html" class="invisible">
								            <img src="img/1.jpg" alt="" class="img-responsive">
								        </a>
								    <!-- /.text -->
								</div>
				        <!-- /.product -->
                    </div>
                    <div class="col-md-6">
                        <div class="product">
								    <div class="flip-container">
								        <div class="flipper">
								            <div class="front">
								                <a href="detail.html">
								                    <img src="img/1.jpg" alt="" class="img-responsive">
								                </a>
								            </div>
								            <div class="back">
								                <a href="detail.html">
								                    <img src="img/1.jpg" alt="" class="img-responsive">
								                </a>
								                <div class="text">
											        <h3><a href="detail.html">Product name</a></h3>
											        <p class="price">$143.00</p>
											            <p class="buttons">
											                <a href="detail.html" class="btn btn-default">View detail</a>
											                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											            </p>
											    </div>
								            </div>
								        </div>
								    </div>
								        <a href="detail.html" class="invisible">
								            <img src="img/1.jpg" alt="" class="img-responsive">
								        </a>
								    <!-- /.text -->
								</div>
				        <!-- /.product -->
                    </div>
                </div>
            </div>
        </div>

        <!-- /.container -->
       </div>
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


<br/><br/><br/><br>



