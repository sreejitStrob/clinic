<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inventory */

$this->title = $model->inventory_id;
$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="inventory-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'inventory_id' => $model->inventory_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'inventory_id' => $model->inventory_id], [
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
            'inventory_id',
            'product_id',
            'batch_no',
            'date_of_order',
            'rate',
            'pack',
            'quantity',
            'mfg_date',
            'expiry_date',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
