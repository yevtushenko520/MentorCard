<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cande_question".
 *
 * @property int $id
 * @property int $question_id
 * @property string $cande
 * @property string $cat
 */
class CandeQuestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cande_question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question_id'], 'required'],
            [['question_id'], 'integer'],
            [['cande', 'cat'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_id' => 'Question ID',
            'cande' => 'Cande',
            'cat' => 'Cat',
        ];
    }
}
