<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quest_soc".
 *
 * @property int $id
 * @property int $quest_id
 * @property int $soc_id
 */
class QuestSoc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quest_soc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quest_id', 'soc_id'], 'required'],
            [['quest_id', 'soc_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quest_id' => 'Quest ID',
            'soc_id' => 'Soc ID',
        ];
    }
}
