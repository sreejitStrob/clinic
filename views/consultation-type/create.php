<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ConsultationType */

$this->title = 'Create Consultation Type';
$this->params['breadcrumbs'][] = ['label' => 'Consultation Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consultation-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
