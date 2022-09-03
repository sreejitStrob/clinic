<?php

use app\helpers\AppHelper;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Appointments';
$this->params['breadcrumbs'][] = $this->title;
//debugPrint(AppHelper::getAilmentList());
//debugPrint(['1' => 'Yes', '01' => 'No']);
//exit;
?>
<div class="appointment-index">

    <p>
        <?= Html::a('Create Appointment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [ 'style' => 'table-layout:fixed;' ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'appointment_id',

            [
                'label' => 'Patient',
                'contentOptions' => [ 'style' => 'width: 20%;' ],
                'value' => function ($model) {

                    return isset($model->patient->name) ? $model->patient->name : "";
                },
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'patient_id',
                    'data' => AppHelper::getPatientList(),
                    'options' => ['placeholder' => 'Select A Patient ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])
            ],
            [
                'label' => 'Ailment',
                'contentOptions' => [ 'style' => 'width: 20%;'],
                'value' => function ($model) {
                    return isset($model->ailment->name) ? $model->ailment->name : "";
                },
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'ailment_id',
                    'data' => AppHelper::getAilmentList(),
                    'options' => ['placeholder' => 'Select A Ailment ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])
            ],
            'patient_name',
            'age',
            'amount',
            'notes:ntext',
            [
                'attribute' => 'is_followup',
                'value' => function ($model) {
                    return (!empty($model->is_followup)) ? 'Yes' : 'No';
                },
                'filter' => Html::activeDropDownList($searchModel, 'is_followup', [1 => 'Yes', 0 => 'No'], ['class' => 'form-control', 'prompt' => 'Filer By Status']),
            ],
            'created_at',
            ['class' => 'yii\grid\ActionColumn']
        ],
    ]); ?>


</div>
