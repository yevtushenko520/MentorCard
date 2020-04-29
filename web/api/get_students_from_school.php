<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once 'DB_Functions.php';
$db = new DB_Functions();


if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

$students = $db->getStudentsFrom($user_id);

if($students!=false){

while($row = mysqli_fetch_array($students)){


$a[] = array('id' => $row[0],'username'=>$row[1],'first_name'=>$row[2],'last_name'=>$row[3],
'day_birth'=>$row[5],'place_birth'=>$row[6],'country'=>$row[7],'phone_number'=>$row[8],'email'=>$row[9],
'activation_code'=>$row[10],'res_id'=>$row[13]);
}

echo json_encode($a);

}else{
    $response["error"] = TRUE;
    $response["error_msg"] = "Id credentials are wrong. Please try again!";
    echo json_encode($response);
}

}else{
      // required post params is missing
      $response["error"] = TRUE;
      $response["error_msg"] = "Required parameter is missing!";
      echo json_encode($response);
}

?>