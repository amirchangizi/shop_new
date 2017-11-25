<?php
/**
 * Created by PhpStorm.
 * User: amir changizi
 * Date: 8/21/2017
 * Time: 7:11 PM
 */
namespace backend\themes\ace\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/ace/assets';

    //public $basePath = '@webroot';
    //public $baseUrl = '@web';


    public $css = [
        'css/bootstrap.min.css',
        'font-awesome/4.5.0/css/font-awesome.min.css',
        'css/ace.min.css',
        //  'css/style.css'
    ];

    public $js = [
        'js/jquery-2.1.4.min.js',
    ];

    public $jsOptions = [ 'position' => \yii\web\View::POS_HEAD ];

}
