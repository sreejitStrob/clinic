<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inventory */

$this->title = 'Update Inventory: ' . $model->inventory_id;
$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->inventory_id, 'url' => ['view', 'inventory_id' => $model->inventory_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventory-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
