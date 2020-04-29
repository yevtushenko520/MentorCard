<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();

if (isset($_POST['id'])) {


    $user_id = $_POST['id'];


    $user_profile = $db->getDeleteCom($user_id);

    if ($user_profile != false) {
        // use is foun
            $response["user"]["status"] = 'OK';
            echo json_encode($response);

        
       
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Code credentials are wrong. Please try again!";
        echo json_encode($response);
    }

}else{
    $response["error"] = TRUE;
    $response["error_msg"] = "Code credentials are wrong. Please try again!";
    echo json_encode($response);
}

?>

