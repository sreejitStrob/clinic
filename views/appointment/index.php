<?php

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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'appointment_id',
            'patient_id',
            'ailment_id',
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
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Appointment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'appointment_id' => $model->appointment_id]);
                 }
            ],
        ],
    ]); ?>


</div>
