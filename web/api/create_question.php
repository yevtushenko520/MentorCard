<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();



if (isset($_POST['amtl_frage_nr']) && isset($_POST['fehlerpunkte'])
&& isset($_POST['image'])&& isset($_POST['points'])&& isset($_POST['cat'])
&& isset($_POST['soc_id'])) {

    // receiving the post params
    $amtl_frage_nr = $_POST['amtl_frage_nr'];

    $fehlerpunkte = $_POST['fehlerpunkte'];

    $image = $_POST['image'];

    $points = $_POST['points'];

    $cat = $_POST['cat'];

    $soc_id = $_POST['soc_id'];

    

    $user_profile = $db->getCreateQuestions($amtl_frage_nr,$fehlerpunkte,$image,$points,$cat,$soc_id);

    if ($user_profile != false) {
        // use is foun
            $response["user"]["status"] = $user_profile;
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

