<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


require_once 'DB_Functions.php';
$db = new DB_Functions();



if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['first_name'])
&& isset($_POST['last_name'])&& isset($_POST['date'])
&& isset($_POST['place'])&& isset($_POST['country'])&& isset($_POST['phone'])
&& isset($_POST['email'])&& isset($_POST['active_code'])) {

    // receiving the post params
    $user_name = $_POST['username'];

    $user_pass = $_POST['password'];

    $user_fn = $_POST['first_name'];

    $user_ln = $_POST['last_name'];

    $user_date = $_POST['date'];

    $user_place = $_POST['place'];

    $user_country = $_POST['country'];

    $user_phone = $_POST['phone'];

    $user_email = $_POST['email'];

    $user_active_code = $_POST['active_code'];
    

    $user_check = $db->getUserCheck($user_name);

  

    if ($user_check != false) {
        // use is foun
        

            
            
       // user is not found with the credentials
       $response["error"] = TRUE;
       $response["error_msg"] = "User credentials are wrong. Please try again!";
       echo json_encode($response);
       
    } else {

        if($user_active_code!=null){

            $user_active = $db->getActiveCheck($user_active_code);

            if($user_active!= false){

                $res_id = $user_active['user_id'];

                $user_profile = $db->getUserActiveCreate($user_name,$user_pass,$user_fn,$user_ln,$user_date,$user_place,$user_country,
                $user_phone,$user_email,$user_active_code,$res_id);

                if( $user_profile!=null){

                    $response["status"] = "200 OK";
                    echo json_encode($response);

                }else{
                    $response["error"] = TRUE;
                    $response["error_msg"] = "User is missing!";
                    echo json_encode($response);
                }

            }else{

                $response["error"] = TRUE;
       $response["error_msg"] = "Active2 code credentials are wrong. Please try again!";
       echo json_encode($response);

            }

        }else{
            $response["error"] = TRUE;
            $response["error_msg"] = "Active code credentials are wrong. Please try again!";
            echo json_encode($response);
        }
       

       
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter is missing!";
    echo json_encode($response);
}
?>

