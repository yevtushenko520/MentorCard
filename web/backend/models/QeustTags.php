<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qeust_tags".
 *
 * @property int $id
 * @property int $tags_id
 * @property int $qeust_id
 */
class QeustTags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qeust_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tags_id', 'qeust_id'], 'integer'],
            [['qeust_id'], 'required'],
        ];
    }

    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tags_id' => 'Tags ID',
            'qeust_id' => 'Qeust ID',
        ];
    }
    public function getTags(){
        return $this -> hasOne(Tags::className(),['id'=>'tags_id']);
    }
}
