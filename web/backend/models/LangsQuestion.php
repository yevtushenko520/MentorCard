<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "langs_question".
 *
 * @property int $id
 * @property int $question_id
 * @property string $languege
 * @property string $question
 * @property string $answer_yes
 * @property string $answer_no1
 * @property string $answer_no2
 */
class LangsQuestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'langs_question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['languege', 'question', 'answer_yes', 'answer_no1', 'answer_no2'], 'required'],
            [['question_id', 'one', 'two', 'three'], 'integer'],
            [['languege', 'question', 'answer_yes', 'answer_no1', 'answer_no2'], 'string', 'max' => 255],
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
            'languege' => 'Languege',
            'question' => 'Question',
            'answer_yes' => 'Answer #1',
            'answer_no1' => 'Answer #2',
            'answer_no2' => 'Answer #3',
            'qadd' => 'Question Add',
            'one' => 'True Answer #1',
            'two' => 'True Answer #2',
            'three' => 'True Answer #3',
        ];
    }
    public function afterSave($insret, $changedAttributes)
    {

        parent::afterSave($insret, $changedAttributes);

       
        
        
    }

    public function getQuesAdd(){
        return $this -> hasMany(QuestAdd::className(),['id_lang_quest'=>'id']);
    }
   
    
    public function getQadd(){
        $arr5 = \yii\helpers\ArrayHelper::map($this->quesAdd,'id','answer');
        return implode(',',$arr5); 
    }
   
}
