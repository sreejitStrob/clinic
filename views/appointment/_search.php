<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AppointmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'appointment_id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'ailment_id') ?>

    <?= $form->field($model, 'patient_name') ?>

    <?= $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'is_followup') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
