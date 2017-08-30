<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Ym */

$this->title = 'Create Ym';
$this->params['breadcrumbs'][] = ['label' => 'Yms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ym-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
