<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MedicalRepresentativeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Medical Representatives';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medical-representative-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Medical Representative', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'medical_representative_id',
            'name',
            'email:email',
            'notes:ntext',
            'address:ntext',
            //'company',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MedicalRepresentative $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'medical_representative_id' => $model->medical_representative_id]);
                 }
            ],
        ],
    ]); ?>


</div>
