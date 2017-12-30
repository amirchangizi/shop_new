<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

?>

<div id="all">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumb container-fluid no-padding">
        <div class="container">
            <?php
                echo  Breadcrumbs::widget([
                    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
                    'links' => [
                        Yii::t('app' ,'Category'),
                    ],
                ]);
            ?>

        </div>
    </div><!-- Page Breadcrumb /- -->
    <div id="content">
        <div class="row" style="margin-right: 0px !important; margin-left: 0px !important;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="wrapper-brand">
                            <div class="logo-produ">
                                <div class="logo-produ1">
                                    <a href="#">
                                        <?= Html::img('@web/img/Bugera-50x50.png')?>
                                    </a>
                                    <span><?= Yii::t('app' ,'Bugera') ?></span>
                                </div>
                                <div class="logo-produ1">
                                    <a href="#">
                                        <?= Html::img('@web/img/Bugera-50x50.png')?>
                                    </a>
                                    <span><?= Yii::t('app' ,'Bugera') ?></span>
                                </div>
                                <div class="logo-produ1">
                                    <a href="#">
                                        <?= Html::img('@web/img/Bugera-50x50.png')?>
                                    </a>
                                    <span><?= Yii::t('app' ,'Bugera') ?></span>
                                </div>
                                <div class="logo-produ1">
                                    <a href="#">
                                        <?= Html::img('@web/img/Bugera-50x50.png')?>
                                    </a>
                                    <span><?= Yii::t('app' ,'Bugera') ?></span>
                                </div>
                                <div class="logo-produ1">
                                    <a href="#">
                                        <?= Html::img('@web/img/Bugera-50x50.png')?>
                                    </a>
                                    <span><?= Yii::t('app' ,'Bugera') ?></span>
                                </div>
                                <div class="logo-produ1">
                                    <a href="#">
                                        <?= Html::img('@web/img/Bugera-50x50.png')?>
                                    </a>
                                    <span><?= Yii::t('app' ,'Bugera') ?></span>
                                </div>
                                <div class="logo-produ1">
                                    <a href="#">
                                        <?= Html::img('@web/img/Bugera-50x50.png')?>
                                    </a>
                                    <span><?= Yii::t('app' ,'Bugera') ?></span>
                                </div>
                                <div class="logo-produ1">
                                    <a href="#">
                                        <?= Html::img('@web/img/Bugera-50x50.png')?>
                                    </a>
                                    <span><?= Yii::t('app' ,'Bugera') ?></span>
                                </div>
                                <div class="logo-produ1">
                                    <a href="#">
                                        <?= Html::img('@web/img/Bugera-50x50.png')?>
                                    </a>
                                    <span><?= Yii::t('app' ,'Bugera') ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box info-bar">

                    <div class="row">
                        <div class="col-sm-12 col-md-12  products-number-sort">
                            <div class="row">
                                <form class="form-inline">
                                    <div class="col-md-4 col-xs-4 col-sm-4">
                                        <div class="products-sort-by">
                                            <strong><?= Yii::t('app' ,'Sort by:') ?></strong>
                                            <select name="sort-by" class="form-control">
                                                <option><?= Yii::t('app' ,'Orice : Expensive > Cheap') ?></option>
                                                <option><?= Yii::t('app' ,'Price : Cheap < Expensive') ?> </option>
                                                <option><?= Yii::t('app' ,'Alphabet : A - Z') ?></option>
                                                <option><?= Yii::t('app' ,'Alphabet : Z - A') ?></option>
                                                <option><?= Yii::t('app' ,'Alphabet : Z - A') ?></option>
                                                <option><?= Yii::t('app' ,'Best Selling') ?></option>
                                                <option><?= Yii::t('app' ,'Most Viewed') ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-md-2 col-md-offset-6">
                                    <div class="buttons-section">
                                        <span class="compare-count">2</span>
                                        <div class="buttons-bg" style="margin-right: 15px;">
                                            <a class="btn btn-primary btn-lg pull-right" href="<?= Yii::$app->urlManager->createUrl(['/product/compare']) ?>" style="padding: 10px 38px;"><?= Yii::t('app' ,'Compare') ?></a>
                                        </div>
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
                            <div class="col-md-3 col-sm-6">
                                <div class="category-product">
                                    <figure class="snip1312" style="overflow: hidden;height:195px;">
                                        <div class="image"><a href="<?= Yii::$app->urlManager->createUrl(['/product/view' ,'id' =>$product->product_id]) ?>"><?= Html::img('@web/img/products/'.$product->image ,['class' => 'img-responsive']) ?></a></div>
                                    </figure>
                                    <div class="col-xs-12 icons-category">
                                        <div class="col-xs-3 icon-place">
                                            <?= Html::img('@web/img/head1.png',['alt' => 'something'],['class' => 'icon-img']) ?>
                                        </div>
                                        <div class="col-xs-3 icon-place" >
                                            <?= Html::img('@web/img/head1.png',['alt' => 'something'],['class' => 'icon-img']) ?>
                                        </div>
                                        <div class="col-xs-3 icon-place" >
                                            <?= Html::img('@web/img/head1.png',['alt' => 'something'],['class' => 'icon-img']) ?>
                                        </div>
                                        <div class="col-xs-3 icon-place">
                                            <?= Html::img('@web/img/head1.png',['alt' => 'something'],['class' => 'icon-img']) ?>
                                        </div>
                                        <div class="col-xs-3 icon-place">
                                            <?= Html::img('@web/img/head1.png',['alt' => 'something'],['class' => 'icon-img']) ?>
                                        </div>
                                        <div class="col-xs-3 icon-place">
                                            <?= Html::img('@web/img/head1.png',['alt' => 'something'],['class' => 'icon-img']) ?>
                                        </div>
                                        <div class="col-xs-3 icon-place">
                                            <?= Html::img('@web/img/head1.png',['alt' => 'something'],['class' => 'icon-img']) ?>
                                        </div>
                                        <div class="col-xs-3 icon-place">
                                            <?= Html::img('@web/img/head1.png',['alt' => 'something'],['class' => 'icon-img']) ?>
                                        </div>
                                    </div>
                                    <div class="title">
                                        <h3><a href="<?= Yii::$app->urlManager->createUrl(['/product/view' ,'id' =>$product->product_id]) ?>"><?= $product->name ?></a></h3>
                                        <p class="price"><a href="<?= Yii::$app->urlManager->createUrl(['/product/view' ,'id' =>$product->product_id]) ?>"><?= number_format($product->price,2) ?></a></p>
                                    </div>
                                    <!-- /.text -->
                                    <div class="compare">
                                        <div class="compare-text"><i class="fa fa-balance-scale" aria-hidden="true"></i><?= Html::a(Yii::t('app' ,' Add To Compare') ,['/product/addcompare' , 'productId'=>$product->product_id])  ?></div>
                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>

                    <?php endforeach; ?>












                    <!-- /.col-md-9 -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /#content -->
        </div>
        <!-- /#all -->
        <script type="text/javascript">
            $(".hover").mouseleave(
                function () {
                    $(this).removeClass("hover");
                }
            );
        </script>


