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
        <title>全国-公司列表-招聘网-最专业的互联网招聘平台</title>
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
        
    <div id="body">
         <?php $this->beginBody() ?>
            <div id="header">
    <div class="wrapper">
        <a href="/index.php/Home/Index/index.html" class="logo">
            <img src="../Public/HomeStyle/images/logo.png" width="229" height="43" alt="招聘招聘-专注互联网招聘" />
        </a>
                <!-- 未登录头部 -->
        <ul class="reset" id="navheader">
            <li ><a href="/index.php/Home/Index/index.html">首页</a></li>
            <li class="current"><a href="/index.php/Home/Index/companylist.html" >源码</a></li>
            <li ><a href="/index.php/Resume/index.html" rel="nofollow">视频下载</a></li>
            <li ><a href="/index.php/Home/CompanyJob/create.html" rel="nofollow">开发工具</a></li>
            <li ><a href="/index.php/Home/News/index.html" rel="nofollow">联系我们</a></li>
        </ul>
        <ul class="loginTop">
            <li><a href="<?php echo Url::toRoute('user/login');?>" rel="nofollow">登录</a></li> 
            <li>|</li>
            <li><a href="<?php echo Url::toRoute('user/register');?>" rel="nofollow">注册</a></li>
        </ul>
        
                    </div>
</div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div id="container">
            <!-- BEGIN CONTENT -->
                        <?=$content?>
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div id="footer">
    <div class="wrapper">
        <a rel="nofollow" target="_blank" href="#">
            联系我们
        </a>
        <a target="_blank" href="#">
            互联网公司导航
        </a>
        <a rel="nofollow" target="_blank" href="#">
            招聘微博
        </a>
        <a rel="nofollow" href="javascript:void(0)" class="footer_qr">
            招聘微信
            <i>
            </i>
        </a>
        <div class="copyright">
            &copy;2013-2014 zhaopin
            <a href="#"
            target="_blank">
                豫ICP备123456号-2
            </a>
        </div>
    </div>
</div>
    <?php $this->endBody() ?>
    </body>

</html>
<?php $this->endPage() ?>