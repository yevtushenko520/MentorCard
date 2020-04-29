<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */
header('Content-type: text/html; charset=utf-8');

require_once 'DB_Functions.php';
$db = new DB_Functions();


$students = $db->getStudents();



while($row = mysqli_fetch_array($students)){


$a[] = array('id' => $row[0],'username'=>$row[1],'first_name'=>$row[2],'last_name'=>$row[3],
'day_birth'=>$row[5],'place_birth'=>$row[6],'country'=>$row[7],'phone_number'=>$row[8],'email'=>$row[9],
'activation_code'=>$row[10],'res_id'=>$row[13]);
}

echo json_encode(array("students"=>$a));

?>