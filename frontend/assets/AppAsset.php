<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com',
        'https://fonts.gstatic.com',
        'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@100;300;400;500;700&display=swap',
        'template/login_page/css/modern-normalize.min.css',
        'template/login_page/css/bootstrap.min.css',
        'template/login_page/css/main.css',
//        'css/site.css',
    ];
    public $js = [
        'template/login_page/js/background-video.js',
        'template/login_page/js/gsap.min.js',
        'template/login_page/js/main.js',

    ];
    public $depends = [
        'frontend\assets\Fa5Asset',
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}