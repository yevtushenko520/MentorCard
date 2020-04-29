<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();



if (isset($_POST['code'])) {

    // receiving the post params
    $user_name = $_POST['code'];
    

    $user_profile = $db->getUserCode($user_name);

    if ($user_profile != false) {
        // use is foun
        
        $response["user"]["username"] = $user_profile["username"];
        $response["user"]["first_name"] = $user_profile["first_name"];
        $response["user"]["last_name"] = $user_profile["last_name"];
        $response["user"]["day_birth"] = $user_profile["day_birth"];
        $response["user"]["place_birth"] = $user_profile["place_birth"];
        $response["user"]["country"] = $user_profile["country"];
        $response["user"]["phone_number"] = $user_profile["phone_number"];
        $response["user"]["email"] = $user_profile["email"];
        $response["user"]["activation_code"] = $user_profile["activation_code"];
        $response["user"]["res_id"] = $user_profile["res_id"];

            
       
        
        echo json_encode($response);
    } else {
        // user is not found with the credentials
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

