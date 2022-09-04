<?php

use app\helpers\AppHelper;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <p>
        <?= Html::a('Create Patient', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Name',
                'value' => function ($model) {
                    return $model->name;
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
            'phone',
            'email:email',
            'notes:ntext',
            'gender',
            [
                'label' => 'Gender',
                'value' => function ($model) {
                    return AppHelper::$gender[$model->gender];
                },
                'filter' => Html::activeDropDownList($searchModel, 'gender', AppHelper::$gender, ['class' => 'form-control', 'prompt' => 'Filer By Status']),
            ],
            [
                'label' => 'Appointment',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a('Create Appointment', ['/appointment/create', 'patient_id' => $model->patient_id], ['class' => 'btn btn-primary']);
                },
            ],
            'created_at',
            //'updated_at',
            ['class' => 'yii\grid\ActionColumn']
        ],
    ]); ?>


</div>
