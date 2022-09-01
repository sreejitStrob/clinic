<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consultant_type".
 *
 * @property int $consultant_type_id
 * @property int $name
 * @property int $amount
 * @property int $is_deleted
 * @property int $created_at
 * @property int $updated_at
 */
class ConsultantType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consultant_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'amount', 'is_deleted', 'created_at', 'updated_at'], 'required'],
            [['name', 'amount', 'is_deleted', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'consultant_type_id' => 'Consultant Type ID',
            'name' => 'Name',
            'amount' => 'Amount',
            'is_deleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
