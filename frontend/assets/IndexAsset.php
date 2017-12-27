<?php
/**
 * Author: druphliu
 * Description
 * Email: druphliu@gmail.com
 * Created at: 2016-08-12 22:37
 */

namespace frontend\assets;


class IndexAsset extends \yii\web\AssetBundle
{
    public $js = [
        'static/js/responsiveslides.min.js',
    ];

    public $depends = [
        'frontend\assets\AppAsset'
    ];
}