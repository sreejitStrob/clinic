<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appointment".
 *
 * @property int $appointment_id
 * @property int|null $patient_id
 * @property int|null $ailment_id
 * @property string|null $patient_name
 * @property float|null $age
 * @property float $amount
 * @property string|null $notes
 * @property int|null $is_followup
 * @property string $created_at
 * @property string $updated_at
 */
class Appointment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appointment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patient_id', 'ailment_id', 'is_followup'], 'integer'],
            [['age', 'amount'], 'number'],
            [['notes'], 'string'],
            [['created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['patient_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'appointment_id' => 'Appointment ID',
            'patient_id' => 'Patient ID',
            'ailment_id' => 'Ailment ID',
            'patient_name' => 'Patient Name',
            'age' => 'Age',
            'amount' => 'Amount',
            'notes' => 'Notes',
            'is_followup' => 'Is Followup',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}