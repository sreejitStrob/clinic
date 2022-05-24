<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient_history".
 *
 * @property int $patient_history_id
 * @property int $patient_id
 * @property string|null $notes
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class PatientHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patient_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patient_id'], 'required'],
            [['patient_id'], 'integer'],
            [['notes'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'patient_history_id' => 'Patient History ID',
            'patient_id' => 'Patient ID',
            'notes' => 'Notes',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
