<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = 'Update Patient: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'patient_id' => $model->patient_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="patient-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
