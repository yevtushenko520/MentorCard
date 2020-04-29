<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stud_langs_stud".
 *
 * @property int $id
 * @property int $langs_id
 * @property int $stud_id
 */
class StudLangsStud extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stud_langs_stud';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['langs_id', 'stud_id'], 'required'],
            [['langs_id', 'stud_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'langs_id' => 'Langs ID',
            'stud_id' => 'Stud ID',
        ];
    }
    public function getLangs(){
    
        if(Yii::$app->user->identity->role==3 || Yii::$app->user->identity->role==2 || Yii::$app->user->identity->role==1){
            
            return $this -> hasOne(AdminLangs::className(),['id'=>'langs_id']);
        }else{
        return $this -> hasOne(Langs::className(),['id'=>'langs_id']);
        }
    }
}
