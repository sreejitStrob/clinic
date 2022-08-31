<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Appointment */

$this->title = $model->appointment_id;
$this->params['breadcrumbs'][] = ['label' => 'Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="appointment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'appointment_id' => $model->appointment_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'appointment_id' => $model->appointment_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'appointment_id',
            'patient_id',
            'ailment_id',
            'patient_name',
            'age',
            'amount',
            'notes:ntext',
            'is_followup',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
