<?php

use app\helpers\AppHelper;
use kartik\select2\Select2;
use yii\helpers\BaseUrl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerJsFile(BaseUrl::home() . 'js/appointment.js?micro=17', ['depends' => [\yii\web\JqueryAsset::className()]]);
/* @var $this yii\web\View */
/* @var $model app\models\Appointment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?=
            $form->field($model, 'patient_id')->widget(Select2::classname(), [
                'data' => AppHelper::getPatientList(),
                'options' => ['placeholder' => 'Select a patient ...'],

                'pluginOptions' => [
                    'allowClear' => true,
                ],
                'pluginEvents' => [
                    "select2:select" => "function() { appointment.patientSelect(this.value) }",
                ]
            ]);
            ?>
        </div>
        <div class="col-md-3">
            <?=
            $form->field($model, 'consultant_type_id')->widget(Select2::classname(), [
                'data' => AppHelper::getConsultationType(),
                'options' => ['placeholder' => 'Select a Consultation Type ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'pluginEvents' => [
                    "select2:select" => "function() { appointment.consultationDetails(this.value) }",
                ]
            ]);
            ?>
        </div>
        <div class="col-md-3">

            <?=
            $form->field($model, 'ailment_id')->widget(Select2::classname(), [
                'data' => AppHelper::getAilmentList(),
                'options' => ['placeholder' => 'Select a Ailment ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'patient_name')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'is_followup')->checkbox() ?>



    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
