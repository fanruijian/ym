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
class CoreAsset extends AssetBundle
{
    public $sourcePath = '@common/metronic';
    /* 全局CSS文件 */
    public $css = [
        'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
        'Public/HomeStyle/css/style.css',
        'Public/HomeStyle/css/external.min.css',
        'Public/HomeStyle/css/popup.css',
        'Public/HomeStyle/css/reset-min.css',
        'Public/HomeStyle/css/home.css',
    ];
    /* 全局JS文件 */
    public $js = [
        'Public/HomeStyle/js/jquery.1.10.1.min.js',
        'Public/HomeStyle/js/jquery.lib.min.js',
        'Public/HomeStyle/js/ajaxfileupload.js',
        'Public/HomeStyle/js/additional-methods.js',
        // 'Public/HomeStyle/js/company_list.min.js',
        'Public/HomeStyle/js/core.min.js',
        'Public/HomeStyle/js/popup.min.js',
    ];
    /* 依赖关系 */
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\grid\GridViewAsset'
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];
}
