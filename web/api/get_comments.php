<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();


$langs = $db->getComments();



while($row = mysqli_fetch_array($langs)){


$a[] = array('lang_id' => $row[1],'img'=>$row[2],'name'=>$row[3],'position'=>$row[4],'comments'=>$row[5]);
}

echo json_encode(array("comments"=>$a));

?>