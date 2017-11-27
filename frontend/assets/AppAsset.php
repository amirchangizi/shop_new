<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/global.css',
        'css/bootsnav.css',
        'css/animate.min.css',
        'css/custom.css',
        'css/owl.carousel.css',
        'css/owl.theme.css',
        'css/style.mono.css',
        'css/font-awesome.css',
    ];
    public $js = [
        'js/bootstrap.js',
        'js/bootstrap.min.js',
        'js/npm.js',
        'js/part.js',
        'js/respond.min.js',
        'js/bootstrap-hover-dropdown.js',
        'js/front.js',
        'js/jquery.cookie.js',
        'js/jquery.flexslider.js',
        'js/jquery.flexslider.min.js',
        'js/jquery-1.11.0.min.js',
        'js/main.js',
        'js/modernizr.js',
        'js/owl.carousel.min.js',
        'js/waypoints.min.js',
        'js/brand.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',

    ];
}
