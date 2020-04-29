<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();



if (isset($_POST['user_id']) && isset($_POST['lang_id'])) {

    // receiving the post params
    $user_id = $_POST['user_id'];

    $lang_id = $_POST['lang_id'];
    

    $user_profile = $db->getUpdateStudy($user_id,$lang_id);

    if ($user_profile != false) {

        // use is foun
            $response["user"]["status"] = 'OK';
            echo json_encode($response);
      
       
    } else {

        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "User credentials are wrong. Please try again!";
        echo json_encode($response);
    }
} else {

    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter is missing!";
    echo json_encode($response);
}
?>

