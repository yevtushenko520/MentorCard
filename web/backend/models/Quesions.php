<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quesions".
 *
 * @property int $id
 * @property string $amtl_frage_nr
 * @property int $fehlerpunkte
 * @property string $categorie
 * @property string $image
 * @property string $question
 * @property string $answer_yes
 * @property string $answer_no1
 * @property string $answer_no2 
 * 
 * @property string $points
 */
class Quesions extends \yii\db\ActiveRecord
{
    public $file;
    public $tags_array;
    public $choose_test;
    public $tag_id_last;
   // public $xic = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quesions';
    }

    /**
     * 
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fehlerpunkte', 'amtl_frage_nr','points'], 'required'],
            [['fehlerpunkte'], 'integer'],
            [['points'], 'integer'],
            [['amtl_frage_nr'], 'string', 'max' => 255],
            [['image'],'string', 'max' => 255],
            [['choose_test'],'safe'],
            
            [['tags_array'],'safe'],
            
           
        
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {

        if(Yii::$app->user->identity->role ==4){

            $posts228 = Yii::$app->db->createCommand('SELECT id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
          
           }else  if(Yii::$app->user->identity->role ==3){
          
            $posts228 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
          
           }else  if(Yii::$app->user->identity->role ==2){
          
            $posts228 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
             
           }else{
    
            $posts228 = Yii::$app->db->createCommand('SELECT * FROM user  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
    
           }
    
    
           $posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts228[0]['id'])->queryAll();



                                 
$set = $_COOKIE["govno"];

if($set!=null){

  //  язык

  $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$set)->queryAll();
    
  $posts1003 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$set)->queryAll();
}else{
    
    header("Location: http://www.mentorcard.de/backend/web%20/index.php?r=site%2Fchoose_lang");
die();
   

}


        return [
            'id' => 'ID',
            'amtl_frage_nr' => $posts1003[0]['amtl_frage_nr'],
            'fehlerpunkte' => $posts1002[0]['points'],
            'tags_array' => $posts1002[0]['category'],
            'tagsAsString'=> $posts1002[0]['category'],
            'testsAsString'=> $posts1003[0]['type'],
            'image' => $posts1003[0]['image'],
            'langsQ' => $posts1003[0]['langsQ'],
            'file' =>$posts1003[0]['image'],
            'choose_test' =>$posts1003[0]['type'],
            'points' => $posts1002[0]['points'],
            
        ];
    }

    public function getQeustTags(){
        return $this -> hasMany(QeustTags::className(),['qeust_id'=>'id']);
    }

    public function getQuestSoc(){
        return $this -> hasMany(QuestSoc::className(),['quest_id'=>'id']);
    }

    public function getLangsQuestion(){
        return $this -> hasMany(LangsQuestion::className(),['question_id'=>'id']);
    }

    public function getLangsQ(){
        $arr5 = \yii\helpers\ArrayHelper::map($this->langsQuestion,'id','languege');
        return implode(',',$arr5); 
    }
   
    
    public function getTests(){
        return $this -> hasMany(Tests::className(),['id'=>'soc_id'])->via('questSoc');
    }


    public function getTags(){
        return $this -> hasMany(Tags::className(),['id'=>'tags_id'])->via('qeustTags');
    }


    public function getTagsAsString()
    {
        $arr = \yii\helpers\ArrayHelper::map($this->tags,'id','name');
        return implode(',',$arr);

    }

    public function getTestsAsString()
    {
        $arr = \yii\helpers\ArrayHelper::map($this->tests,'id','name');
        return implode(',',$arr);

    }



    public function afterFind()
    {
      $this->tags_array = $this->tags;
      $this->choose_test =$this->tests;

    }

   

    public function afterSave($insret, $changedAttributes)
    {
       
        parent::afterSave($insret, $changedAttributes);

       // foreach()
        
     //  $posts455 = Yii::$app->db->createCommand('INSERT INTO fast_test (test_fp,test_tw) VALUES ("'.$this->choose_test.'","Type of Question")')->execute();

     //  $posts456 = Yii::$app->db->createCommand('INSERT INTO fast_test (test_fp,test_tw) VALUES ("'.$this->tags_array.'","Tags")')->execute();  //array

     //  $posts457 = Yii::$app->db->createCommand('INSERT INTO fast_test (test_fp,test_tw) VALUES ("'.$this->image.'","Image")')->execute();  //array

      $arr = \yii\helpers\ArrayHelper::map($this->tags,'id','id');
      foreach($this->tags_array as $one){
          if(!in_array($one,$arr)){
              $model = new QeustTags();
              $model->qeust_id = $this->id;
              $model->tags_id = $one;

              $tag_id_last = $one;
              $model->save();
          }

          if(isset($arr[$one])){
              unset($arr[$one]);
          }

          
      }

      QeustTags::deleteAll(['tags_id'=>$arr]);


      $posts40 = Yii::$app->db->createCommand('SELECT * FROM quest_soc WHERE quest_id='.$this->id)->queryAll();

      if($posts40!=null){

        $posts1262 = Yii::$app->db->createCommand('UPDATE quest_soc SET soc_id='.$this->choose_test.' WHERE quest_id='. $this->id)->execute();

      }else{
      
        $posts455 = Yii::$app->db->createCommand('INSERT INTO quest_soc (quest_id,soc_id) VALUES ('.$this->id.','.$this->choose_test.')')->execute();

      }



      

      if($tag_id_last == 8){

        $posts3 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="Basic material"')->queryAll();

        if($posts3[0]['COUNT(*)']<20){

        $model = new CandeQuestion();
        $model->question_id = $this->id;
        $model->cande = 'practice';
        $model->cat = "Basic material";
        $model->save();

        }else{

            $model = new CandeQuestion();
            $model->question_id = $this->id;
            $model->cande = 'mock_test';
            $model->cat = "Basic material";
            $model->save();

        }

        

        $posts02 = Yii::$app->db->createCommand('SELECT name FROM tags_tt')->queryAll();

        foreach($posts02 as $kola):

            $posts01 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question WHERE cande="practice" AND cat="Basic Material" AND category="'.$kola['name'].'"')->queryAll();
            $posts013 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question WHERE cande="mock_test" AND cat="Basic Material"')->queryAll();

            if($posts01[0]['COUNT(*)']<20 && $posts013[0]['COUNT(*)']>10){

                $posts1262 = Yii::$app->db->createCommand('UPDATE cande_question SET cande="practice",cat="Basic Material",category="'.$kola['name'].'" WHERE 	question_id='. $this->id)->execute();

            }else{


            }

        endforeach;


      }else if($tag_id_last == 1){

        $posts4 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="AM"')->queryAll();

        if($posts4[0]['COUNT(*)']<10){

           

            $model = new CandeQuestion();
            $model->question_id = $this->id;

            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "AM";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "AM";
                $model->save();
    
            }

           
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "AM";
                $model->save();
    
            }

      }else if($tag_id_last == 2){

        $posts5 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="B"')->queryAll();

        if($posts5[0]['COUNT(*)']<10){

            $model = new CandeQuestion();
            $model->question_id = $this->id;

            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "B";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "B";
                $model->save();
    
            }
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "B";
                $model->save();
    
            }

      }else if($tag_id_last == 3){

        $posts6 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="C"')->queryAll();

        if($posts6[0]['COUNT(*)']<10){

            $model = new CandeQuestion();
            $model->question_id = $this->id;

            
            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "C";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "C";
                $model->save();
    
            }
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "C";
                $model->save();
    
            }

      }
      else if($tag_id_last == 4){

        $posts7 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="CE"')->queryAll();

        if($posts7[0]['COUNT(*)']<10){

            $model = new CandeQuestion();
            $model->question_id = $this->id;

            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "CE";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "CE";
                $model->save();
    
            }
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "CE";
                $model->save();
    
            }

      }
      else if($tag_id_last == 5){

        $posts8 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="D"')->queryAll();

        if($posts8[0]['COUNT(*)']<10){

            $model = new CandeQuestion();
            $model->question_id = $this->id;
        

            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "D";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "D";
                $model->save();
    
            }
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "D";
                $model->save();
    
            }

      }
      else if($tag_id_last == 6){

        $posts9 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="DE"')->queryAll();

        if($posts9[0]['COUNT(*)']<10){

            $model = new CandeQuestion();
            $model->question_id = $this->id;

            
            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "DE";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "DE";
                $model->save();
    
            }
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "DE";
                $model->save();
    
            }

      }
      else if($tag_id_last == 9){

        $posts10 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="G"')->queryAll();

        if($posts10[0]['COUNT(*)']<10){

            $model = new CandeQuestion();
            $model->question_id = $this->id;

            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "G";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "G";
                $model->save();
    
            }
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "G";
                $model->save();
    
            }

      }else if($tag_id_last == 10){

        $posts11 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="Mofa"')->queryAll();

        if($posts11[0]['COUNT(*)']<10){

            $model = new CandeQuestion();
            $model->question_id = $this->id;

            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "Mofa";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "Mofa";
                $model->save();
    
            }
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "Mofa";
                $model->save();
    
            }

      }
      else if($tag_id_last == 12){

        $posts12 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="A"')->queryAll();

        if($posts12[0]['COUNT(*)']<10){

            $model = new CandeQuestion();
            $model->question_id = $this->id;

            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "A";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "A";
                $model->save();
    
            }
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "A";
                $model->save();
    
            }

      }else if($tag_id_last == 14){

        $posts12 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="A2"')->queryAll();

        if($posts12[0]['COUNT(*)']<10){

            $model = new CandeQuestion();
            $model->question_id = $this->id;

            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "A2";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "A2";
                $model->save();
    
            }
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "A2";
                $model->save();
    
            }

      }else if($tag_id_last == 16){

        $posts13 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="A1"')->queryAll();

        if($posts13[0]['COUNT(*)']<10){

            $model = new CandeQuestion();
            $model->question_id = $this->id;

            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "A1";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "A1";
                $model->save();
    
            }
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "A1";
                $model->save();
    
            }

      }
      else if($tag_id_last == 17){

        $posts14 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="T"')->queryAll();

        if($posts14[0]['COUNT(*)']<10){

            $model = new CandeQuestion();
            $model->question_id = $this->id;

            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "T";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "T";
                $model->save();
    
            }
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "T";
                $model->save();
    
            }

      }else if($tag_id_last == 18){

        $posts15 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="L"')->queryAll();

        if($posts15[0]['COUNT(*)']<10){

            $model = new CandeQuestion();
            $model->question_id = $this->id;

            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "L";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "L";
                $model->save();
    
            }
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "L";
                $model->save();
    
            }

      }else if($tag_id_last == 19){

        $posts17 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="C1"')->queryAll();

        if($posts17[0]['COUNT(*)']<10){

            $model = new CandeQuestion();
            $model->question_id = $this->id;

            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "C1";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "C1";
                $model->save();
    
            }
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "C1";
                $model->save();
    
            }

      }
      else if($tag_id_last == 20){

        $posts17 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="D1"')->queryAll();

        if($posts17[0]['COUNT(*)']<10){

            $model = new CandeQuestion();
            $model->question_id = $this->id;

            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "D1";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "D1";
                $model->save();
    
            }
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "D1";
                $model->save();
    
            }

      }
      else if($tag_id_last == 21){

        $posts17 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="C1E"')->queryAll();

        if($posts17[0]['COUNT(*)']<10){

            $model = new CandeQuestion();
            $model->question_id = $this->id;

            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "C1E";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "C1E";
                $model->save();
    
            }
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "C1E";
                $model->save();
    
            }

      }
      else if($tag_id_last == 22){

        $posts17 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice" AND cat="D1E"')->queryAll();

        if($posts17[0]['COUNT(*)']<10){

            $model = new CandeQuestion();
            $model->question_id = $this->id;

            $rand_count = rand(1, 2);

            if($rand_count==1){
                $model->cande = 'practice';
                $model->cat = "D1E";
                $model->save();
    
            }else{
                $model->cande = 'mock_test';
                $model->cat = "D1E";
                $model->save();
    
            }
    
            }else{
    
                $model = new CandeQuestion();
                $model->question_id = $this->id;
                $model->cande = 'mock_test';
                $model->cat = "D1E";
                $model->save();
    
            }

      }

             

       

    }

    public function getLangsQuestions()
    {
        return $this->hasMany(LangsQuestion::className(), ['question_id' => 'id']);
    }

    
    
}
