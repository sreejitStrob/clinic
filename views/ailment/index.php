<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AilmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ailments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ailment-index">

    <p>
        <?= Html::a('Create Ailment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'description:ntext',
            'is_deleted',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Ailment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ailment_id' => $model->ailment_id]);
                }
            ],
        ],
    ]); ?>


</div>
