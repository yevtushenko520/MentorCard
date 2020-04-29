<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();


$user_id = $_POST['user_id'];

$langs = $db-> activeCodeSchool($user_id);



while($row = mysqli_fetch_array($langs)){


$a[] = array('code' => $row[1]);
}

echo json_encode(array("types"=>$a));

?>