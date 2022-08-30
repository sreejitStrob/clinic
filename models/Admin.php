<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $admin_id
 * @property string $username
 * @property string $password
 * @property string|null $create_at
 * @property string|null $updated_at
 */
class Admin  extends User
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['create_at', 'updated_at'], 'safe'],
            [['username', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'username' => 'Username',
            'password' => 'Password',
            'create_at' => 'Create At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
}
