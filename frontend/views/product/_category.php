<?php
use common\helpers\CategoryHelper;
use common\helpers\ManufacturerHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><?=
                        Html::a('', ['index'], ['class'=>'fa fa-home']) ?>
                    </li>
                    <li>دسته بندی</li>
                </ul>
            </div>

            <div class="col-md-3">
                <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Categories</h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            <li>
                                <ul>
                                    <?php
                                        $list = CategoryHelper::getAllCategoryIdWithoutRoot() ;
                                        if($list)
                                            foreach ($list as $catId => $name):


                                    ?>
                                            <li><?= Html::a($name ,['product/category' ,'categoryId'=> $catId]) ?> </li>
                                    <?php
                                        endforeach;
                                    ?>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>

                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Brands </h3>
                    </div>

                    <div class="panel-body">

                        <?php
                        $form = ActiveForm::begin([
                            'action' => Yii::$app->urlManager->createUrl('product/brands'),
                            'id'=>'brand-form',
                        ]);
                        ?>
                            <div class="form-group">
                        <?php
                            $brandList = ManufacturerHelper::getAllManufacturer() ;
                            $brandList = ArrayHelper::map($brandList ,'manufacturers_id' ,'manufacturers_name') ;

                        ?>

                                <div class="checkbox">
                                    <label>
                                        <?= Html::checkboxList('brands' ,null ,$brandList ) ?>
                                    </label>
                                </div>

                        <?php
                            echo Html::submitButton(Yii::t('app','Apply') , ['class' =>'btn btn-default btn-sm btn-primary'])
                        ?>
                            </div>


                        <?php  ActiveForm::end(); ?>

                    </div>
                </div>


                <!-- *** MENUS AND FILTERS END *** -->

                <div class="banner">
                    <a href="#">
                        <img src="img/img/category_img2.jpg" alt="sales 2014" class="img-responsive">
                    </a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="box">
                    <h1>دسته بندی</h1>

                    <p class="lead"></p>
                    <p class="text-muted">برای ارتباط مستقیم با ما به صفحه
                        <?= Html::a('تماس با ما', ['contact'], ['class'=>'']) ?>
                        مراجعه کنید
                        .</p>
                </div>

                <div class="box info-bar">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 products-showing">
                            نمایش <strong>12</strong> محصول از <strong>25</strong> محصول
                        </div>

                        <div class="col-sm-12 col-md-8  products-number-sort">
                            <div class="row">

                                    <div class="col-md-6 col-sm-6">
                                        <div class="products-number">
                                            <strong><?= Yii::t('app' ,'show')?></strong>
                                                <a href="<?= Url::to(['product/category','categoryId'=>$categoryId,'limit'=>12])?>" class="btn btn-default btn-sm btn-primary">12</a>
                                                <a href="<?= Url::to(['product/category','categoryId'=>$categoryId,'limit'=>24])?>" class="btn btn-default btn-sm">24</a>
                                                                        محصولات
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row products">


                    <?php
                        foreach ($model as $product):
                    ?>



                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?= Yii::$app->urlManager->createUrl(['product/view' ,'id'=>$product->product_id ])?>">
                                                <?= Html::img('@web/img/product/'.$product->image,['class'=>'img-responsive category-img'])  ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= Yii::$app->urlManager->createUrl(['product/view' ,'id'=>$product->product_id ])?>" class="invisible">
                                    <img src="img/540-320.jpg" alt="" class="img-responsive" style="height: 180px;">
                                </a>
                                <div class="text">
                                    <h3><a href="<?= Yii::$app->urlManager->createUrl(['product/view' ,'id'=>$product->product_id ])?>"><?= $product->name ?></a></h3>
                                    <div class="col-sm-12"  style="margin-bottom: 15px;margin-top: 15px;">
                                        <div class="col-sm-1">
                                            <i class="fa fa-play-circle" aria-hidden="true" title="some thing"></i>
                                        </div>
                                        <div class="col-sm-1">
                                            <i class="fa fa-microphone" aria-hidden="true" title="some thing"></i>
                                        </div>
                                        <div class="col-sm-1">
                                            <i class="fa fa-bluetooth-b" aria-hidden="true" title="some thing"></i>
                                        </div>
                                        <div class="col-sm-1">
                                            <i class="fa fa fa-wifi" aria-hidden="true" title="some thing"></i>
                                        </div>
                                        <div class="col-sm-1">
                                            <i class="fa fa-android" aria-hidden="true" title="some thing"></i>
                                        </div>
                                        <div class="col-sm-1">
                                            <i class="fa fa-mobile" aria-hidden="true" title="some thing"></i>
                                        </div>
                                    </div>
                                    <p class="price"><?= $product->price ?></p>
                                    <p class="buttons">
                                        <a href="<?= Yii::$app->urlManager->createUrl(['product/view' ,'id'=>$product->product_id ])?>" class="btn btn-default">View detail</a>
                                        <a href="<?= Yii::$app->urlManager->createUrl(['order/add' ,'id'=>$product->product_id ])?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                    <?php
                        endforeach;
                    ?>

                </div>
                <!-- /.container -->
            </div>
            <!-- /#content -->
        </div>
        <!-- /#all -->

            