<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ailment".
 *
 * @property int $ailment_id
 * @property string $name
 * @property string $description
 * @property int $is_deleted
 */
class Ailment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ailment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['is_deleted'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ailment_id' => 'Ailment ID',
            'name' => 'Name',
            'description' => 'Description',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
