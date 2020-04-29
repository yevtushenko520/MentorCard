<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();


$schools = $db->getSchoolsID();



while($row = mysqli_fetch_array($schools)){


$a[] = array('id' => $row[0],'school_name'=>$row[1],'first_name'=>$row[2],'last_name'=>$row[3],
'date_birth'=>$row[5],'telephone_no'=>$row[6],'mobile_number'=>$row[7],'email'=>$row[8],'street'=>$row[9],
'post_code'=>$row[10],'city'=>$row[11]);
}

echo json_encode(array("schools"=>$a));

?>