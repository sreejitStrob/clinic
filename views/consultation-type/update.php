<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ConsultationType */

$this->title = 'Update Consultation Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Consultation Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'consultant_type_id' => $model->consultant_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="consultation-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
