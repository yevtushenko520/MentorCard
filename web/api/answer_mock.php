<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();



if (isset($_POST['question_id']) && isset($_POST['cache'])
&& isset($_POST['answer_yes'])&& isset($_POST['answer_no1'])
&& isset($_POST['answer_no2'])&& isset($_POST['user_id'])) {

    // receiving the post params
    $question_id = $_POST['question_id'];

    $cache = $_POST['cache'];

    $user_id = $_POST['user_id'];

    $answer_yes = $_POST['answer_yes'];

    $answer_no1 = $_POST['answer_no1'];

    $answer_no2 = $_POST['answer_no2'];



    

    $user_profile = $db->getAnswerMock($question_id,$cache,$user_id,$answer_yes,$answer_no1,$answer_no2);

    if ($user_profile != false) {
        // use is foun
            $response["user"]["status"] = "OK";
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

