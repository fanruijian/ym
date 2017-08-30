<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;

\frontend\assets\CoreAsset::register($this);


$this->beginPage();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
        <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo $this->context->title;?></title>
        <meta content="全国condition-condition-公司列表-招聘网-最专业的互联网招聘平台" name="description">
        <meta content="全国condition-公司列表-招聘网-最专业的互联网招聘平台" name="keywords">
        <?php $this->head() ?>
        <link rel="Shortcut Icon" href="h/images/favicon.ico">
        <style>
            .hc_tag dl dt {
                width: 80px;
            }
        </style>
        <!--[if lte IE 8]>
            <script type="text/javascript" src="../Public/HomeStyle/js/excanvas.js">
            </script>
        <![endif]-->
    </head>
    
    <body id="login_bg">
         <?php $this->beginBody() ?>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div id="container">
            <!-- BEGIN CONTENT -->
                        <?=$content?>
        </div>
    <?php $this->endBody() ?>
    </body>

</html>
<?php $this->endPage() ?>