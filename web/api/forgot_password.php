<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();



if (isset($_POST['email'])) {

    // receiving the post params
    $user_email = $_POST['email'];
    

    $user_profile = $db->getUserForgot($user_email);

   // if ($user_profile != false) {
        // use is foun
        

            $response["user"]["email"] = $user_email;
            $response["user"]["status"] = 'OK';
            echo json_encode($response);
            
      
       
   /* } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Email credentials are wrong. Please try again!";
        echo json_encode($response);
    }*/
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter is missing!";
    echo json_encode($response);
}
?>

