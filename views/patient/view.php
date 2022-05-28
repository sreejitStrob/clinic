<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="patient-view">



    <p>
        <?= Html::a('Update', ['update', 'patient_id' => $model->patient_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'patient_id' => $model->patient_id], [
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
            'patient_id',
            'name',
            'phone',
            'email:email',
            'notes:ntext',
            'gender',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
