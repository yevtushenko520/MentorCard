<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();

//
//if (isset($_POST['lang_id']) && isset($_POST['image']) && isset($_POST['position']) 
//&& isset($_POST['coment']) && isset($_POST['name'])) {

if (isset($_POST['lang_id']) && isset($_POST['image']) && isset($_POST['position']) 
&& isset($_POST['coment']) && isset($_POST['name'])) {

    // receiving the post params
    $lang_id = $_POST['lang_id'];

    $image = $_POST['image'];

    $position = $_POST['position'];
    
    $coment = $_POST['coment'];

    $name = $_POST['name'];

    $user_profile = $db->getCreateComment($lang_id,$image,$position,$coment,$name);

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

