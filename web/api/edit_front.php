<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();



if (isset($_POST['code'])&& isset($_POST['dog']) && isset($_POST['lang_id'])) {

    // receiving the post params
    $user_id = $_POST['code'];   
    
    $user_dog = $_POST['dog'];   

    $lang_id = $_POST['lang_id'];

    $user_profile = $db->getUpdateFront($user_id,$user_dog,$lang_id);

    if ($user_profile != false) {
        // use is foun
        
        $response["status"] =  "OK";
            echo json_encode($response);

      
       
    } else {
        // user is not found with the credentials
        $response["false_answer"] = 'false';
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter is missing!";
    echo json_encode($response);
}
?>

