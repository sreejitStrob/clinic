<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PatientHistory */

$this->title = 'Update Patient History: ' . $model->patient_history_id;
$this->params['breadcrumbs'][] = ['label' => 'Patient Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->patient_history_id, 'url' => ['view', 'patient_history_id' => $model->patient_history_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="patient-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
