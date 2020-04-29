<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();


if (isset($_POST['user_id']) && isset($_POST['quest_id'])) {

    $user_id = $_POST['user_id'];
    $quest_id = $_POST['quest_id'];
    
    
$langs = $db->getTrueAnswer($user_id,$quest_id);

if($langs!=false){

    $response["user"]["quest"] = 'true';
$response["user"]["status"] = 'OK';
echo json_encode($response);

}else{
    $response["user"]["quest"] = 'not in this table';
    $response["user"]["status"] = 'OK';
    echo json_encode($response);
}

} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter is missing!";
    echo json_encode($response);
}

?>