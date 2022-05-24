<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MedicalRepresentative */

$this->title = 'Create Medical Representative';
$this->params['breadcrumbs'][] = ['label' => 'Medical Representatives', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medical-representative-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
