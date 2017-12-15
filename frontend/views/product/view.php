<?php
use yii\bootstrap\Html;
?>
<div class="kala">
    <?= Html::img('@web/img/product/'.$model->image ,['class' =>'img-responsive pull-right' ,'style'=>'margin-top: -31px; width: 100%; height: 450px;']) ?>
    <div class="middle">
        <a href=""><div class="text" style="background:transparent;"><i class="fa fa-play-circle"></i></div></a>
    </div>
</div>

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
                <h4 ><?= $model->price ?></h4>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <?= Html::a(Yii::t('app' ,'Buy') ,['order/add', 'id'=>$model->product_id ] ,['class'=>'btn-custom']) ?>
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
                        <?=

                        $model->description ?>
                    </h3>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <?= Html::img('@web/img/product/'.$model->image ,['class' =>'img-responsive pull-right' ]) ?>
                </div>
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

                <?php
                    $attraList = \common\helpers\ProductHelper::getProductAttribute($id);
                    if($attraList)
                        foreach ($attraList as $name => $desc) :

                ?>
                <tr>
                    <td class="text-right col-lg-4"><?= $name?></td>
                    <td class="text-right col-lg-8"><?= $desc ?></td>
                </tr>
                <?php endforeach; ?>
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
            <?php
                $relatedList = \common\helpers\ProductHelper::getProductRelated($id) ;
                if($relatedList)
                    foreach ($relatedList as $related):
            ?>
                        <div class="row" style="border:1px  solid #333333;">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 product-img">
                                <?php
                                    if($related->image)
                                        echo Html::img('@web/img/product/'.$related->image ,['class'=>'img-responsive related-img']);
                                ?>

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 gap-top-sm" style="text-align: left;">
                               <?= $related->description ?>
                            </div>
                            <div class="col-md-4 pull-right col-sm-12 col-xs-12">
                                <div class="product-price">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b><?= $related->price ?></b></div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                        <?= Html::a(Yii::t('app' ,'Buy') ,['order/add', 'id'=>$related->product_id ] ,['class'=>'btn-custom']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>

            <?php
                endforeach;
            ?>



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
