<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = Yii::t('app','Your basket');
?>

<section id="" class="slider">
            
            <div class="slider_overlay">
                
                    <div class="row">
                        <div class="main_slider text-center">
                            <div class="col-md-12">
                                <div class="main_slider_content wow zoomIn" data-wow-duration="1s">
                                    
                                      <div class="shopping-cart">

                                        <div class="column-labels">
                                          <label class="product-image">تصویر محصول</label>
                                          <label class="product-details">نام محصول</label>
                                          <label class="product-price">قیمت</label>
                                          <label class="product-quantity">تعداد</label>
                                          <label class="product-removal">حذف</label>
                                          <label class="product-line-price">مجموع</label>
                                        </div>
                                      <?php
                                          $sumOfProduct = 0  ;
                                          $relatedItem = [] ;
                                          foreach ($product as $item):

                                      ?>
                                        <div class="product">
                                              <div class="product-image">
                                                  <?= Html::img('@web/img/product/'.$item['productImage']) ?>
                                              </div>
                                              <div class="product-details">
                                                <div class="product-title"><?= $item['productName'] ?></div>
                                              </div>
                                              <div class="product-price"><?= $item['productPrice'] ?></div>
                                              <div class="product-quantity">
                                                <input type="number" value="<?= $item['count'] ?>" min="1">
                                              </div>
                                              <div class="product-removal">
                                                  <?= Html::a(Yii::t('app','remove'),['order/remove' ,'id'=>$item['productId']] ,['class'=>'remove-product']) ?>

                                              </div>
                                              <div class="product-line-price"><?= $item['sum'] ?></div>
                                        </div>

                                          <?php
                                              $sumOfProduct += $item['sum'] ;
                                            endforeach;

                                          ?>


                                          <div class="col-lg-6 col-sm-12">
                                              <?= Html::a(Yii::t('app','checkout'),['/order/checkout'] ,['class'=>'checkout pull-left']) ?>

                                          </div>

                                          <div class="col-lg-6 col-sm-12">
                                              <?= Html::a(Yii::t('app','return'), ['/site/index'], ['class'=>'checkout pull-right']) ?>
                                          </div>
                                            
                                            

                                      </div>
                                    
                                </div>
                            </div>  
                        </div>

                    </div>
               
            </div>
        </section>

