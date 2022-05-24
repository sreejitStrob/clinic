<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patient Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-history-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Patient History', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'patient_history_id',
            'patient_id',
            'notes:ntext',
            'created_at',
            'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PatientHistory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'patient_history_id' => $model->patient_history_id]);
                 }
            ],
        ],
    ]); ?>


</div>
