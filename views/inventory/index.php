<?php

use app\helpers\AppHelper;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InventorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-index">

    <p>
        <?= Html::a('Create Inventory', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Product',
                'contentOptions' => [ 'style' => 'width: 20%;' ],
                'value' => function ($model) {

                    return isset($model->product->name) ? $model->product->name : "";
                },
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'product_id',
                    'data' => AppHelper::getProducts(),
                    'options' => ['placeholder' => 'Select A product ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])
            ],
            'batch_no',
            'date_of_order',
            'rate',
            'pack',
            'quantity',
            'mfg_date',
            'expiry_date',
            'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'inventory_id' => $model->inventory_id]);
                 }
            ],
        ],
    ]); ?>


</div>
