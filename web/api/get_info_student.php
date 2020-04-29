<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once 'DB_Functions.php';
$db = new DB_Functions();



if (isset($_POST['id'])) {

    // receiving the post params
    $user_name = $_POST['id'];
    

    $user_profile = $db->getUserIdStudent($user_name);

    if ($user_profile != false) {
        // use is foun
        
        $response["username"] = $user_profile["username"];
        $response["first_name"] = $user_profile["first_name"];
        $response["last_name"] = $user_profile["last_name"];
        $response["day_birth"] = $user_profile["day_birth"];
        $response["place_birth"] = $user_profile["place_birth"];
        $response["country"] = $user_profile["country"];
        $response["phone_number"] = $user_profile["phone_number"];
        $response["email"] = $user_profile["email"];
        $response["activation_code"] = $user_profile["activation_code"];
        $response["res_id"] = $user_profile["res_id"];

       
        
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

