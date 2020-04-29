<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();





  


    $user_profile = $db->getCande();

    if ($user_profile != false) {
        // use is foun
            
while($row = mysqli_fetch_array($questions)){


    $a[] = array('quest_id' => $row[1],'cande' => $row[2],'cat' => $row[3],'category' => $row[4]);
    }
    
    echo json_encode(array("questions"=>$a));
       
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "User credentials are wrong. Please try again!";
        echo json_encode($response);
    }

?>

