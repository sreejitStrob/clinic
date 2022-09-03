<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consultation_type".
 *
 * @property int $consultant_type_id
 * @property int $name
 * @property int $amount
 * @property int $is_deleted
 * @property int $created_at
 * @property int $updated_at
 */
class ConsultationType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consultation_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','amount'], 'required'],
            [['is_deleted', 'created_at', 'updated_at'], 'safe'],
            [['amount',], 'integer'],

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
