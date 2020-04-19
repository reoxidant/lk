<?php


namespace app\assets;

use yii\web\AssetBundle;


class TestAssets extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/styles.css'
    ];

    public $js = [
        //source to js scripts
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}