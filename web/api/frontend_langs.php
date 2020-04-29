<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */
header('Content-type: text/html; charset=utf-8');

require_once 'DB_Functions.php';
$db = new DB_Functions();



if (isset($_GET['lang_id'])) {

    // receiving the post params
    $lang_id = $_GET['lang_id'];    

    $user_profile = $db->getFrontLang($lang_id);

    if ($user_profile != false) {
        // use is foun
        
            $response["lang"][1] =  $user_profile['first_title_home'];
           $response["lang"][2] =  $user_profile['sec_title_home'];
            $response["lang"][3] =  $user_profile['first_title_about'];
            $response["lang"][4] =  $user_profile['sec_title_about'];
            $response["lang"][5] =  $user_profile['one_about'];
            $response["lang"][6] =  $user_profile['one_title_about'];
            $response["lang"][7] =  $user_profile['two_about'];
            $response["lang"][8] =  $user_profile['two_title_about'];
            $response["lang"][9] =  $user_profile['three_about'];
            $response["lang"][10]=  $user_profile['three_title_about'];
            $response["lang"][11] =  $user_profile['four_about'];
            $response["lang"][12] =  $user_profile['four_title_about'];
            $response["lang"][13] =  $user_profile['five_about'];
            $response["lang"][14] =  $user_profile['five_title_about'];
            $response["lang"][15] =  $user_profile['six_about'];
            $response["lang"][16] =  $user_profile['six_title_about'];
            $response["lang"][17] =  $user_profile['first_title_feature'];
            $response["lang"][18] =  $user_profile['sec_title_feature'];
            $response["lang"][19] =  $user_profile['three_title_feature'];
            $response["lang"][20] =  $user_profile['rec_feature'];
            $response["lang"][21] =  $user_profile['satif_feature'];
            $response["lang"][22] =  $user_profile['follow_feature'];
            $response["lang"][23] =  $user_profile['first_title_creative'];
            $response["lang"][24] =  $user_profile['sec_titlee_creative'];
            $response["lang"][25] =  $user_profile['three_title_creative'];
            $response["lang"][26] =  $user_profile['first_title_design'];
            $response["lang"][27] =  $user_profile['sec_title_design'];
            $response["lang"][28] =  $user_profile['up_design'];
            $response["lang"][29] =  $user_profile['sat_design'];
            $response["lang"][30] =  $user_profile['rec_design'];
            $response["lang"][31] =  $user_profile['galery_first'];
            $response["lang"][32] =  $user_profile['galery_sec'];
            $response["lang"][33] =  $user_profile['first_title_easy'];
            $response["lang"][34] =  $user_profile['sec_title_easy'];
            $response["lang"][35] =  $user_profile['three_title_easy'];

            foreach($response as $kola):

                echo "{'types':[";
                for($i = 1;$i<=35;$i++){

                    echo  "{".$i.":'".$kola[$i]."'},";

                }

                echo "]}";

               

            endforeach;

      
       
    } else {


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




