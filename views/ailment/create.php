<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ailment */

$this->title = 'Create Ailment';
$this->params['breadcrumbs'][] = ['label' => 'Ailments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ailment-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
