<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();


$langs = $db->getSchoolsName();



while($row = mysqli_fetch_array($langs)){


$a[] = array('name'=>$row[1]);
}

echo json_encode(array("schools"=>$a));

?>