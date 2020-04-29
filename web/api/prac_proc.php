<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();


if (isset($_GET['user_id'])) {

    $user_id = $_GET['user_id'];

$langs = $db->getProcPrac($user_id);

if($langs!=false){

$response["user"]["proc"] = $langs["proc"];
$response["user"]["status"] = 'OK';
echo json_encode($response);

}else{
    $response["error"] = TRUE;
    $response["error_msg"] = "Id credentials are wrong. Please try again!";
    echo json_encode($response);
}

} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter is missing!";
    echo json_encode($response);
}

?>