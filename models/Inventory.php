<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory".
 *
 * @property int $inventory_id
 * @property int $product_id
 * @property string|null $batch_no
 * @property string|null $date_of_order
 * @property float|null $rate
 * @property int $pack
 * @property int $quantity
 * @property string|null $mfg_date
 * @property string|null $expiry_date
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Inventory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'pack', 'quantity'], 'integer'],
            [['date_of_order', 'mfg_date', 'expiry_date', 'created_at', 'updated_at'], 'safe'],
            [['rate'], 'number'],
            [['batch_no'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'inventory_id' => 'Inventory ID',
            'product_id' => 'Product ID',
            'batch_no' => 'Batch No',
            'date_of_order' => 'Date Of Order',
            'rate' => 'Rate',
            'pack' => 'Pack',
            'quantity' => 'Quantity',
            'mfg_date' => 'Mfg Date',
            'expiry_date' => 'Expiry Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
