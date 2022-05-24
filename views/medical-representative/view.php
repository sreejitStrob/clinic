<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MedicalRepresentative */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Medical Representatives', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="medical-representative-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'medical_representative_id' => $model->medical_representative_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'medical_representative_id' => $model->medical_representative_id], [
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
            'medical_representative_id',
            'name',
            'email:email',
            'notes:ntext',
            'address:ntext',
            'company',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
