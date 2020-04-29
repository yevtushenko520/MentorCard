<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */
header('Content-type: text/html; charset=utf-8');

require_once 'DB_Functions.php';
$db = new DB_Functions();


if (isset($_POST['id']) && isset($_POST['lang'])) {

    // receiving the post params
    $user_id = $_POST['id'];

    $user_lang = $_POST['lang'];

$questions = $db->getLangsQuestion($user_id,$user_lang);

if ($questions != false) {
    // use is foun
    

        $response["questions"]["question_id"] = $questions["question_id"];
        $response["questions"]["languege"] = $questions["languege"];
        $response["questions"]["question"] = $questions["question"];
        $response["questions"]["answer_1"] = $questions["answer_yes"];
        $response["questions"]["answer_2"] = $questions["answer_no1"];
        $response["questions"]["answer_3"] = $questions["answer_no2"];
        $response["questions"]["one"] = $questions["one"];
        $response["questions"]["two"] = $questions["two"];
        $response["questions"]["three"] = $questions["three"];
        echo json_encode($response);
    
   
} else {
    // user is not found with the credentials
    $response["error"] = TRUE;
    $response["error_msg"] = "User credentials are wrong. Please try again!";
    echo json_encode($response);
}
}else{
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter is missing!";
    echo json_encode($response);
}

?>