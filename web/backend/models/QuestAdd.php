<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quest_add".
 *
 * @property int $id
 * @property int $id_lang_quest
 * @property string $answer
 * @property int $yes_no
 */
class QuestAdd extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quest_add';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_lang_quest', 'answer', 'yes_no'], 'required'],
            [['id_lang_quest', 'yes_no'], 'integer'],
            [['answer'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_lang_quest' => 'Id Lang Quest',
            'answer' => 'Answer',
            'yes_no' => 'Yes No',
        ];
    }
}
