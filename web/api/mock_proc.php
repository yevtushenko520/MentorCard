<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'DB_Functions.php';
$db = new DB_Functions();


if (isset($_GET['user_id'])) {

    $user_id = $_GET['user_id'];

$langs = $db->getProcMock($user_id);

if($langs!=false){

    $id_tag = $langs["tag_id"];

    $proc = $db->getProcMockTag($id_tag);


    if($proc!=false){

    $all_count = 0;

        $proc_cat = $db->getProcMockCatBasic();

        if($proc_cat!=false){

            $all_count = $proc_cat["COUNT(*)"];


            $proc_cat2 = $db->getProcMockCatOther($proc['name']);

            if($proc_cat2!=false){

                $all_count = $all_count +$proc_cat2["COUNT(*)"];


                $count_true = $db->getCountTrue($user_id);

                if( $count_true!=false){

                   $q_t = $all_count*$count_true["COUNT(*)"]/100;

                   $get_false = $db->getFalse($user_id);

                   if($get_false !=false){


                    $date_stat = $db->getDate($user_id);

                    if($date_stat!=false){

                    $response["user"]["count_true"] =  $count_true["COUNT(*)"];
                    $response["user"]["count_all"] =   $all_count;
                    $response["user"]["date"] =   $date_stat['date'];
                    $response["user"]["date_proc"] =   $date_stat['proc'];
                    $response["user"]["false_answers"] =   $get_false["COUNT(*)"];
                    $response["user"]["question_table_procent"] =   round($q_t,2);
                    $response["user"]["status"] = 'OK';
                    echo json_encode($response);

                    }else{

                        $response["error"] = TRUE;
                    $response["error_msg"] = "Count date credentials are wrong. Please try again!";
                    echo json_encode($response);

                    }

                   }else{

                    $response["error"] = TRUE;
                    $response["error_msg"] = "Count false credentials are wrong. Please try again!";
                    echo json_encode($response);

                   }

                }else{

                    $response["error"] = TRUE;
                    $response["error_msg"] = "Count true credentials are wrong. Please try again!";
                    echo json_encode($response);

                }

                


            }else{

                $response["error"] = TRUE;
                $response["error_msg"] = "Count other credentials are wrong. Please try again!";
                echo json_encode($response);

            }

            

        }else{

            $response["error"] = TRUE;
            $response["error_msg"] = "Count credentials are wrong. Please try again!";
            echo json_encode($response);

        }

    }else{
        $response["error"] = TRUE;
        $response["error_msg"] = "Tag credentials are wrong. Please try again!";
        echo json_encode($response);

    }

}else{
    $response["error"] = TRUE;
    $response["error_msg"] = "Id credentials are wrong. Please try again!";
    echo json_encode($response);
}

} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter is missing!";
    echo json_encode($response);
}

?>