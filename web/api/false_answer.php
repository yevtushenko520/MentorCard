<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();



if (isset($_POST['user_id']) && isset($_POST['quest_id'])) {

    // receiving the post params
    $user_id = $_POST['user_id'];

    $quest_id = $_POST['quest_id'];
    

    $user_profile = $db->getFalseAnswer($user_id,$quest_id);

    if ($user_profile != false) {
        // use is foun
        
        $response["false_count"] =  $user_profile['count'];
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

