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
class LoginAsset extends AssetBundle
{
    public $sourcePath = '@common/metronic';
    public $css = [

    ];
    public $js = [
        // 'Public/HomeStyle/js/allmobilize.min.js',
        // 'Public/HomeStyle/js/conv.js',
    ];
    public $depends = [
        'frontend\assets\CoreAsset',
    ];
}
