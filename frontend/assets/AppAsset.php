<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2017-03-15 21:16
 */

namespace frontend\assets;

class AppAsset extends \yii\web\AssetBundle
{

    public $css = [
        'static/css/common.css',
        'static/css/bootstrap.min.css',
    ];

    public $js = [
        'static/js/jquery-1.11.2.min.js',
        'static/js/public.js',
        'static/js/bootstrap.min.js',
    ];

}
