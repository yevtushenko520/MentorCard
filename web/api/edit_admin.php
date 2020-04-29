<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();

if (isset($_POST['password']) && isset($_POST['first_name'])
&& isset($_POST['last_name'])&& isset($_POST['date'])
&&  isset($_POST['country'])&& isset($_POST['phone'])
&& isset($_POST['email'])&& isset($_POST['lang_write'])&& isset($_POST['lang_study'])
&& isset($_POST['user_id'])) {


    $user_pass = $_POST['password'];

    $user_fn = $_POST['first_name'];

    $user_ln = $_POST['last_name'];

    $user_date = $_POST['date'];

    $user_country = $_POST['country'];

    $user_phone = $_POST['phone'];

    $user_email = $_POST['email'];

    $user_lang_write = $_POST['lang_write'];

    $user_lang_study = $_POST['lang_study'];

    $user_id = $_POST['user_id'];



    $user_profile = $db->getEditAdmin($user_pass,$user_fn,$user_ln,$user_date, $user_country, $user_phone,$user_email,
    $user_lang_write,$user_lang_study,$user_id);

    if ($user_profile != false) {
        // use is foun
            $response["user"]["status"] = 'OK';
            echo json_encode($response);

        
       
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Code2 credentials are wrong. Please try again!";
        echo json_encode($response);
    }

}else{
    $response["error"] = TRUE;
    $response["error_msg"] = "Code credentials are wrong. Please try again!";
    echo json_encode($response);
}

?>

