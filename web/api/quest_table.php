<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();



if (isset($_POST['user_id']) && isset($_POST['cat']) && isset($_POST['id_soc'])) {

    // receiving the post params
    $user_id = $_POST['user_id'];

    $user_cat = $_POST['cat'];
    
    $c_id =  $_POST['id_soc'];

   
        // use is foun


        $user_profile2 = $db->getChapterQuest($user_id,$user_cat,$c_id);


        if ($user_profile2 != false) {


        while($row = mysqli_fetch_array($user_profile2)){


            $a[] = array('id'=>$row[2]);
            }
            
            echo json_encode(array("ids"=>$a));
          
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Count credentials are wrong. Please try again!";
        echo json_encode($response);
    }

      
       
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter is missing!";
    echo json_encode($response);
}
?>

