<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ailment */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ailments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ailment-view">

    <p>
        <?= Html::a('Update', ['update', 'ailment_id' => $model->ailment_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ailment_id' => $model->ailment_id], [
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
            'description:ntext',
            'is_deleted',
        ],
    ]) ?>

</div>
