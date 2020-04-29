<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_tags".
 *
 * @property int $id
 * @property int $user_id
 * @property int $tag_id
 */
class UserTags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'tag_id'], 'required'],
            [['user_id', 'tag_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'tag_id' => 'Tag ID',
        ];
    }
}
