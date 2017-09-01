<?php

use yii\helpers\Html;
use common\core\ActiveForm;
use common\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Ad */
/* @var $form common\core\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'options'=>[
        'class'=>"form-aaa ",
        'enctype'=>"multipart/form-data",
    ]
]); ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('标题'); ?>

<?=$form->field($model, 'cat_id')->selectList(
    ArrayHelper::listDataLevel(\backend\models\ArticleCat::find()->asArray()->all(), 'id', 'title','id','pid'),
    ['class'=>'form-control c-md-2'])->label('分类'); ?>

<?= $form->field($model, 'discription')->textInput(['maxlength' => true])->label('简单描述') ?>

<?= $form->field($model, 'down_url')->textInput(['maxlength' => true])->label('下载地址'); ?>

<?= $form->field($model, 'get_code')->textInput(['maxlength' => true])->label('提取码'); ?>
<?=$form->field($model, 'content')->widget('\kucha\ueditor\UEditor',[
    'clientOptions' => [
        'serverUrl' => Url::to(['/public/ueditor']),//确保serverUrl正确指向后端地址
        'lang' =>'zh-cn', //中文为 zh-cn
        'initialFrameWidth' => '100%',
        'initialFrameHeight' => '400',
        //定制菜单，参考http://fex.baidu.com/ueditor/#start-toolbar
        'toolbars' => [
            [
                'fullscreen', 'source', 'undo', 'redo', '|',
                'fontsize',
                'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat',
                'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|',
                'forecolor', 'backcolor', '|',
                'lineheight', '|',
                'indent', '|',
            ],
            ['preview','simpleupload','insertimage','link','emotion','map','insertvideo','insertcode',]
        ]
    ]
],['class'=>'c-md-7'])->label('文章内容');?>

<div class="form-actions">
    <?= Html::submitButton('<i class="icon-ok"></i> 确定', ['class' => 'btn blue ajax-post','target-form'=>'form-aaa']) ?>
    <?= Html::button('取消', ['class' => 'btn']) ?>
</div>

<?php ActiveForm::end(); ?>
