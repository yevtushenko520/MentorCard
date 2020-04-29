<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

use Yii;


?>

<?php 

if(Yii::$app->request->isAjax){

    $user_ip = $_POST['user_ip'];
    $lang_id = $_POST['lang_id'];

    $posts121 = Yii::$app->db->createCommand('INSERT INTO user_ip_front (ip_ad,id_lang) VALUES ("'.$user_ip.'", '.$lang_id.')')->execute();

    $rigth_answer = 'yes';
    return   $rigth_answer;

}

?>
