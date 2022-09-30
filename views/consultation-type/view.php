<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ConsultationType */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Consultation Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="consultation-type-view">

    <p>
        <?= Html::a('Update', ['update', 'consultant_type_id' => $model->consultant_type_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'consultant_type_id' => $model->consultant_type_id], [
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
            'name',
            'amount',
        ],
    ]) ?>

</div>
