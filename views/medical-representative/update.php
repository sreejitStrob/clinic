<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MedicalRepresentative */

$this->title = 'Update Medical Representative: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Medical Representatives', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'medical_representative_id' => $model->medical_representative_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="medical-representative-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
