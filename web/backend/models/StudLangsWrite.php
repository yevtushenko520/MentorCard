<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stud_langs_write".
 *
 * @property int $id
 * @property int $lang_id
 * @property int $student_id
 */
class StudLangsWrite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stud_langs_write';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang_id', 'student_id'], 'required'],
            [['lang_id', 'student_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang_id' => 'Lang ID',
            'student_id' => 'Student ID',
        ];
    }
    public function getLangs(){

        if(Yii::$app->user->identity->role==3 || Yii::$app->user->identity->role==2 || Yii::$app->user->identity->role==1){
            
            return $this -> hasOne(AdminLangs::className(),['id'=>'langs_id']);
        }else{
            return $this -> hasOne(LangsW::className(),['id'=>'lang_id']);
        }
        
    }
}
