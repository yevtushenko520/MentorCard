<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once 'DB_Functions.php';
$db = new DB_Functions();



if (isset($_POST['username']) && isset($_POST['password'])) {

    // receiving the post params
    $user_name = $_POST['username'];

    $user_pass = $_POST['password'];
    

    $user_profile = $db->getUserPass($user_name);


    if ($user_profile != false) {
        // use is foun

        if(password_verify($user_pass,$user_profile["password_hash"])){


            $response["user"]["status"] = $user_profile['role'];

            if($user_profile['role']==4){

                $get_student_info = $db->getUserStud($user_name);

                $response["user"]["user_id"] = $get_student_info['id'];

                echo json_encode($response);

            }else if($user_profile['role']==3){

                $get_student_info = $db->getUserRes($user_name);

                $response["user"]["user_id"] = $get_student_info['id'];

                echo json_encode($response);

            }else{

                $response["user"]["status"] = 'NO';
                echo json_encode($response);
                
            }
            

         
            
        }else{

            $response["user"]["status"] = 'NO';
            echo json_encode($response);

        }
       
    } else {
        // user is not found with the credentials
        $response["user"]["status"] = 'NO';
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["user"]["status"] = 'NO';
    echo json_encode($response);
}
?>

