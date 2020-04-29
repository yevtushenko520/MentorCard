<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */
header('Content-type: text/html; charset=utf-8');

require_once 'DB_Functions.php';
$db = new DB_Functions();



$user_id = $_POST['user_id'];

$questions = $db->getLocalMock($user_id);



while($row = mysqli_fetch_array($questions)){


$a[] = array('quest_id' => $row[2]);
}

echo json_encode(array("questions"=>$a));

?>