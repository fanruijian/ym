<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-home',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    /* 默认路由 */
    'defaultRoute' => 'index/index',
    /* 控制器默认命名空间 */
    'controllerNamespace' => 'frontend\controllers',
    /* 模块 */
    // 'modules' => [
    //     'user' => [
    //         'class' => 'frontend\modules\user\Module',
    //     ],
    // ],
    'components' => [
        'user' => [
            'identityClass' => 'frontend\models\User',
            'enableAutoLogin' => true,
        ],
        /* 修改默认的request组件 */
        'request' => [
            'class' => 'common\core\Request',
            'baseUrl' => Yii::getAlias('@frontendUrl'),
            'enableCsrfValidation' => false,
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
            'errorAction' => 'public/404',
        ],

        'session' => [
            'class' => 'yii\web\DbSession',
            // Set the following if want to use DB component other than
            // default 'db'.
            // 'db' => 'mydb',
            // To override default session table set the following
            //'sessionName' => 'slsession',
            'sessionTable' => 'yii_session',
        ],

        'urlManager' => [
            'enablePrettyUrl' => env('FRONTEND_PRETTY_URL', true),
            'showScriptName' => false,
            'rules' => [
            ],
        ],

    ],
    'params' => $params,
];
