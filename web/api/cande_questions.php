<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */
header('Content-type: text/html; charset=utf-8');

require_once 'DB_Functions.php';
$db = new DB_Functions();


$questions = $db->getViewQuestion();



while($row = mysqli_fetch_array($questions)){


$a[] = array('id' => $row[0],'quest_id'=>$row[1],'cande'=>$row[2],
'cat'=>$row[3],'category'=>$row[4]);
}

echo json_encode(array("questions"=>$a));

?>