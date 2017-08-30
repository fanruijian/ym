<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\YmSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ym-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'cat_id') ?>

    <?= $form->field($model, 'discription') ?>

    <?= $form->field($model, 'shows') ?>

    <?php // echo $form->field($model, 'down_url') ?>

    <?php // echo $form->field($model, 'get_code') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'modified_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>