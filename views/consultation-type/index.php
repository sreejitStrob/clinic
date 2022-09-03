<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConsultationTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultation Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consultation-type-index">

    <p>
        <?= Html::a('Create Consultation Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'amount',
            'is_deleted',
            'created_at',
            //'updated_at',
            ['class' => 'yii\grid\ActionColumn']
        ],
    ]); ?>


</div>
