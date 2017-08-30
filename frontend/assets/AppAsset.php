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
class AppAsset extends AssetBundle
{
    public $sourcePath = '@common/metronic';
    public $css = [

    ];
    public $js = [
        'Public/HomeStyle/js/company_list.min.js',
        // 'Public/HomeStyle/js/core.min.js',
        'Public/HomeStyle/js/popup.min.js',
    ];
    public $depends = [
        'frontend\assets\CoreAsset',
    ];
}
