<?php

namespace backend\themes\ace\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/ace/assets';

    //public $basePath = '@webroot';
    //public $baseUrl = '@web';


    public $css = [
    ];

    public $js = [
        'js/jquery-2.1.4.min.js',
        'js/tinymce/jquery.tinymce.min.js',
        'js/tinymce/tinymce.min.js',
    ];

    public $jsOptions = [ 'position' => \yii\web\View::POS_HEAD ];

}
