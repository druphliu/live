<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => common\models\User::className(),
            'enableAutoLogin' => true,
        ],
        'session' => [
            'timeout' => 1440,//session过期时间，单位为秒
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => yii\log\FileTarget::className(),
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'cache' => [
            'class' => yii\caching\FileCache::className(),//使用文件缓存，可根据需要改成apc redis memcache等其他缓存方式
            'keyPrefix' => 'frontend',       // 唯一键前缀
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,//隐藏index.php
            'enableStrictParsing' => false,
            'suffix' => '.html',//后缀，如果设置了此项，那么浏览器地址栏就必须带上.html后缀，否则会报404错误
            'rules' => [
                //'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                //'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>?id=<id>'
                //'detail/<id:\d+>' => 'site/detail?id=$id',
                //'post/22'=>'site/detail',
                //'<controller:detail>/<id:\d+>' => '<controller>/index',
                'index'=> 'site/index',
                'news' => 'news/index',
                'game'=>'game/index',
                'login' => 'site/login',
                'signup' => 'site/signup',
                'comment' => 'article/comment',
                'search' => 'search/index',
                'tag/<tag:\w+>' => 'search/tag',
                'rss' => 'article/rss',
                'list/<page:\d+>' => 'site/index',
            ],
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@backend/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',

                    ],
                ],
                'front*' => [
                    'class' => yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@frontend/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'frontend' => 'frontend.php',
                        'app/error' => 'error.php',

                    ],
                ],
            ],
        ],
        'assetManager' => [
            'linkAssets' => false,
            'bundles' => [
                yii\web\JqueryAsset::className() => [
                    'js' => [],
                ],
                frontend\assets\AppAsset::className() => [
                    'css' => [
                        'a' => 'static/css/common.css',
                       // 'b' => 'static/plugins/toastr/toastr.min.css',
                        'c'=> 'static/css/bootstrap.min.css',
                        'b'=>'static/css/index.css',
                    ],
                    'js' => [
                        'a' => 'static/js/jquery-1.11.2.min.js',
                       // 'b' => 'static/js/index.js',
                        'c' => 'static/js/public.js',
                        'd'=> 'static/js/bootstrap.min.js',
                    ],
                ],
                frontend\assets\IndexAsset::className() => [
                    'css'=>[

                    ],
                    'js' => [
                        'a' => 'static/js/responsiveslides.min.js',
                    ]
                ],
                frontend\assets\NewsAsset::className() => [
                    'css'=>[
                        'a'=>['static/css/swiper-3.4.0.min.css']
                    ],
                    'js' => [
                        'a' => 'static/js/swiper-3.4.0.min.js',
                    ]
                ],
                frontend\assets\ViewAsset::className() => [
                    'css' => [
                        'a'=>['static/css/swiper-3.4.0.min.css']
                    ],
                    'js' => [
                        'a' => 'static/js/swiper-3.4.0.min.js',
                       /* 'a' => 'static/syntaxhighlighter/scripts/shCore.js',
                        'b' => 'static/syntaxhighlighter/scripts/shBrushJScript.js',
                        'c' => 'static/syntaxhighlighter/scripts/shBrushPython.js',
                        'd' => 'static/syntaxhighlighter/scripts/shBrushPhp.js',
                        'e' => 'static/syntaxhighlighter/scripts/shBrushJava.js',
                        'f' =>'static/syntaxhighlighter/scripts/shBrushCss.js',*/
                    ]
                ],
            ]
        ]
    ],
    'params' => $params,
    'on beforeRequest' => [feehi\components\Feehi::className(), 'frontendInit'],
];
