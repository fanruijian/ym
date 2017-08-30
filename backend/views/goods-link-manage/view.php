<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\GoodsLinkManage */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Goods Link Manages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-link-manage-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'type',
            'goods_from',
            'img',
            'href',
            'desc:ntext',
            'status',
            'created_at',
            'modified_at',
        ],
    ]) ?>

</div>
