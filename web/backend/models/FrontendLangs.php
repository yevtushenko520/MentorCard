<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "frontend_langs".
 *
 * @property int $id
 * @property int $lang_id
 * @property string $first_title_home
 * @property string $sec_title_home
 * @property string $first_title_about
 * @property string $sec_title_about
 * @property string $one_about
 * @property string $one_title_about
 * @property string $two_about
 * @property string $two_title_about
 * @property string $three_about
 * @property string $three_title_about
 * @property string $four_about
 * @property string $four_title_about
 * @property string $five_about
 * @property string $five_title_about
 * @property string $six_about
 * @property string $six_title_about
 * @property string $first_title_feature
 * @property string $sec_title_feature
 * @property string $three_title_feature
 * @property string $rec_feature
 * @property string $satif_feature
 * @property string $follow_feature
 * @property string $first_title_creative
 * @property string $sec_titlee_creative
 * @property string $three_title_creative
 * @property string $first_title_design
 * @property string $sec_title_design
 * @property string $up_design
 * @property string $sat_design
 * @property string $rec_design
 * @property string $galery_first
 * @property string $galery_sec
 * @property string $first_title_easy
 * @property string $sec_title_easy
 * @property string $three_title_easy
 */
class FrontendLangs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'frontend_langs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang_id', 'first_title_home', 'sec_title_home', 'first_title_about', 'sec_title_about', 'one_about', 'one_title_about', 'two_about', 'two_title_about', 'three_about', 'three_title_about', 'four_about', 'four_title_about', 'five_about', 'five_title_about', 'six_about', 'six_title_about', 'first_title_feature', 'sec_title_feature', 'three_title_feature', 'rec_feature', 'satif_feature', 'follow_feature', 'first_title_creative', 'sec_titlee_creative', 'three_title_creative', 'first_title_design', 'sec_title_design', 'up_design', 'sat_design', 'rec_design', 'galery_first', 'galery_sec', 'first_title_easy', 'sec_title_easy', 'three_title_easy'], 'required'],
            [['lang_id'], 'integer'],
            [['sec_title_easy', 'three_title_easy'], 'string'],
            [['first_title_home', 'sec_title_home', 'first_title_about', 'sec_title_about', 'one_about', 'one_title_about', 'two_about', 'two_title_about', 'three_about', 'three_title_about', 'four_about', 'four_title_about', 'five_about', 'five_title_about', 'six_about', 'six_title_about', 'first_title_feature', 'sec_title_feature', 'three_title_feature', 'rec_feature', 'satif_feature', 'follow_feature', 'first_title_creative', 'sec_titlee_creative', 'three_title_creative', 'first_title_design', 'sec_title_design', 'up_design', 'sat_design', 'rec_design', 'galery_first', 'galery_sec', 'first_title_easy'], 'string', 'max' => 255],
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
            'first_title_home' => 'First Title Home',
            'sec_title_home' => 'Sec Title Home',
            'first_title_about' => 'First Title About',
            'sec_title_about' => 'Sec Title About',
            'one_about' => 'One About',
            'one_title_about' => 'One Title About',
            'two_about' => 'Two About',
            'two_title_about' => 'Two Title About',
            'three_about' => 'Three About',
            'three_title_about' => 'Three Title About',
            'four_about' => 'Four About',
            'four_title_about' => 'Four Title About',
            'five_about' => 'Five About',
            'five_title_about' => 'Five Title About',
            'six_about' => 'Six About',
            'six_title_about' => 'Six Title About',
            'first_title_feature' => 'First Title Feature',
            'sec_title_feature' => 'Sec Title Feature',
            'three_title_feature' => 'Three Title Feature',
            'rec_feature' => 'Rec Feature',
            'satif_feature' => 'Satif Feature',
            'follow_feature' => 'Follow Feature',
            'first_title_creative' => 'First Title Creative',
            'sec_titlee_creative' => 'Sec Titlee Creative',
            'three_title_creative' => 'Three Title Creative',
            'first_title_design' => 'First Title Design',
            'sec_title_design' => 'Sec Title Design',
            'up_design' => 'Up Design',
            'sat_design' => 'Sat Design',
            'rec_design' => 'Rec Design',
            'galery_first' => 'Galery First',
            'galery_sec' => 'Galery Sec',
            'first_title_easy' => 'First Title Easy',
            'sec_title_easy' => 'Sec Title Easy',
            'three_title_easy' => 'Three Title Easy',
        ];
    }
}
