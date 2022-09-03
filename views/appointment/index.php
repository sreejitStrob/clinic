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
                'contentOptions' => [ 'style' => 'width: 25%;' ],
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
            'ailment_id',
            [
                'label' => 'Ailment',
                   'value' => function ($model) {
                       return isset($model->patient->name) ? $model->patient->name : "";
                   }
            ],
            'patient_name',
            'age',
            'amount',
            'notes:ntext',
//            'is_followup',
            [
                'attribute' => 'is_followup',
                'value' => function ($model) {
                    return (!empty($model->is_followup)) ? 'Yes' : 'No';
                }
            ],
            'created_at',
            ['class' => 'yii\grid\ActionColumn']
        ],
    ]); ?>


</div>
