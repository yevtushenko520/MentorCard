<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

class DB_Functions {

    private $conn;

    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    
    
  
    
     public function getUserEvent($userId) {
  

$result = mysqli_query($connect, $query);

             return $result;
       
        
    }

    public function getUserRole($user_name){

        

        $stmt = $this->conn->prepare("SELECT * FROM user WHERE username = ?");

        $stmt->bind_param("s", $user_name);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }



    }

    public function getChap($user_name){

        

        $stmt = $this->conn->prepare("SELECT * FROM tests");

        

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }



    }

    public function getUserNameStudent($user_name){

        $stmt = $this->conn->prepare("SELECT * FROM students WHERE username = ?");

        $stmt->bind_param("s", $user_name);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }

    }

    public function getUserNameSchool($user_name){

        $stmt = $this->conn->prepare("SELECT * FROM school WHERE school_name = ?");

        $stmt->bind_param("s", $user_name);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }

    }

    public function getUserNameAdmin($user_name){

        $stmt = $this->conn->prepare("SELECT * FROM admin WHERE username = ?");

        $stmt->bind_param("s", $user_name);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }

    }

    public function getUserNameSuper($user_name){

        $stmt = $this->conn->prepare("SELECT * FROM user WHERE username = ?");

        $stmt->bind_param("s", $user_name);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }

    }

    public function getLangs(){

        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `langs`";
        
        $result = mysqli_query($connect, $query);
        
                     return $result;

    }

    public function getSchools(){

        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `school`";
        
        $result = mysqli_query($connect, $query);
        
                     return $result;

    }
    public function getUserIdSchool($user_name){

        $stmt = $this->conn->prepare("SELECT * FROM `school` WHERE id = ?");

        $stmt->bind_param("s", $user_name);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }

    }

    public function getStudents(){

        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `students`";
        
        $result = mysqli_query($connect, $query);
        
                     return $result;

    }
    
    public function getUserIdStudent($user_name){

        $stmt = $this->conn->prepare("SELECT * FROM `students` WHERE id = ?");

        $stmt->bind_param("s", $user_name);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }

    }

    public function getUserRes($user_name){

        $stmt = $this->conn->prepare("SELECT * FROM `school` WHERE school_name = ?");

        $stmt->bind_param("s", $user_name);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }


    }

    public function getUserStud($user_name){

        $stmt = $this->conn->prepare("SELECT * FROM `students` WHERE username = ?");

        $stmt->bind_param("s", $user_name);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }


    }

    
    public function getUserPass($user_name){

        $stmt = $this->conn->prepare("SELECT * FROM `user` WHERE username = ?");

        $stmt->bind_param("s", $user_name);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }

    }

    public function getUserForgot($user_name){


        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $hostname = "localhost";

            $username = "root";
            
            $password = "";
            
            // your database name
            $databaseName = "yii-mentor";
                    $connect = mysqli_connect($hostname, $username, $password);
                        mysqli_select_db($connect, $databaseName);

                        
            // the mysql query
            $query = "UPDATE `students` SET `password`='$randomString'  WHERE `email` = '$user_name'";
            
            $result = mysqli_query($connect, $query);
        
 
            
           
                 if ($result) {
            
                    return  $randomString;
            
        } else {
            return null;
        }

    }

    
    public function getUserCheck($user_name){

      

        $stmt = $this->conn->prepare("SELECT * FROM `user` WHERE username = ?");

        $stmt->bind_param("s", $user_name);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }

    }
     
    

    public function getActiveCheck($user_active_code){

      

        $stmt = $this->conn->prepare("SELECT * FROM `active_code` WHERE `code` = ? AND `status` = 'OFF'");

        $stmt->bind_param("s", $user_active_code);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            $stmt2 = $this->conn->prepare("SELECT * FROM `active_code_res` WHERE `code` = ?");

            $stmt2->bind_param("s", $user_active_code);

            $stmt2->execute();

            $user2 = $stmt2->get_result()->fetch_assoc();
            $stmt2->close();
            
                return $user2;
            
        } else {
            return null;
        }

    }

    public function getUserCreate($user_name,$user_pass,$user_fn,$user_ln,$user_date,$user_place,$user_country,
    $user_phone,$user_email,$user_active_code){

        $role = 4;

        $status = 10;

        $stmt = $this->conn->prepare("INSERT INTO `user` (`username`, `password_hash`, `email`, `status`, `role`) VALUES( ?, ?, ?, ?,?)");
        $stmt->bind_param("sssss", $user_name, $user_pass, $user_email,$status, $role);
        $result = $stmt->execute();
        $stmt->close();

       

        if($result){

            $cat = "B";

            $res_id = 0;

            $stmt = $this->conn->prepare("INSERT INTO `students`(`username`, `first_name`, `last_name`,
             `password`, `day_birth`, `place_birth`, `country`, `phone_number`, `email`, `activation_code`, `categor`, `res_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssssssss", $user_name,$user_fn,$user_ln,$user_pass,$user_date,$user_place,$user_country,
            $user_phone,$user_email,$user_active_code,$cat,$res_id);
            $result = $stmt->execute();
            $stmt->close();

            if($result){


                $stmt3 = $this->conn->prepare("INSERT INTO `stud_res`(`username`, `first_name`, `last_name`, `password`, `day_birth`, `country`, `place_birth`, 
                `phone_number`, `active_code`, `categor`, `res_id`, `email`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
               $stmt3->bind_param("ssssssssssss", $user_name,$user_fn,$user_ln,$user_pass,$user_date,$user_country,$user_place,
               $user_phone,$user_active_code,$cat,$res_id,$user_email);
               $result3 = $stmt3->execute();
               $stmt3->close();
               
   
               if($result3){
   
                   return $user_name;
   
               }else{
                   return null;
               }

                

            }else{

                return null;

            }

           

        }else{
            return null;
        }
    }
    

    public function getUserActiveCreate($user_name,$user_pass,$user_fn,$user_ln,$user_date,$user_place,$user_country,
    $user_phone,$user_email,$user_active_code,$res_id){

        $role = 4;

        $status = 10;

        $new_pass = password_hash($user_pass, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("INSERT INTO `user` (`username`, `password_hash`, `email`, `status`, `role`) VALUES( ?, ?, ?, ?,?)");
        $stmt->bind_param("sssss", $user_name, $new_pass, $user_email,$status, $role);
        $result = $stmt->execute();
        $stmt->close();

       

        if($result){

            $cat = "B";

          //  $res_id = 0;

            $stmt = $this->conn->prepare("INSERT INTO `students`(`username`, `first_name`, `last_name`,
             `password`, `day_birth`, `place_birth`, `country`, `phone_number`, `email`, `activation_code`, `categor`, `res_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssssssss", $user_name,$user_fn,$user_ln,$user_pass,$user_date,$user_place,$user_country,
            $user_phone,$user_email,$user_active_code,$cat,$res_id);
            $result = $stmt->execute();
            $stmt->close();

            if($result){

                $hostname = "localhost";

            $username = "root";
            
            $password = "";
            
            // your database name
            $databaseName = "yii-mentor";
                    $connect = mysqli_connect($hostname, $username, $password);
                        mysqli_select_db($connect, $databaseName);

                        
            // the mysql query
            $query = "UPDATE `active_code` SET `status`='ON'  WHERE `code` = '$user_active_code'";
            
            $result = mysqli_query($connect, $query);


            $stmt3 = $this->conn->prepare("INSERT INTO `stud_res`(`username`, `first_name`, `last_name`, `password`, `day_birth`, `country`, `place_birth`, 
            `phone_number`, `active_code`, `categor`, `res_id`, `email`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
           $stmt3->bind_param("ssssssssssss", $user_name,$user_fn,$user_ln,$user_pass,$user_date,$user_country,$user_place,
           $user_phone,$user_active_code,$cat,$res_id,$user_email);
           $result3 = $stmt3->execute();
           $stmt3->close();
            

            if($result3){

                return $user_name;

            }else{
                return null;
            }
            }else{

                return null;

            }

           

        }else{
            return null;
        }
    }

    
    public function getQuestions(){

      

        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `quesions` ";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }

    
    public function getViewQuestion(){

      

        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `cande_question` ";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }

    
    public function getLangsQuestion($user_id,$user_lang){

        $stmt = $this->conn->prepare("SELECT * FROM `langs_question` WHERE `question_id` = ? AND languege=?");

        $stmt->bind_param("ss", $user_id,$user_lang);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }
                     

    }

    
    public function getTypes(){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `tags`";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }

    
    public function activeCode(){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `active_code`";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }

    

    public function getUserCode($user_name){

      
        $stmt = $this->conn->prepare("SELECT * FROM `students` WHERE `activation_code` = ?");

        $stmt->bind_param("s", $user_name);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }
            
        
                     

    }

    
    public function getComments(){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `frontend_comment`";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }

    
    public function getSchoolsName(){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `school_name`";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }

    

    public function getStudentsFrom($user_id){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `students` WHERE `res_id` = '$user_id'";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }

    
    public function getDateSynch($user_id){

      
       
        $stmt = $this->conn->prepare("SELECT * FROM `synchronization` WHERE `user_id` =  ?");

        $stmt->bind_param("s", $user_id);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }
          
                     

    }

    
    public function activeCodeSchool($user_id){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `active_code_res` WHERE `user_id` =  '$user_id'";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }

    

    public function getProcPrac($user_id){

      
        $stmt = $this->conn->prepare("SELECT * FROM `proc_prac` WHERE `user_id` =  ?");

        $stmt->bind_param("s", $user_id);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }
                

    }

    public function getProcMock($user_id){

      
        $stmt = $this->conn->prepare("SELECT * FROM `user_tags` WHERE `user_id` =  ?");

        $stmt->bind_param("s", $user_id);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }
                

    }

    
    public function getProcMockTag($user_id){

      
        $stmt = $this->conn->prepare("SELECT * FROM `tags` WHERE `id` =  ?");

        $stmt->bind_param("s", $user_id);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }


        
                

    }

    
    public function getProcMockCatBasic(){


        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM `cande_question` WHERE `cande` = 'mock_test' AND `cat` = 'Basic Material'");

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }


      
       
        
                     

    }

    public function getProcMockCatOther($proc){


        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM `cande_question` WHERE `cande` = 'mock_test' AND `cat` = '$proc'");

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }
            

    }

   
    public function  getCountTrue($user_id){


        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM `true_answer` WHERE `cande_quest` = 'mock_test' AND `user_id` = '$user_id'");

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }
            

    }

    
    
    public function  getFalse($user_id){


        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM `false_answer` WHERE `user_id` = '$user_id' AND `cande_quest` = 'mock_test'");

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }
            

    }

    

    public function getDate($user_id){


        $stmt = $this->conn->prepare("SELECT * FROM `date_answer` WHERE `id_user` = '$user_id'");

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }
            

    }

   

    public function  getChapters($user_id,$user_cat,$c_id){


        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM `count_soc` WHERE `soc_id`='$c_id' AND `cat` = '$user_cat'");

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          //  $row = mysqli_fetch_array($user)
          
                return $user;
            
        } else {
            return null;
        }
            

    }

   

    public function  getChapterQuest($user_id,$user_cat,$c_id){

        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `count_soc` WHERE `soc_id`='$c_id' AND `cat` = '$user_cat'";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        

    }


    
    public function getTrueAnswer($user_id,$quest_id) {

    

        $stmt = $this->conn->prepare("SELECT * FROM `true_answer` WHERE `user_id`=? AND `quest_id` = ?");

        $stmt->bind_param("ss", $user_id,$quest_id);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }


    }

    

    public function getFalseAnswer($user_id,$quest_id) {

    

        $stmt = $this->conn->prepare("SELECT * FROM `false_answer` WHERE `user_id`=? AND `quest_id` = ?");

        $stmt->bind_param("ss", $user_id,$quest_id);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }


    }


    


    public function getFrontLang($quest_id) {

    

        $stmt = $this->conn->prepare("SELECT * FROM `frontend_langs` WHERE `lang_id` = ?");

        $stmt->bind_param("s", $quest_id);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

          
                return $user;
            
        } else {
            return null;
        }


    }


    

                public function getCreateSchool($user_name,$user_pass,$user_email,$user_fn,$user_ln,$user_date,$user_country,$user_phone,$user_mobile_number,
                $user_post_code,$user_city) {

    

                    $role = 4;

                    $status = 10;
            
                    $stmt = $this->conn->prepare("INSERT INTO `user` (`username`, `password_hash`, `email`, `status`, `role`) VALUES( ?, ?, ?, ?,?)");
                    $stmt->bind_param("sssss", $user_name, $user_pass, $user_email,$status, $role);
                    $result = $stmt->execute();
                    $stmt->close();
            
                   
            
                    if($result){

                        $iban = 0;
                        $bic = 0;
                        


                        $stmt = $this->conn->prepare("INSERT INTO `school`(`school_name`, `first_name`, `last_name`, `password`, `date_birth`, `telephone_no`, `mobile_number`, `email`, `street`, `post_code`, `city`, `iban`, `bic`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        $stmt->bind_param("sssssssssssss", $user_name,$user_fn,$user_ln,$user_pass,$user_date,$user_phone
                        ,$user_mobile_number,$user_email,$user_country,$user_post_code,$user_city,$iban,$bic);
                        $result = $stmt->execute();
                        $stmt->close();

                        if($result){




                            $stmt = $this->conn->prepare("INSERT INTO `school_name`(`name`) VALUES (?)");
                            $stmt->bind_param("s", $user_name);
                            $result = $stmt->execute();
                            $stmt->close();

                            if($result){

                         
                                


                                             return $result;

                            }else{

                                return null;
                            }

                        }else{

                            return null;
                        }

                        
                       // return $user_name;

                    }else{

                        return null;
                    }
            
            
                }

                public function getSchoolsID($user_name){

                    $stmt = $this->conn->prepare("SELECT max(id) FROM `school`");
                           
                    $result = $stmt->execute();

                    $user = $stmt->get_result()->fetch_assoc();


                    $stmt->close();
                        
                   $count_new =  $user['max(id)']+1;


                    $hostname = "localhost";

                    $username = "root";
            
                    $password = "";
            
            // your database name
            $databaseName = "yii-mentor";
                    $connect = mysqli_connect($hostname, $username, $password);
                        mysqli_select_db($connect, $databaseName);

                        
            // the mysql query
            $query = "UPDATE `school` SET `id`='$count_new'  WHERE `school_name` = '$user_name'";
            
            $result = mysqli_query($connect, $query);

            
           
                 if ($result) {
            
                    return  $user_name;
            
        } else {
            return null;
        }
            
                }

                


                public function getCreate() {

                    $length = 6;
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) {
                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                        }

                        $status = "OFF";

        $stmt = $this->conn->prepare("INSERT INTO `active_code`(`code`, `status`) VALUES (?,?)");
        $stmt->bind_param("ss", $randomString, $status);
        $result = $stmt->execute();
        $stmt->close();

       

        if($result){

            return $result;

        }else{

            return null;
        }
            
            
                }

               
               

                public function getCreateActive($user_id,$count) {

                    if($count == 10){

                    for($ix=1;$ix<=10;$ix++){

                    $length = 6;
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) {
                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                        }

                        $status = "OFF";

        $stmt = $this->conn->prepare("INSERT INTO `active_code`(`code`, `status`) VALUES (?,?)");
        $stmt->bind_param("ss", $randomString, $status);
        $result = $stmt->execute();
        $stmt->close();

       

        if($result){

            $stmt = $this->conn->prepare("INSERT INTO `active_code_res`(`code`, `user_id`) VALUES (?,?)");
        $stmt->bind_param("ss", $randomString, $user_id);
        $result = $stmt->execute();
        $stmt->close();

           

        }else{

            return null;
        }

    }

    return $user_id;

}else if($count == 20){

    for($ix=1;$ix<=20;$ix++){

        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $status = "OFF";

$stmt = $this->conn->prepare("INSERT INTO `active_code`(`code`, `status`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $status);
$result = $stmt->execute();
$stmt->close();



if($result){

$stmt = $this->conn->prepare("INSERT INTO `active_code_res`(`code`, `user_id`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $user_id);
$result = $stmt->execute();
$stmt->close();



}else{

return null;
}

}

return $user_id;


}
else if($count == 30){

    for($ix=1;$ix<=30;$ix++){

        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $status = "OFF";

$stmt = $this->conn->prepare("INSERT INTO `active_code`(`code`, `status`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $status);
$result = $stmt->execute();
$stmt->close();



if($result){

$stmt = $this->conn->prepare("INSERT INTO `active_code_res`(`code`, `user_id`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $user_id);
$result = $stmt->execute();
$stmt->close();



}else{

return null;
}

}

return $user_id;


}
else if($count == 40){

    for($ix=1;$ix<=40;$ix++){

        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $status = "OFF";

$stmt = $this->conn->prepare("INSERT INTO `active_code`(`code`, `status`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $status);
$result = $stmt->execute();
$stmt->close();



if($result){

$stmt = $this->conn->prepare("INSERT INTO `active_code_res`(`code`, `user_id`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $user_id);
$result = $stmt->execute();
$stmt->close();



}else{

return null;
}

}

return $user_id;


}
else if($count == 50){

    for($ix=1;$ix<=50;$ix++){

        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $status = "OFF";

$stmt = $this->conn->prepare("INSERT INTO `active_code`(`code`, `status`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $status);
$result = $stmt->execute();
$stmt->close();



if($result){

$stmt = $this->conn->prepare("INSERT INTO `active_code_res`(`code`, `user_id`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $user_id);
$result = $stmt->execute();
$stmt->close();



}else{

return null;
}

}

return $user_id;


}
else if($count == 60){

    for($ix=1;$ix<=60;$ix++){

        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $status = "OFF";

$stmt = $this->conn->prepare("INSERT INTO `active_code`(`code`, `status`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $status);
$result = $stmt->execute();
$stmt->close();



if($result){

$stmt = $this->conn->prepare("INSERT INTO `active_code_res`(`code`, `user_id`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $user_id);
$result = $stmt->execute();
$stmt->close();



}else{

return null;
}

}

return $user_id;


}else if($count == 70){

    for($ix=1;$ix<=70;$ix++){

        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $status = "OFF";

$stmt = $this->conn->prepare("INSERT INTO `active_code`(`code`, `status`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $status);
$result = $stmt->execute();
$stmt->close();



if($result){

$stmt = $this->conn->prepare("INSERT INTO `active_code_res`(`code`, `user_id`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $user_id);
$result = $stmt->execute();
$stmt->close();



}else{

return null;
}

}

return $user_id;


}else if($count == 80){

    for($ix=1;$ix<=80;$ix++){

        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $status = "OFF";

$stmt = $this->conn->prepare("INSERT INTO `active_code`(`code`, `status`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $status);
$result = $stmt->execute();
$stmt->close();



if($result){

$stmt = $this->conn->prepare("INSERT INTO `active_code_res`(`code`, `user_id`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $user_id);
$result = $stmt->execute();
$stmt->close();



}else{

return null;
}

}

return $user_id;


}else if($count == 90){

    for($ix=1;$ix<=90;$ix++){

        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $status = "OFF";

$stmt = $this->conn->prepare("INSERT INTO `active_code`(`code`, `status`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $status);
$result = $stmt->execute();
$stmt->close();



if($result){

$stmt = $this->conn->prepare("INSERT INTO `active_code_res`(`code`, `user_id`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $user_id);
$result = $stmt->execute();
$stmt->close();



}else{

return null;
}

}

return $user_id;


}else if($count == 100){

    for($ix=1;$ix<=100;$ix++){

        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $status = "OFF";

$stmt = $this->conn->prepare("INSERT INTO `active_code`(`code`, `status`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $status);
$result = $stmt->execute();
$stmt->close();



if($result){

$stmt = $this->conn->prepare("INSERT INTO `active_code_res`(`code`, `user_id`) VALUES (?,?)");
$stmt->bind_param("ss", $randomString, $user_id);
$result = $stmt->execute();
$stmt->close();



}else{

return null;
}

}

return $user_id;


}
            
            
                }

                

                public function getDeleteCom($user_id){

      
                    $hostname = "localhost";
            
                    $username = "root";
                    
                    $password = "";
                    
                    // your database name
                    $databaseName = "yii-mentor";
                            $connect = mysqli_connect($hostname, $username, $password);
                                mysqli_select_db($connect, $databaseName);
                    
                    // the mysql query
                    $query = "DELETE FROM `frontend_comment` WHERE `id` =  '$user_id'";
                    
                    $result = mysqli_query($connect, $query);
            
                    if($result){
            
                        return $result;
            
                    }else{
            
                        return null;
            
                    }
                    
                                 
            
                }


                
                public function getEditSuper($user_email,$user_lang){

      
                    $hostname = "localhost";
            
                    $username = "root";
                    
                    $password = "";
                    
                    // your database name
                    $databaseName = "yii-mentor";
                            $connect = mysqli_connect($hostname, $username, $password);
                                mysqli_select_db($connect, $databaseName);
                    
                    // the mysql query
                    $query = "UPDATE `user` SET `email`='$user_email' WHERE `id` = 0";
                    
                    $result = mysqli_query($connect, $query);
            
                    if($result){

                        $hostname = "localhost";
            
                        $username = "root";
                        
                        $password = "";
                        
                        // your database name
                        $databaseName = "yii-mentor";
                                $connect = mysqli_connect($hostname, $username, $password);
                                    mysqli_select_db($connect, $databaseName);
                        
                        // the mysql query
                        $query = "UPDATE `stud_langs_write` SET `lang_id`='$user_lang' WHERE `student_id` = 0";
                        
                        $result = mysqli_query($connect, $query);

            
                        return $result;
            
                    }else{
            
                        return null;
            
                    }
                    
                                 
            
                }

                


    public function getEditAdmin($user_pass,$user_fn,$user_ln,$user_date, $user_country, $user_phone,$user_email,
    $user_lang_write,$user_lang_study,$user_id){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "UPDATE `admin` SET `first_name`='$user_fn',`last_name`='$user_ln',`password`='$user_pass',
        `day_birth`='$user_date',`country`='$user_country',`phone_number`='$user_phone',`email`='$user_email' WHERE `username` = 'admin'";
        
        $result = mysqli_query($connect, $query);

        if($result){


            $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "UPDATE `stud_langs_stud` SET `langs_id`='$user_lang_study' WHERE `stud_id` = 1";
        
        $result = mysqli_query($connect, $query);


        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "UPDATE `stud_langs_write` SET `lang_id`='$user_lang_write' WHERE `student_id` = 1";
        
        $result = mysqli_query($connect, $query);

            return $result;

        }else{

            return null;

        }
        
                     

    }


    

    public function getDellAll($user_id){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "DELETE FROM  all_test_points_mock_test WHERE user_id='$user_id'";
        
        $result = mysqli_query($connect, $query);

        if($result){

            $hostname = "localhost";

            $username = "root";
            
            $password = "";
            
            // your database name
            $databaseName = "yii-mentor";
                    $connect = mysqli_connect($hostname, $username, $password);
                        mysqli_select_db($connect, $databaseName);
            
            // the mysql query
            $query = "DELETE FROM  all_test_points_prac WHERE user_id='$user_id'";
            
            $result = mysqli_query($connect, $query);
    
            if($result){
    
               
            $hostname = "localhost";

            $username = "root";
            
            $password = "";
            
            // your database name
            $databaseName = "yii-mentor";
                    $connect = mysqli_connect($hostname, $username, $password);
                        mysqli_select_db($connect, $databaseName);
            
            // the mysql query
            $query = "DELETE FROM  answer_chache_mock WHERE user_id='$user_id'";
            
            $result = mysqli_query($connect, $query);
    
            if($result){
    
                $hostname = "localhost";

                $username = "root";
                
                $password = "";
                
                // your database name
                $databaseName = "yii-mentor";
                        $connect = mysqli_connect($hostname, $username, $password);
                            mysqli_select_db($connect, $databaseName);
                
                // the mysql query
                $query = "DELETE FROM   answer_chache_practice WHERE user_id='$user_id'";
                
                $result = mysqli_query($connect, $query);
        
                if($result){
        
                    $hostname = "localhost";

                    $username = "root";
                    
                    $password = "";
                    
                    // your database name
                    $databaseName = "yii-mentor";
                            $connect = mysqli_connect($hostname, $username, $password);
                                mysqli_select_db($connect, $databaseName);
                    
                    // the mysql query
                    $query = "DELETE FROM   cache_buttons WHERE user_id='$user_id'";
                    
                    $result = mysqli_query($connect, $query);
            
                    if($result){
            
                        $hostname = "localhost";

                        $username = "root";
                        
                        $password = "";
                        
                        // your database name
                        $databaseName = "yii-mentor";
                                $connect = mysqli_connect($hostname, $username, $password);
                                    mysqli_select_db($connect, $databaseName);
                        
                        // the mysql query
                        $query = "DELETE FROM   cache_end_but_mock_test WHERE user_id='$user_id'";
                        
                        $result = mysqli_query($connect, $query);
                
                        if($result){
                
                            $hostname = "localhost";

                            $username = "root";
                            
                            $password = "";
                            
                            // your database name
                            $databaseName = "yii-mentor";
                                    $connect = mysqli_connect($hostname, $username, $password);
                                        mysqli_select_db($connect, $databaseName);
                            
                            // the mysql query
                            $query = "DELETE FROM   cache_end_but_practice WHERE user_id='$user_id'";
                            
                            $result = mysqli_query($connect, $query);
                    
                            if($result){
                    
                                $hostname = "localhost";

                            $username = "root";
                            
                            $password = "";
                            
                            // your database name
                            $databaseName = "yii-mentor";
                                    $connect = mysqli_connect($hostname, $username, $password);
                                        mysqli_select_db($connect, $databaseName);
                            
                            // the mysql query
                            $query = "DELETE FROM   cache_filtr WHERE user_id='$user_id'";
                            
                            $result = mysqli_query($connect, $query);
                    
                            if($result){
                    
                                $hostname = "localhost";

                                $username = "root";
                                
                                $password = "";
                                
                                // your database name
                                $databaseName = "yii-mentor";
                                        $connect = mysqli_connect($hostname, $username, $password);
                                            mysqli_select_db($connect, $databaseName);
                                
                                // the mysql query
                                $query = "DELETE FROM   cache_mock WHERE user_id='$user_id'";
                                
                                $result = mysqli_query($connect, $query);
                        
                                if($result){
                        
                                    $hostname = "localhost";

                                $username = "root";
                                
                                $password = "";
                                
                                // your database name
                                $databaseName = "yii-mentor";
                                        $connect = mysqli_connect($hostname, $username, $password);
                                            mysqli_select_db($connect, $databaseName);
                                
                                // the mysql query
                                $query = "DELETE FROM   cache_question_mock WHERE user_id='$user_id'";
                                
                                $result = mysqli_query($connect, $query);
                        
                                if($result){
                        
                                    $hostname = "localhost";

                                $username = "root";
                                
                                $password = "";
                                
                                // your database name
                                $databaseName = "yii-mentor";
                                        $connect = mysqli_connect($hostname, $username, $password);
                                            mysqli_select_db($connect, $databaseName);
                                
                                // the mysql query
                                $query = "DELETE FROM   cache_question_practice WHERE user_id='$user_id'";
                                
                                $result = mysqli_query($connect, $query);
                        
                                if($result){
                        
                                    $hostname = "localhost";

                                    $username = "root";
                                    
                                    $password = "";
                                    
                                    // your database name
                                    $databaseName = "yii-mentor";
                                            $connect = mysqli_connect($hostname, $username, $password);
                                                mysqli_select_db($connect, $databaseName);
                                    
                                    // the mysql query
                                    $query = "UPDATE date_answer SET proc=0 WHERE id_user='$user_id'";
                                    
                                    $result = mysqli_query($connect, $query);
                            
                                    if($result){
                            
                                        $hostname = "localhost";

                                        $username = "root";
                                        
                                        $password = "";
                                        
                                        // your database name
                                        $databaseName = "yii-mentor";
                                                $connect = mysqli_connect($hostname, $username, $password);
                                                    mysqli_select_db($connect, $databaseName);
                                        
                                        // the mysql query
                                        $query = "DELETE FROM   done_mock_test WHERE user_id='$user_id'";
                                        
                                        $result = mysqli_query($connect, $query);
                                
                                        if($result){
                                
                                            $hostname = "localhost";

                                        $username = "root";
                                        
                                        $password = "";
                                        
                                        // your database name
                                        $databaseName = "yii-mentor";
                                                $connect = mysqli_connect($hostname, $username, $password);
                                                    mysqli_select_db($connect, $databaseName);
                                        
                                        // the mysql query
                                        $query = "DELETE FROM   done_test_prac WHERE user_id='$user_id'";
                                        
                                        $result = mysqli_query($connect, $query);
                                
                                        if($result){
                                
                                            $hostname = "localhost";

                                        $username = "root";
                                        
                                        $password = "";
                                        
                                        // your database name
                                        $databaseName = "yii-mentor";
                                                $connect = mysqli_connect($hostname, $username, $password);
                                                    mysqli_select_db($connect, $databaseName);
                                        
                                        // the mysql query
                                        $query = "DELETE FROM   end_cache_mock_test WHERE user_id='$user_id'";
                                        
                                        $result = mysqli_query($connect, $query);
                                
                                        if($result){
                                
                                            $hostname = "localhost";

                                            $username = "root";
                                            
                                            $password = "";
                                            
                                            // your database name
                                            $databaseName = "yii-mentor";
                                                    $connect = mysqli_connect($hostname, $username, $password);
                                                        mysqli_select_db($connect, $databaseName);
                                            
                                            // the mysql query
                                            $query = "DELETE FROM   end_cache_prac WHERE user_id='$user_id'";
                                            
                                            $result = mysqli_query($connect, $query);
                                    
                                            if($result){
                                    
                                                $hostname = "localhost";

                                                $username = "root";
                                                
                                                $password = "";
                                                
                                                // your database name
                                                $databaseName = "yii-mentor";
                                                        $connect = mysqli_connect($hostname, $username, $password);
                                                            mysqli_select_db($connect, $databaseName);
                                                
                                                // the mysql query
                                                $query = "DELETE FROM   false_answer WHERE user_id='$user_id'";
                                                
                                                $result = mysqli_query($connect, $query);
                                        
                                                if($result){
                                        
                                                    $hostname = "localhost";

                                                $username = "root";
                                                
                                                $password = "";
                                                
                                                // your database name
                                                $databaseName = "yii-mentor";
                                                        $connect = mysqli_connect($hostname, $username, $password);
                                                            mysqli_select_db($connect, $databaseName);
                                                
                                                // the mysql query
                                                $query = "DELETE FROM   question_table_cache_but WHERE user_id='$user_id'";
                                                
                                                $result = mysqli_query($connect, $query);
                                        
                                                if($result){
                                        
                                                    $hostname = "localhost";

                                                $username = "root";
                                                
                                                $password = "";
                                                
                                                // your database name
                                                $databaseName = "yii-mentor";
                                                        $connect = mysqli_connect($hostname, $username, $password);
                                                            mysqli_select_db($connect, $databaseName);
                                                
                                                // the mysql query
                                                $query = "DELETE FROM   quest_table_cache WHERE user_id='$user_id'";
                                                
                                                $result = mysqli_query($connect, $query);
                                        
                                                if($result){
                                        
                                                    $hostname = "localhost";

                                                    $username = "root";
                                                    
                                                    $password = "";
                                                    
                                                    // your database name
                                                    $databaseName = "yii-mentor";
                                                            $connect = mysqli_connect($hostname, $username, $password);
                                                                mysqli_select_db($connect, $databaseName);
                                                    
                                                    // the mysql query
                                                    $query = "DELETE FROM   true_answer WHERE user_id='$user_id'";
                                                    
                                                    $result = mysqli_query($connect, $query);
                                            
                                                    if($result){
                                            
                                                        return $result;
                                            
                                                    }else{
                                            
                                                        return null;
                                            
                                                    }
                                        
                                                }else{
                                        
                                                    return null;
                                        
                                                }
                                        
                                                }else{
                                        
                                                    return null;
                                        
                                                }
                                        
                                                }else{
                                        
                                                    return null;
                                        
                                                }
                                    
                                            }else{
                                    
                                                return null;
                                    
                                            }
                                
                                        }else{
                                
                                            return null;
                                
                                        }
                                
                                        }else{
                                
                                            return null;
                                
                                        }
                                
                                        }else{
                                
                                            return null;
                                
                                        }
                            
                                    }else{
                            
                                        return null;
                            
                                    }
                        
                                }else{
                        
                                    return null;
                        
                                }
                        
                                }else{
                        
                                    return null;
                        
                                }
                        
                                }else{
                        
                                    return null;
                        
                                }
                    
                            }else{
                    
                                return null;
                    
                            }
                    
                            }else{
                    
                                return null;
                    
                            }
                
                        }else{
                
                            return null;
                
                        }
            
                    }else{
            
                        return null;
            
                    }
        
                }else{
        
                    return null;
        
                }
    
            }else{
    
                return null;
    
            }
    
            }else{
    
                return null;
    
            }

        }else{

            return null;

        }
        
                     

    }

    public function getUpdateSchool($user_name,$user_pass,$user_email,$user_fn,$user_ln,$user_date,$user_country,$user_phone,$user_mobile_number,
    $user_post_code,$user_city,$user_id) {


        $hostname = "localhost";

                                                    $username = "root";
                                                    
                                                    $password = "";
                                                    
                                                    // your database name
                                                    $databaseName = "yii-mentor";
                                                            $connect = mysqli_connect($hostname, $username, $password);
                                                                mysqli_select_db($connect, $databaseName);
                                                    
                                                    // the mysql query
         $query = "UPDATE `school` SET `first_name`='$user_fn',`last_name`='$user_ln',`password`='$user_pass',`date_birth`='$user_date',`telephone_no`='$user_phone',
       `mobile_number`='$user_mobile_number',`email`='$user_email',`street`='$user_country',`post_code`='$user_post_code',`city`='$user_city',`iban`=0,`bic`=0 WHERE `id` = '$user_id'";
                                                    
                                                    $result = mysqli_query($connect, $query);
                                            
                                                    if($result){
                                            
                                                        $hostname = "localhost";

                                                    $username = "root";
                                                    
                                                    $password = "";
                                                    
                                                    // your database name
                                                    $databaseName = "yii-mentor";
                                                            $connect = mysqli_connect($hostname, $username, $password);
                                                                mysqli_select_db($connect, $databaseName);
                                                    
                                                    // the mysql query
         $query = "UPDATE `user` SET `password_hash`='$user_pass',`email`='$user_email' WHERE `username` = '$user_name'";
                                                    
                                                    $result = mysqli_query($connect, $query);
                                            
                                                    if($result){
                                            
                                                        return $result;
                                            
                                                    }else{
                                            
                                                        return null;
                                            
                                                    }

                                            
                                                    }else{
                                            
                                                        return null;
                                            
                                                    }

        


    }

    

    public function getUpdateWrite($user_id,$lang_id){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "UPDATE `stud_langs_write` SET `lang_id`='$lang_id' WHERE `student_id` = '$user_id'";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }

    public function getUpdateStudy($user_id,$lang_id){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "UPDATE `stud_langs_stud` SET `langs_id`='$lang_id' WHERE `stud_id` =  '$user_id'";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }

    public function getStudentUpdate($user_id,$user_name,$user_pass,$user_fn,$user_ln,$user_date,$user_place,$user_country,
    $user_phone,$user_email,$user_active_code,$user_res_id) {


        $hostname = "localhost";

                                                    $username = "root";
                                                    
                                                    $password = "";
                                                    
                                                    // your database name
                                                    $databaseName = "yii-mentor";
                                                            $connect = mysqli_connect($hostname, $username, $password);
                                                                mysqli_select_db($connect, $databaseName);
                                                    
                                                    // the mysql query
         $query = "UPDATE `students` SET `first_name`='$user_fn',`last_name`='$user_ln',`password`='$user_pass',`day_birth`='$user_date',`place_birth`='$user_place',
         `country`='$user_country',`phone_number`='$user_phone',`email`='$user_email',`activation_code`='$user_active_code',`res_id`='$user_res_id' WHERE `id` =  '$user_id'";
                                                    
                                                    $result = mysqli_query($connect, $query);
                                            
                                                    if($result){
                                            
                                                        $hostname = "localhost";

                                                    $username = "root";
                                                    
                                                    $password = "";
                                                    
                                                    // your database name
                                                    $databaseName = "yii-mentor";
                                                            $connect = mysqli_connect($hostname, $username, $password);
                                                                mysqli_select_db($connect, $databaseName);
                                                    
                                                    // the mysql query
         $query = "UPDATE `user` SET `password_hash`='$user_pass',`email`='$user_email' WHERE `username` = '$user_name'";
                                                    
                                                    $result = mysqli_query($connect, $query);
                                            
                                                    if($result){
                                            
                                                        return $result;
                                            
                                                    }else{
                                            
                                                        return null;
                                            
                                                    }

                                            
                                                    }else{
                                            
                                                        return null;
                                            
                                                    }

        


    }


    
    public function getUpdateFront($user_id,$user_dog,$lang_id){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "UPDATE `frontend_langs` SET '$user_id'='$user_dog' WHERE `lang_id` = '$user_id'";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }

    

    public function getCreateComment($lang_id,$image,$position,$coment,$name){

      
        $stmt = $this->conn->prepare("INSERT INTO `frontend_comment`(`lang_id`, `image`, `name`, `position`, `coment`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $lang_id,$image,$name,$position,$coment);
        $result = $stmt->execute();
        $stmt->close();
        
        if($result){

            return $result;

        }else{

            return null;

        }
                     

    }

    

    public function getEditComment($lang_id,$image,$position,$coment,$name,$id){

      
        $stmt = $this->conn->prepare("UPDATE `frontend_comment` SET `lang_id`=?,`image`=?,`name`=?,`position`=?,`coment`=? WHERE `id` = ?");
        $stmt->bind_param("ssssss", $lang_id,$image,$name,$position,$coment,$id);
        $result = $stmt->execute();
        $stmt->close();
        
        if($result){

            return $result;

        }else{

            return null;

        }
                     

    }


    public function getLocalPrac($user_id){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `local_prac_quest` WHERE `user_id` =  '$user_id'";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }

    public function getLocalMock($user_id){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `local_mock_quest` WHERE `user_id` =  '$user_id'";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }

    
    public function getCreateQuestions($amtl_frage_nr,$fehlerpunkte,$image,$points,$cat,$soc_id){

      
        $stmt = $this->conn->prepare("INSERT INTO `quesions`(`amtl_frage_nr`, `fehlerpunkte`, `image`, `points`) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $amtl_frage_nr,$fehlerpunkte,$image,$points);
        $result = $stmt->execute();

        //$user = $stmt->get_result()->fetch_assoc();

        $stmt->close();
        
        if($result){

            $stmt = $this->conn->prepare("SELECT max(id) FROM `quesions`");
                           
                    $result = $stmt->execute();

                    $user = $stmt->get_result()->fetch_assoc();


                    $stmt->close();
                        
                   $quest_id =  $user['max(id)'];

            $stmt = $this->conn->prepare("INSERT INTO `quest_soc`(`quest_id`, `soc_id`) VALUES (?,?)");
        $stmt->bind_param("ss", $quest_id,$soc_id);
        $result = $stmt->execute();

       // $user = $stmt->get_result()->fetch_assoc();
        
        $stmt->close();

        if($result){

             
            $cande = "mock_test";
            $category = null;
            $stmt = $this->conn->prepare("INSERT INTO `cande_question`(`question_id`, `cande`, `cat`, `category`) VALUES (?,?,?,?)");
            $stmt->bind_param("ssss", $quest_id,$cande,$cat,$category);
            $result = $stmt->execute();
    
           // $user = $stmt->get_result()->fetch_assoc();
            
            $stmt->close();

            if($result){

            return $quest_id;

            }else{
                return null;
            }

        }else{
            return null;
        }

        

        }else{

            return null;

        }
                     

    }


    public function getCreateQuestionsLangs($question_id,$languege,$question,$answer_yes,$answer_no1,$answer_no2,
    $one,$two,$three){

       
        $stmt = $this->conn->prepare("INSERT INTO `langs_question`( `question_id`, `languege`, `question`, `answer_yes`, `answer_no1`, `answer_no2`, `one`, 
        `two`, `three`) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss", $question_id,$languege,$question,$answer_yes,$answer_no1,$answer_no2,
        $one,$two,$three);
        $result = $stmt->execute();

       // $user = $stmt->get_result()->fetch_assoc();
        
        $stmt->close();

        if($result){

        return $result;

        }else{
            return null;
        }
        
                     

    }
   

    public function  getInsertLocalMock($user_id,$quest_id,$cat){


      
        $stmt = $this->conn->prepare("INSERT INTO `local_mock_quest`( `user_id`, `quest_id`, `cat`) VALUES (?,?,?)");
        $stmt->bind_param("sss", $user_id,$question_id,$cat);
        $result = $stmt->execute();
        $stmt->close();
        
        if($result){

        }else{
            return null;
        }

    }

    public function  getInsertLocal($user_id,$quest_id,$cat){


      
        $stmt = $this->conn->prepare("INSERT INTO `local_prac_quest`( `user_id`, `quest_id`, `cat`) VALUES (?,?,?)");
        $stmt->bind_param("sss", $user_id,$question_id,$cat);
        $result = $stmt->execute();
        $stmt->close();
        
        if($result){

        }else{
            return null;
        }

    }
    public function  getDellAnswerPrac($user_id){


        $hostname = "localhost";
    
        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "DELETE FROM `answer_chache_practice` WHERE `user_id` = '$user_id'";
        
        $result = mysqli_query($connect, $query);
    
        if($result){
    
            return $result;
    
        }else{
    
            return null;
    
        }
        
    }

   


    public function getDellLocalMock($user_id){


        $hostname = "localhost";
    
        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "DELETE FROM `local_mock_quest` WHERE `user_id` =  '$user_id'";
        
        $result = mysqli_query($connect, $query);
    
        if($result){
    
            return $result;
    
        }else{
    
            return null;
    
        }
        
    }

    public function getDellLocal($user_id){


    $hostname = "localhost";

    $username = "root";
    
    $password = "";
    
    // your database name
    $databaseName = "yii-mentor";
            $connect = mysqli_connect($hostname, $username, $password);
                mysqli_select_db($connect, $databaseName);
    
    // the mysql query
    $query = "DELETE FROM `local_prac_quest` WHERE `user_id` =  '$user_id'";
    
    $result = mysqli_query($connect, $query);

    if($result){

        return $result;

    }else{

        return null;

    }
    
}

public function getInsertAnswerMock($question_id,$cache,$user_id,$answer_yes,$answer_no1,$answer_no2,$cat){

      
    $stmt = $this->conn->prepare("INSERT INTO `answer_chache_mock`(`quest_id`, `user_id`, `answer_1`, `answer_2`, `answer_3`, `cache`, `cat`) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss", $question_id,$user_id,$answer_yes,$answer_no1,$answer_no2,$cache,$cat);
    $result = $stmt->execute();
    $stmt->close();
    
    if($result){

    }else{
        return null;
    }

}

    
    public function getInsertAnswerPrac($question_id,$cache,$user_id,$answer_yes,$answer_no1,$answer_no2,$cat){

      
        $stmt = $this->conn->prepare("INSERT INTO `answer_chache_practice`(`quest_id`, `user_id`, `answer_1`, `answer_2`, `answer_3`, `cache`, `cat`) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $question_id,$user_id,$answer_yes,$answer_no1,$answer_no2,$cache,$cat);
        $result = $stmt->execute();
        $stmt->close();
        
        if($result){

        }else{
            return null;
        }

    }

    

    public function getAnswerPrac($question_id,$cache,$user_id,$answer_yes,$answer_no1,$answer_no2){

      
        $stmt = $this->conn->prepare("UPDATE `answer_chache_practice` SET `answer_1`=?,`answer_2`=?,`answer_3`=?,`cache`=? WHERE `quest_id` = ? AND `user_id` = ?");
        $stmt->bind_param("ssssss", $answer_yes,$answer_no1,$answer_no2,$cache,$question_id,$user_id);
        $result = $stmt->execute();
        $stmt->close();
        
        if($result){

    $date = date('d.m.y');

             $stmt = $this->conn->prepare("UPDATE `practice_date_cache` SET `date`=? WHERE `user_id` = ?");
        $stmt->bind_param("ss", $date,$user_id);
        $result = $stmt->execute();
        $stmt->close();
        
        if($result){

            

            
            $stmt = $this->conn->prepare("SELECT * FROM `all_test_points_prac` WHERE user_id='$user_id'");
                           
                    $result = $stmt->execute();

                    $user = $stmt->get_result()->fetch_assoc();


                    $stmt->close();

                    $stmt = $this->conn->prepare("SELECT `points` FROM `quesions` WHERE `id` = '$question_id'");
                           
                    $result = $stmt->execute();

                    $user2 = $stmt->get_result()->fetch_assoc();


                    $stmt->close();

                    $new_point = $user[0]['points'] - $user2[0]['points'];

                    $stmt = $this->conn->prepare("UPDATE `all_test_points_prac` SET `points`=? WHERE `user_id` = ?");
        $stmt->bind_param("ss", $new_point,$user_id);
        $result = $stmt->execute();
        $stmt->close();
                    
        if($result){

            $stmt = $this->conn->prepare("SELECT * FROM `langs_question` WHERE `question_id` = '$question_id'");
                           
            $result = $stmt->execute();

            $user3 = $stmt->get_result()->fetch_assoc();

            $stmt->close();

            if($answer_yes==$user3[0]['one'] && $answer_no1==$user3[0]['two'] && $answer_no2==$user3[0]['three']){

$prac= 'practice';
                $stmt = $this->conn->prepare("INSERT INTO `true_answer`(`user_id`, `quest_id`, `cande_quest`, `count`) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $user_id,$question_id,$prac,1);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
            }else{

                $prac= 'practice';
                $stmt = $this->conn->prepare("INSERT INTO `false_answer`(`user_id`, `quest_id`, `cande_quest`, `count`) VALUES (?,?,?,?)");
                $stmt->bind_param("ssss", $user_id,$question_id,$prac,1);
                $result = $stmt->execute();
                $stmt->close();

        return $result;

            }


            

            

        }else{

            return null;

        }

        }else{

            return null;

        }

        }else{

            return null;

        }
                     

    }

    public function getAnswerMock($question_id,$cache,$user_id,$answer_yes,$answer_no1,$answer_no2){

        
        $stmt = $this->conn->prepare("SELECT * FROM `langs_question` WHERE `question_id` =  ?");

        $stmt->bind_param("s", $question_id);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            if($user['one']==$answer_yes && $user['two']==$answer_no1 && $user['three']==$answer_no2){

                $true = "true";

            }else{

                $true = "false";

            }
          
            $stmt = $this->conn->prepare("UPDATE `answer_chache_practice` SET `answer_1`=?,`answer_2`=?,`answer_3`=?,`cache`=?, `answer`=? WHERE `quest_id` = ? AND `user_id` = ?");
            $stmt->bind_param("sssssss", $answer_yes,$answer_no1,$answer_no2,$cache,$true,$question_id,$user_id);
            $result = $stmt->execute();
            $stmt->close();
            
            if($result){
    
                $stmt = $this->conn->prepare("SELECT * FROM `all_test_points_mock_test` WHERE user_id='$user_id'");
                           
                $result = $stmt->execute();

                $user = $stmt->get_result()->fetch_assoc();


                $stmt->close();

                $stmt = $this->conn->prepare("SELECT `points` FROM `quesions` WHERE `id` = '$question_id'");
                       
                $result = $stmt->execute();

                $user2 = $stmt->get_result()->fetch_assoc();


                $stmt->close();

                $new_point = $user[0]['points'] - $user2[0]['points'];

                $stmt = $this->conn->prepare("UPDATE `all_test_points_mock_test` SET `points`=? WHERE `user_id` = ?");
    $stmt->bind_param("ss", $new_point,$user_id);
    $result = $stmt->execute();
    $stmt->close();

    if($result){


        $stmt = $this->conn->prepare("SELECT * FROM `langs_question` WHERE `question_id` = '$question_id'");
                           
        $result = $stmt->execute();

        $user3 = $stmt->get_result()->fetch_assoc();

        $stmt->close();

        if($answer_yes==$user3[0]['one'] && $answer_no1==$user3[0]['two'] && $answer_no2==$user3[0]['three']){

$prac= 'mock_test';
            $stmt = $this->conn->prepare("INSERT INTO `true_answer`(`user_id`, `quest_id`, `cande_quest`, `count`) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $user_id,$question_id,$prac,1);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
        }else{

            $prac= 'mock_test';
            $stmt = $this->conn->prepare("INSERT INTO `false_answer`(`user_id`, `quest_id`, `cande_quest`, `count`) VALUES (?,?,?,?)");
            $stmt->bind_param("ssss", $user_id,$question_id,$prac,1);
            $result = $stmt->execute();
            $stmt->close();

    return $result;

        }


            }else{
    
                return null;
    
            }
            }else{
    
                return null;
    
            }
            
        } else {
            return null;
        }

      
       
                     

    }

    public function getPointsMock($user_name){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `all_test_points_mock_test` WHERE `user_id` =  '$user_id'";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }
    
    public function getPoints($user_name){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `all_test_points_prac` WHERE `user_id` =  '$user_id'";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }

    public function getCande(){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "SELECT * FROM `cande_question`";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }


    public function getUpdatePoints($user_id,$points){

      
        $hostname = "localhost";

        $username = "root";
        
        $password = "";
        
        // your database name
        $databaseName = "yii-mentor";
                $connect = mysqli_connect($hostname, $username, $password);
                    mysqli_select_db($connect, $databaseName);
        
        // the mysql query
        $query = "UPDATE `all_test_points_mock_test` SET `points`='$points' WHERE `user_id` = '$user_id'";
        
        $result = mysqli_query($connect, $query);

        if($result){

            return $result;

        }else{

            return null;

        }
        
                     

    }






}

?>
