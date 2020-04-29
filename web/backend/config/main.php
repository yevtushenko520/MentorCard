<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok 
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => 'images/store', //path to origin images
            'imagesCachePath' => 'images/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick' 
            'placeHolderPath' => '@webroot/images/placeHolder.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
            'imageCompressionQuality' => 100, // Optional. Default value is 85.
        ],
        
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['*'],
            'generators' => [
                'tcrud'   => [
                    'class'     => '\wokster\ltewidgets\generators\tcrud\Generator',
                ],
                'tmodel'   => [
                    'class'     => '\wokster\ltewidgets\generators\tmodel\Generator',
                ]
            ]
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
           
        ],
        'urlManagerFrontEnd' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'http://www.mentorcard.de/frontend/web',
            'enablePrettyUrl' => false,
            'showScriptName' => false
            
        ], 
        'urlManagerRegister' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'http://www.mentorcard.de/backend/web',
            'enablePrettyUrl' => false,
            'showScriptName' => false
            
            
        ], 
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
              'facebook' => [
                'class' => 'yii\authclient\clients\Facebook',
                'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
                'clientId' => '2172092302822799',
                'clientSecret' => '0aa7eefe3e9937791e891a1091d2c6bb',
                'attributeNames' => ['name', 'email', 'first_name', 'last_name'],
              ],
              'google' => [
                'class'        => 'yii\authclient\clients\Google',
                'clientId' => '1066078470928-ue2qlg7csff48r6phdpfsfggq3m101f3.apps.googleusercontent.com',
                'clientSecret' => 'kraWbAL-lVKLEJsgUsYJM576',
            ],
            ],
          ],
    ],
    'params' => $params,
];
