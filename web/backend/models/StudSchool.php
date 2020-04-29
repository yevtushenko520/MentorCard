<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stud_school".
 *
 * @property int $id
 * @property int $user_id
 * @property int $school_id
 */
class StudSchool extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stud_school';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'school_id'], 'required'],
            [['user_id', 'school_id'], 'integer'],
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
            'school_id' => 'School ID',
        ];
    }
}
