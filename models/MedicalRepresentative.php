<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medical_representative".
 *
 * @property int $medical_representative_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $notes
 * @property string|null $address
 * @property string|null $company
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class MedicalRepresentative extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medical_representative';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['notes', 'address'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email', 'company'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'medical_representative_id' => 'Medical Representative ID',
            'name' => 'Name',
            'email' => 'Email',
            'notes' => 'Notes',
            'address' => 'Address',
            'company' => 'Company',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
