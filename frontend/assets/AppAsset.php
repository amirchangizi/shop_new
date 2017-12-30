<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap/bootstrap.min.css',
        'css/categories_responsive.css',
        'css/categories_styles.css',
        'css/contact_responsive.css',
        'css/contact_styles.css',
        'css/main_styles.css',
        'css/responsive.css',
        'css/navigation-menu.css',
        'css/single_responsive.css',
        'css/single_styles.css',
        'css/animate.css',
        'css/font-awesome.css',
        'css/jquery-ui.css',
        'css/owl.carousel.css',
        'css/owl.theme.default.css',
        'css/themify-icons.css',
        'css/libraries/lib.css',
        'css/libraries/lightslider/lightslider.min.css',
        'css/footer.css',
        'css/header.css',
        'css/shortcode.css',
        'css/style.css',
        'css/woocommerce.css',
        'css/plugins.css',
        'css/fonts.css',
        'css/custom.css',
        'css/category-style.css',

    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/categories_custom.js',
        'js/contact_custom.js',
        'js/custom.js',
        'js/easing.js',
        'js/isotope.pkgd.min.js',
        'js/jquery-3.2.1.min.js',
        'js/jquery-ui.js',
        'js/owl.carousel.js',
        'js/popper.js',
        'js/single_custom.js',
        'js/codepen.js',
        'js/Chart.min.js',
        'js/functions.js',
        'js/jquery.knob.js',
        'js/jquery.min.js',
        'js/html5/html5shiv.min.js',
        'js/html5/respond.min.js',
        'js/libraries/lib.js',
        'js/libraries/lightslider/lightslider.min.js',
        'js/libraries/tweecool.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
