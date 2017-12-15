<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

?>

<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><?= Html::a('', ['index'], ['class'=>'fa fa-home']) ?>
                </li>
                <li>اطلاعیه</li>
            </ul>

        </div>
        <div class="col-md-3">
            <!-- *** PAGES MENU ***
_________________________________________________________ -->

            <div class="panel panel-default sidebar-menu">

                <div class="panel-heading">
                    <h3 class="panel-title"></h3>
                </div>

                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li>
                            <?= Html::a('ارتباط با ما', ['contact'], ['class'=>'']) ?>
                        </li>
                        <li>
                            <?= Html::a('درباره ما', ['about'], ['class'=>'']) ?>
                        </li>

                    </ul>

                </div>
            </div>

            <!-- *** PAGES MENU END *** -->
        </div>

        <div class="col-sm-9" id="blog-listing">

            <div class="post">
                <h2><?= $model->title ?></h2>
                <p class="author-category"></p>
                <hr>
                <p class="intro"><?= $model->description ?></p>

                </p>
            </div>



        </div>
        <!-- /.col-md-9 -->
    </div>
    <!-- /.container -->
</div>
