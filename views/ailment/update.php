<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ailment */

$this->title = 'Update Ailment: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ailments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'ailment_id' => $model->ailment_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ailment-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
