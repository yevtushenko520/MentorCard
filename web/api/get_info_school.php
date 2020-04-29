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
    

    $user_profile = $db->getUserIdSchool($user_name);

    if ($user_profile != false) {
        // use is foun
        
            $response["school_name"] = $user_profile["school_name"];
            $response["first_name"] = $user_profile["first_name"];
            $response["last_name"] = $user_profile["last_name"];
            $response["day_birth"] = $user_profile["day_birth"];
            $response["city"] = $user_profile["city"];
            $response["telephone_no"] = $user_profile["telephone_no"];
            $response["email"] = $user_profile["email"];
            $response["mobile_number"] = $user_profile["mobile_number"];
            $response["street"] = $user_profile["street"];

            
       
        
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

