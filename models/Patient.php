<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property int $patient_id
 * @property string $name
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $notes
 * @property string|null $gender
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['notes', 'gender'], 'string'],
            [['age'], 'integer'],
            [['created_at', 'updated_at','age'], 'safe'],
            [['name', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'patient_id' => 'Patient ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'notes' => 'Notes',
            'gender' => 'Gender',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
