<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-6">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    <div class="row">
        <div class="col-md-6">
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'gender')->dropDownList([ 'M' => 'Male', 'F' => 'Female'], ['prompt' => 'Select Gender']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

    </div>
    <?php ActiveForm::end(); ?>

</div>
