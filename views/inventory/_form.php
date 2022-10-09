<?php

use app\helpers\AppHelper;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inventory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventory-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">

            <?=
            $form->field($model, 'product_id')->widget(Select2::classname(), [
                'data' => AppHelper::getProducts(),
                'options' => ['placeholder' => 'Select a Product ...'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'batch_no')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'date_of_order')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter date of order ...'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'pack')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'quantity')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'mfg_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter Mfg date ...'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                ]
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'expiry_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter Expiry date ...'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                ]
            ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">

        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
