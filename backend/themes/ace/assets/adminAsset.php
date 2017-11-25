<?php

namespace backend\themes\ace\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class adminAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/ace/assets';

    //public $basePath = '@webroot';
    //public $baseUrl = '@web';


    public $css = [
        'css/bootstrap.min.css',
        'css/fonts.googleapis.com.css',
        'font-awesome/4.5.0/css/font-awesome.min.css',
        'css/ace.min.css',
        'css/listswap.css',
        'css/jquerysctipttop.css',
        'css/custom.css',
        'css/ace-part2.min.css',
        'css/ace-skins.min.css',
        'css/ace-rtl.min.css',
        'css/ace-ie.min.css',
    ];
    public $js = [

        'js/bootstrap.min.js',
        'js/ace-extra.min.js',
        'js/html5shiv.min.js',
        'js/jquery.listswap.js',
        'js/show_ads.js',
        'js/respond.min.js',
        'js/jquery-ui.custom.min.js',
        'js/jquery.ui.touch-punch.min.js',
        'js/jquery.easypiechart.min.js',
        'js/jquery.sparkline.index.min.js',
        'js/jquery.flot.min.js',
        'js/jquery.flot.pie.min.js',
        'js/jquery.flot.resize.min.js',
        'js/ace-elements.min.js',
        'js/ace.min.js',
    ];

//    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//    ];

    //public $jsOptions = [ 'position' => \yii\web\View::POS_HEAD ];

}
