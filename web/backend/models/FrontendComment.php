<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "frontend_comment".
 *
 * @property int $id
 * @property int $lang_id
 * @property string $image
 * @property string $name
 * @property string $position
 * @property string $coment
 */
class FrontendComment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'frontend_comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang_id',  'name', 'position', 'coment'], 'required'],
            [['lang_id'], 'integer'],
            [['name', 'position', 'coment'], 'string', 'max' => 255],
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang_id'=>'Languege',
            'idPos' => 'Langueges',
            'image' => 'Avatar',
            'name' => 'Name',
            'position' => 'Position',
            'coment' => 'Coment',
        ];
    }

    public function getIdPos(){

        $posts03 = Yii::$app->db->createCommand('SELECT * FROM langs WHERE id='.$this->lang_id)->queryAll();

        return $posts03[0]['name'];
    }
}
