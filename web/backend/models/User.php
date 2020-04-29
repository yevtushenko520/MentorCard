<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $role
 * @property int $created_at
 * @property int $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    public $lang_array;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'role', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['lang_array'],'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'role' => 'Role',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'lang_array' => 'Lang Write',
            'langAsString'=> 'Lang Write',
        ];
    }

    public function getStudLangsWrite(){
        return $this -> hasMany(StudLangsWrite::className(),['student_id'=>'id']);
    }


    public function getLangsW(){

        if(Yii::$app->user->identity->role==3 || Yii::$app->user->identity->role==2 || Yii::$app->user->identity->role==1){
            
            return $this -> hasMany(AdminLangs::className(),['id'=>'lang_id'])->via('studLangsWrite');
        }else{
            return $this -> hasMany(LangsW::className(),['id'=>'lang_id'])->via('studLangsWrite');
        }
        
    }
    public function getLangAsString()
    {
        $arr3 = \yii\helpers\ArrayHelper::map($this->langsW,'id','name');
        return implode(',',$arr3);

    }

    public function afterFind()
    {
      
      $this->lang_array = $this->langsW;


    }

    public function afterSave($insret, $changedAttributes)
    {

        parent::afterSave($insret, $changedAttributes);


       
        $posts1375 = Yii::$app->db->createCommand('DELETE FROM  stud_langs_write WHERE student_id='.$this->id)->execute();

      

        $posts45 = Yii::$app->db->createCommand('INSERT INTO stud_langs_write (student_id,lang_id) VALUES ('.$this->id.','.$this->lang_array.')')->execute();

    
        

    }
}
