<?php

namespace frontend\themes\resturan\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@frontend/themes/resturan/assets';

    //public $basePath = '@webroot';
    //public $baseUrl = '@web';


    public $css = [
        'css/bootstrap.min.css',
        'css/bootstrap-rtl.css',
        'css/font-awesome.min.css',
        'css/plugins.css',
        'css/responsive.css',
        'css/style.css',
        'css/custom.css',
        'css/animate/animate.css',
        'css/style-tabs.css',
        'css/responsive-tabs.css',
    ];

    public $js = [
        'js/bootstrap.min.js',
        'js/bootstrap-rtl.js',
        'js/jquery-1.11.2.min.js',
        'js/jquery.easing.1.3.js',
        'js/main.js',
        'js/modernizr-2.8.3-respond-1.4.2.min.js',
        'js/plugins.js',
        'js/wow.min.js',
        'js/jquery.responsiveTabs.js',
        'js/jquery.responsiveTabs.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        //'airani\bootstrap\BootstrapRtlAsset',
    ];

    public $jsOptions = [ 'position' => \yii\web\View::POS_END ];

}
