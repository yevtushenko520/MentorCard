

    <?php 

header('Content-type: application/pdf');
header("Content-type: text/html; charset=UTF-8");
require('/srv/data/web/vhosts/www.mentorcard.de/htdocs/vendor/fpdf/fpdf.php');


if(Yii::$app->user->identity->username ==null){

    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
    die();
  
  }else{
  
  }
  
    
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if($actual_link=="http://www.mentorcard.de/backend/web/index.php?r=site%2Fmock_test"){
        echo "<aside class='main-sidebar' style='background-color: #008000'>";

        echo "<style>
        .skin-blue .sidebar-menu > li:hover > a, .skin-blue .sidebar-menu > li.active > a {
            color: #fff;
            background: #008000;
            border-left-color: #3c8dbc;
        }
        
        .skin-blue .sidebar-menu > li > .treeview-menu {
            margin: 0 1px;
            background: #008000;
        }
        
        </style>";
    }else{
        echo "<aside class='main-sidebar' >";
    }
    
    ?>



<?php 
$x = Yii::$app->user->identity->role; ?>
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <!--<div class="pull-left image">
                <img src="http://www.mentorcard.de/backend/web/images/logo.png" class="img-circle" alt="User Image"/>
            </div>-->
            <div class="pull-left image">
            <?php

if(Yii::$app->user->identity->role == 4){

$posts3 = Yii::$app->db->createCommand('SELECT username FROM user  WHERE id='.Yii::$app->user->identity->id)->queryAll();

$posts4 = Yii::$app->db->createCommand('SELECT id FROM students WHERE username="'.$posts3[0]['username'].'"')->queryAll();

$name_cyka = "practice";

$posts11 = Yii::$app->db->createCommand('SELECT  COUNT(*) FROM cande_question WHERE cande="'.$name_cyka.'"')->queryAll();

$posts12 = Yii::$app->db->createCommand('SELECT  COUNT(*) FROM true_answer WHERE user_id='.$posts4[0]['id'].' AND cande_quest="'.$name_cyka.'"')->queryAll();

}else{

}


//$posts11[0]['COUNT(*)']


if ($x==1) {
$name_role = Yii::$app->user->identity->username;
$user_email = Yii::$app->user->identity->email;

$connection = Yii::$app->getDb();
   $command = $connection->createCommand("
    SELECT id FROM user
    WHERE username = '$name_role'
    ");

} elseif($x==2){
    $name_role = Yii::$app->user->identity->username;
    $user_email = Yii::$app->user->identity->email;

    $posts114= Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

    $connection = Yii::$app->getDb();
   $command = $connection->createCommand("
    SELECT id FROM admin
    WHERE username = '$name_role'
    ");
}
elseif($x==3){
    $name_role = Yii::$app->user->identity->username;
    $user_email = Yii::$app->user->identity->email;

    $posts112 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();

    $connection = Yii::$app->getDb();
   $command = $connection->createCommand("
    SELECT id FROM school
    WHERE school_name = '$name_role'
    ");
}
else {
    $name_role = Yii::$app->user->identity->username;
    $user_email = Yii::$app->user->identity->email;

    $connection = Yii::$app->getDb();
   $command = $connection->createCommand("
    SELECT id FROM students
    WHERE username = '$name_role'
    ");

}
    if(Yii::$app->user->identity->role ==4){

        $posts228 = Yii::$app->db->createCommand('SELECT * FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
      
       }else  if(Yii::$app->user->identity->role ==3){
      
        $posts228 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
      
       }else  if(Yii::$app->user->identity->role ==2){
      
        $posts228 = Yii::$app->db->createCommand('SELECT * FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
         
       }else{

        $posts228 = Yii::$app->db->createCommand('SELECT * FROM user  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

       }


       $posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts228[0]['id'])->queryAll();

      

       $set = $_COOKIE["govno"];

if($set!=null){

  //  язык

  $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$set)->queryAll();

  $posts1003 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$set)->queryAll();

  
}else{
    
    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Fchoose_lang");
die();
   

}
    

$posts29 = Yii::$app->db->createCommand('SELECT * FROM done_test_prac  WHERE user_id='.$posts228[0]['id'])->queryAll();


$posts32 = Yii::$app->db->createCommand('SELECT * FROM user_tags  WHERE user_id='.$posts228[0]['id'])->queryAll();


$x_y = 0;

if($posts29!=null){

    foreach($posts32 as $kola):


        if($kola['tag_id']==$posts29[$x_y]['tag_id']){


            $prac_left = 1;

        }else{

            $prac_left++;

        }

    endforeach;


    if($prac_left>1){

        $prac_left = 0;
    }else{

        $prac_left = 1;
    }
    
    

}else{

    $prac_left = 0;
}




$posts30 = Yii::$app->db->createCommand('SELECT * FROM done_mock_test  WHERE user_id='. $posts228[0]['id'].'')->queryAll();

if($posts30!=null){


    
    $mock_left = 1;

}else{

    $mock_left = 0;
}





   $result = $command->queryAll(); 
    
    foreach ($result as $row) {

        $cu_id = $row['id'];
    }


    $stud = 'http://www.mentorcard.de/backend/web/index.php?r=students%2Fupdate&id='. $cu_id;

    $schol = 'http://www.mentorcard.de/backend/web/index.php?r=school%2Fupdate&id='. $posts112[0]['id'];

    $admin = 'http://www.mentorcard.de/backend/web/index.php?r=admin%2Fupdate&id='.$posts114[0]['id'];

    $super_admin = 'http://www.mentorcard.de/backend/web/index.php?r=user%2Fupdate&id=0';

    if(Yii::$app->user->identity->role ==4){

        $set = $stud;
      
       }else  if(Yii::$app->user->identity->role ==3){
      
        $set = $schol;
      
       }else  if(Yii::$app->user->identity->role ==2){
      
        $set = $admin;
         
       }else{

        $set = $super_admin;

       }
    

       $posts35 = Yii::$app->db->createCommand('SELECT * FROM payment_old  WHERE user_id='. $posts228[0]['id'].'')->queryAll();


       foreach( $posts35 as $kola):


        $today = date("d.m.y");


        $Date2 = $kola['date'];
    
        $date = date('d.m.y', strtotime($Date2. ' + 15 days'));
        
        
        if ($date == $today) {
        
           

            
$pdf = new FPDF('P','mm','A4');


$posts11 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE id='.$kola['id'])->queryAll();

$posts12 = Yii::$app->db->createCommand('SELECT * FROM customer_id  WHERE user_id='.$posts11[0]['id'])->queryAll();

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','',17);

//Cell(width , height , text , border , end line , [align] )

$pdf->Image('http://www.mentorcard.de/backend/web/images/invo.jpg',0,0,220,300);//end of line

$pdf->Cell(189	,10,'',0,1);//end of line

$pdf->Cell(50	,5,'RECHNUNG',0,0);
//$pdf->Cell(59	,5,'INVOICE',0,1);//end of line


$pdf->Image('http://www.mentorcard.de/backend/web/images/Logo_Web.png',150,20,20);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','B',14);

$pdf->Cell(130	,15,'',0,0);
$pdf->Cell(25	,15,'',0,0);
$pdf->Cell(34	,15,'',0,1);//end of line

$pdf->Cell(189	,10,'',0,1);//end of line

$pdf->Cell(75	,10,'DATUM',0,0);

$pdf->Cell(50	,10,'Rechnungs Nr.',0,0);//end of line
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50	,10,'SOOD GERMANY GMBH',0,1);


$pdf->SetFont('Arial','',12);

$pdf->Cell(75	,5,date('m.d.Y'),0,0);

$pdf->Cell(50	,5,'0001-'.date('d.Y'),0,0);//end of line
$pdf->Cell(50	,5, iconv('UTF-8', 'ISO-8859-2','Kurfürstenplatz 34'),0,1);//end of line


$pdf->Cell(75	,5,'',0,0);

$pdf->Cell(50	,5,'',0,0);//end of line
$pdf->Cell(50	,5, iconv('UTF-8', 'ISO-8859-2','60486 Frankfurt am Main'),0,1);//end of line

$pdf->Cell(75	,5,'',0,0);

$pdf->Cell(50	,5,'',0,0);//end of line
$pdf->Cell(50	,5, iconv('UTF-8', 'ISO-8859-2','Tel.: +49 (69) 770 69 770'),0,1);//end of line


$pdf->Cell(75	,5,'',0,0);

$pdf->Cell(50	,5,'',0,0);//end of line
$pdf->Cell(50	,5, iconv('UTF-8', 'ISO-8859-2','Fax: +49 (69) 770 69 771'),0,1);//end of line

$pdf->Cell(75	,5,'',0,0);

$pdf->Cell(50	,5,'',0,0);//end of line
$pdf->Cell(50	,5, iconv('UTF-8', 'ISO-8859-2','Email: info@mentorcar.de'),0,1);//end of line


$pdf->Cell(75	,5,'',0,0);

$pdf->Cell(50	,5,'',0,0);//end of line
$pdf->Cell(50	,5, iconv('UTF-8', 'ISO-8859-2','Web: www.mentorcard.de'),0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

$pdf->SetFont('Arial','B',12);
$pdf->Cell(75	,5, iconv('UTF-8',  'ISO-8859-2',$posts11[0]['first_name'].' '.$posts11[0]['last_name']),0,0);

$pdf->SetFont('Arial','',12);

$pdf->Cell(50	,5, '',0,1);//end of line

$pdf->Cell(75	,5, iconv('UTF-8', 'ISO-8859-2', $posts11[0]['street']),0,0);

$pdf->Cell(50	,5, '',0,1);//end of line

$pdf->Cell(75	,5, iconv('UTF-8', 'ISO-8859-2', $posts11[0]['post_code'].' '.$posts11[0]['city']),0,0);

$pdf->Cell(50	,5, '',0,1);//end of line


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,15,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(15	,7,'SNr.',1,0,'C');
$pdf->Cell(60	,7,'Beschreibung',1,0,'C');
$pdf->Cell(20	,7,'Menge',1,0,'C');
$pdf->Cell(30	,7,'Nettopreis',1,0,'C');
$pdf->Cell(30	,7,'USt. (19%)',1,0,'C');
$pdf->Cell(34	,7,'Bruttopreis',1,1,'C');//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter


$pdf->Cell(15	,7,'1.',1,0,'C');
$pdf->Cell(60	,7,'MENTORCARD - DEUTSCH',1,0,'C');
$pdf->Cell(20	,7,'10',1,0,'C');
$pdf->Cell(30	,7,chr(128).' 84,03',1,0,'C');
$pdf->Cell(30	,7, chr(128).' 15,97',1,0,'C');
$pdf->Cell(34	,7,chr(128).' 100,00' ,1,1,'C');//end of line

$pdf->SetFont('Arial','B',14);

$pdf->Cell(95	,7,'Rechnungsbetrag.',1,0,'C');
$pdf->Cell(30	,7,chr(128).' 84,03',1,0,'C');
$pdf->Cell(30	,7,chr(128).' 15,97',1,0,'C');
$pdf->Cell(34	,7,chr(128).' 100,00',1,1,'C');//end of line

$pdf->SetFont('Arial','I',8);

$pdf->Cell(189	,15,iconv('UTF-8', 'ISO-8859-2', 'Den Rechnungsbetrag ziehen wir als SEPA-Basislastschrift zum Fälligkeitstag 19.02.2019 zu Ihrer '),0,1);//end of line


$pdf->SetFont('Arial','B',10);

$pdf->Cell(35	,7,'Kunden Nr.:',0,0,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(40	,7,$posts12[0]['customer'].', von Ihrem',0,1,'L');


$pdf->SetFont('Arial','B',10);

$pdf->Cell(35	,7,'Bank Konto IBAN:',0,0,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(40	,7,$posts11[0]['iban'],0,1,'L');


$pdf->SetFont('Arial','B',10);

$pdf->Cell(35	,7,'BIC:',0,0,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(40	,7,$posts11[0]['bic'],0,1,'L');



$pdf->Cell(189	,40,'',0,1);//end of line



$pdf->SetFont('Arial','',9);

$pdf->Cell(35	,4, iconv('UTF-8', 'ISO-8859-2', 'Geschäftsführer: '),0,0,'L');

$pdf->Cell(70	,4,iconv('UTF-8', 'ISO-8859-2', 'George Sood, Handelsregister: Frankfurt am Main, HRB: 112411, UST.-ID.: DE 124 321 123'),0,1,'L');


$pdf->Cell(35	,4, iconv('UTF-8', 'ISO-8859-2', 'Commerzbank IBAN:'),0,0,'L');

$pdf->Cell(70	,4,iconv('UTF-8', 'ISO-8859-2', 'DE08 5004 0048 0250 0007 00'),0,1,'L');



$pdf->Cell(35	,4, iconv('UTF-8', 'ISO-8859-2', 'BIC: '),0,0,'L');

$pdf->Cell(70	,4,iconv('UTF-8', 'ISO-8859-2', 'COBADEFFXXX'),0,1,'L');



$filename = "invoice.pdf";
        
$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));

$eol = PHP_EOL;
$separator = md5(time());


// email stuff (change data below)
$to = $kola['email']; 
$from = "info@mentorcar.de"; 
$subject = "send email with pdf attachment"; 
$message = "You codes";

// main header
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

// no more headers after this, we start the body! //

$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body .= $eol;

// message
$body .= "--".$separator.$eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body .= $message.$eol;

// attachment
$body .= "--".$separator.$eol;
$body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $attachment.$eol;
$body .= "--".$separator."--";

// send message
mail($to, $subject, $body, $headers);


        }
       endforeach;


    

    ?>

    <style>


/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>

<?php 



?>

                <h4 style="color:#fff;margin-left:5px;"><?php 

                if($posts228[0]['first_name']!=null){

                    echo $posts228[0]['first_name']." ".$posts228[0]['last_name'];
                }else{
                    echo "Super Admin";
                }
                
                
                
                
                ?></h4>

               <!-- <a href="#"><i class="fa fa-envelope-o"></i> <?php echo Yii::$app->user->identity->email?></a>-->
            </div>
            
        </div>

     <script>
function myFunction() {
    alert('<?php echo $posts1003[0]['do_mock']?>');
}



</script>

<style>

span { font-family: Arial, Helvetica Neue, Helvetica, sans-serif; 
 }
</style>

        <?= dmstr\widgets\Menu::widget(
            [
                
                'options' => ['class' => 'sidebar-menu treeview','data-widget' => 'tree'],
                'items' => [
                    
                    
                  
                    ['label' => 
                    (($x==1)?$posts1003[0]['schools']:(($x==4 || $x==3 || $x==2)?$posts1002[0]['dash']:$posts1002[0]['dash']))//dashboard & school
                    
                    , 'icon' => (($x==1)?'fas fa-graduation-cap':(($x==4 || $x==3 || $x==2)?'fa fa-dashboard':'fa fa-dashboard')),

                
                    'options' => [
                        'onclick'=>'reloadAll()',
                    ],
                    
                    'url' => (($x==1)?'http://www.mentorcard.de/backend/web/index.php?r=school':(
                        ($x==4 || $x==3 || $x==2)?['site/dashboard_stud']:['site/dashboard_stud'])),
                    
                    'visible'=>true],
                     
                    ['label' => (($x==1)?$posts1002[0]['stud']:(($x==4 || $x==3 || $x==2)?$posts1002[0]['stat']:$posts1002[0]['stat'])),///stat & student
                    
                    'icon' => (($x==1)?'fa fa-fas fa-users':(($x==4 || $x==3 || $x==2)?'fas fa-signal':'fas fa-signal')), 
                    
                    'url' => (($x==1)?'http://www.mentorcard.de/backend/web/index.php?r=students':(
                        ($x==4 || $x==3 || $x==2)?['site/statistics_stud']:['site/statistics_stud'])),
                        'options' => [
                            'onclick'=>'reloadAll()',
                        ],
                    
                    ],

                    ['label' => $posts1003[0]['questions_left']
                    
                    , 'icon' =>  (($x==1)?'fas fa-align-left':(($x==4 || $x==3 || $x==2)?'fas fa-list-ol':'fas fa-list-ol')), 
                    
                    'url' => 'http://www.mentorcard.de/backend/web/index.php?r=quesions',

                    'options' => [
                        'onclick'=>'reloadAll()',
                    ],
                     
                     'visible'=>(($x==1)? true:false)],

                     ['label' => $posts1003[0]['students']
                    
                     , 'icon' =>  (($x==2)?'fas fa-align-left':(($x==4 || $x==1 || $x==3)?'fas fa-list-ol':'fas fa-list-ol')), 
                     
                     'url' => 'http://www.mentorcard.de/backend/web/index.php?r=students',

                     'options' => [
                        'onclick'=>'reloadAll()',
                    ],
                      
                      'visible'=>(($x==2)? true:false)],

                      ['label' => $posts1003[0]['schools']
                    
                     , 'icon' =>  (($x==2)?'fa fa-fas fa-users':(($x==4 || $x==1 || $x==3)?'fas fa-list-ol':'fas fa-list-ol')), 
                     
                     'url' => 'http://www.mentorcard.de/backend/web/index.php?r=school',

                     'options' => [
                        'onclick'=>'reloadAll()',
                    ],
                      
                      'visible'=>(($x==2)? true:false)],


                     ['label' => $posts1003[0]['students']
                    
                     , 'icon' =>  (($x==3)?'fas fa-align-left':(($x==4 || $x==1 || $x==2)?'fas fa-list-ol':'fas fa-list-ol')), 
                     
                     'url' => ['site/create_per'],

                     'options' => [
                        'onclick'=>'reloadAll()',
                    ],
                      
                      'visible'=>(($x==3)? true:false)],


                      ['label' => "Products"
                    
                      , 'icon' =>  (($x==3)?'fas fa-align-left':(($x==4 || $x==1 || $x==2)?'fas fa-list-ol':'fas fa-list-ol')), 
                      
                      'url' => 'http://www.mentorcard.de/backend/web/index.php?r=products',
 
                      'options' => [
                         'onclick'=>'reloadAll()',
                     ],
                       
                       'visible'=>(($x==1)? true:false)],
                      
                      ['label' => 'Chapters'
                    
                      , 'icon' =>  (($x==1)?'fas fa-align-center':(($x==4 || $x==3 || $x==2)?'fas fa-align-center':'fas fa-align-center')), 
                      
                      'url' => 'http://www.mentorcard.de/backend/web/index.php?r=tests',
  
                      'options' => [
                          'onclick'=>'reloadAll()',
                      ],

                      'visible'=>(($x==1)? true:false)],

                     ['label' => $posts1002[0]['active_code']
                    
                    , 'icon' =>  (($x==1)?'fas fa-check-circle':(($x==4 || $x==3 || $x==2)?'fas fa-check-circle':'fas fa-check-circle')), 
                    
                    'url' => 'http://www.mentorcard.de/backend/web/index.php?r=active-code',

                    'options' => [
                        'onclick'=>'reloadAll()',
                    ],
                     
                     'visible'=>(($x==1)? true:false)],


                     ['label' => $posts1003[0]['front_end']
                    
                     , 'icon' =>  (($x==1)?'fas fa-sitemap':(($x==4 || $x==3 || $x==2)?'fas fa-check-circle':'fas fa-check-circle')), 
                     
                     'url' => 'http://www.mentorcard.de/backend/web/index.php?r=frontend-langs',

                     'options' => [
                        'onclick'=>'reloadAll()',
                    ],
                      
                      'visible'=>(($x==1)? true:false)],

                      ['label' => 'Comments'
                    
                     , 'icon' =>  (($x==1)?'fas fa-comments':(($x==4 || $x==3 || $x==2)?'fas fa-check-circle':'fas fa-check-circle')), 
                     
                     'url' => 'http://www.mentorcard.de/backend/web/index.php?r=frontend-comment',

                     'options' => [
                        'onclick'=>'reloadAll()',
                    ],
                      
                      'visible'=>(($x==1)? true:false)],

                      ['label' => 'Ban List'
                    
                     , 'icon' =>  (($x==1)?'fas fa-ban':(($x==4 || $x==3 || $x==2)?'fas fa-check-circle':'fas fa-check-circle')), 
                     
                     'url' => ['site/ban_list'],

                     'options' => [
                        'onclick'=>'reloadAll()',
                    ],
                      
                      'visible'=>(($x==1 || $x==2)? false:false)],


                    ['label' => $posts1002[0]['learn']//learn
                    
                    , 'icon' =>  (($x==1)?'fas fa-align-left':(($x==4 || $x==3 || $x==2)?'fas fa-list-ol':'fas fa-list-ol')), 
                    
                    'url' => ['#'],

                    

                    'visible'=>(($x==2 || $x==3 || $x==4)? true:false),
                
                'items'=>[
                    ['label' => $posts1002[0]['chap']  , 'icon' =>'fas fa-list-ul',
                    'options' => [
                        'onclick'=>'reloadAll()',
                    ],
                    'url' => ['site/chapters']],
                    ['label' => $posts1002[0]['quest_table']  , 'icon' =>'far fa-question-circle',
                    'options' => [
                        'onclick'=>'reloadAll()',
                    ],
                    'url' => ['site/question_table']],
                    ['label' => $posts1002[0]['prac']  , 'icon' =>'fas fa-book',
                    
                    'url' => (($prac_left==1)?['site/conc']:['site/practice']), 
                    'options' => [
                        'onclick'=>'reloadAll()',
                    ],
                ],
                    ['label' => $posts1002[0]['mock']  , 'icon' =>'fas fa-window-restore',
                        
                        'url' =>(($mock_left==1)?['site/mock_end']:(($prac_left==0)?['site/mock_test']:[''] )), 
                      
                     ],
                ],
            ],

            ['label' =>  $posts1002[0]['shop']
                    
                    , 'icon' => 'fas fa-shopping-cart'
                    
                    , 'url' => ['site/payment'],
                    'options' => [
                        'onclick'=>'reloadAll()',
                    ],

                    'visible'=>(($x==3 || $x==4)? true:false)],

                    ['label' =>  $posts1003[0]['finance']
                    
                    , 'icon' => 'fas fa-credit-card-alt'
                    
                    , 'url' => ['site/payment'],
                    'options' => [
                        'onclick'=>'reloadAll()',
                    ],

                    'visible'=>(($x==1)? false:false)],



                    ['label' =>  (($x==1)?$posts1003[0]['finance']:(($x==4 || $x==3 || $x==2)?$posts1002[0]['setting']:$posts1002[0]['setting']))
                    
                    , 'icon' => (($x==1)?'fas fa-credit-card-alt':(($x==4 || $x==3 || $x==2)?'fas fa-cog':'fas fa-cog'))
                    
                    , 'url' => (($x==1)?['site/payment']:(($x==4 || $x==3 || $x==2)?['#']:['#'])),
                    
                
                    'items'=>[
                        ['label' => $posts1002[0]['user'] , 'icon' =>'fas fa-address-card',
                       
                        'url' =>  (($x==3)?$schol:(($x==4)?$stud:(($x==2)?$admin:$stud))),
                        'options' => [
                            'onclick'=>'reloadAll()',
                        ],],
                        ['label' => $posts1002[0]['system']  , 'icon' =>'fas fa-certificate',
                        'options' => [
                            'onclick'=>'reloadAll()',
                        ],
                        'url' => ['site/info_sys']],
                    ],

                   
                    
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    'visible'=>(($x==1)? false:true)
                ],

                ['label' =>  (($x==2)?$posts1003[0]['finance']:(($x==1 )?$posts1002[0]['setting']:$posts1002[0]['setting']))
                    
                , 'icon' => (($x==4)?'fas fa-credit-card-alt':(($x==1)?'fas fa-cog':'fas fa-cog'))
                
                , 'url' => (($x==4)?['site/payment']:(($x==1 )?['#']:['#'])),

                
            
                'items'=>[
                    ['label' => $posts1002[0]['user'] , 'icon' =>'fas fa-address-card',
                    'options' => [
                        'onclick'=>'reloadAll()',
                    ],
                   
                    'url' =>  $set],
                ],
                'visible'=>(($x==2 || $x==3 || $x==4)? false:true)],
            ],
            ]
            
        ) ?>

        
<style>

.preloader {
  height: 100%;
  width: 100%;
  background: #fff;
  position: fixed;
  left: 0;
  top: 0;
  z-index: 10000;
  perspective: 1600px;
  perspective-origin: 20% 50%;
  transition: 0.5s all;
  opacity: 1;
}

.spinner {
  width: 80px;
  height: 80px;
  border: 2px solid #f3f3f3;
  border-top: 3px solid #0088cf;
  border-radius: 100%;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  animation: spin 1s infinite linear;
}

.preloader.fade {
  opacity: 0;
}

.b-ico-preloader {
  background: url(http://weblaboratory.in.ua/wp-content/themes/graphy/images/new_logo.svg);
  background-size: cover;
  width: 52px;
  height: 67px;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  animation: ico 5s infinite linear;
  transform-style: preserve-3d;
}

@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

@keyframes ico {
  from {
    transform: rotateY(0deg);
  }
  to {
    transform: rotateY(360deg);
  }
}

</style>

        <script>

         function reloadAll(){

var preload = document.createElement('div');

preload.className = "preloader";
preload.innerHTML = '<div class="b-ico-preloader"></div><div class="spinner"></div>';
document.body.appendChild(preload);

window.addEventListener('load', function() {
  // Uncomment to fade preloader after document load
  // preload.className +=  ' fade';
  preload.style.display = 'none';
  setTimeout(function(){
      preload.style.display = 'none';
   },2000);
})
}

</script>

    </section>

</aside>
