<?php 

header('Content-type: application/pdf');
header("Content-type: text/html; charset=UTF-8");
require('/srv/data/web/vhosts/www.mentorcard.de/htdocs/vendor/fpdf/fpdf.php');

/*
header('Content-type: application/pdf');
header("Content-type: text/html; charset=UTF-8");
require('/srv/data/web/vhosts/www.mentorcard.de/htdocs/vendor/fpdf/fpdf.php');

$pdf = new FPDF('P','mm','A4');


$posts11 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();

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

$pdf->Output('invoice.pdf', 'I');
exit;

*/



if(Yii::$app->user->identity->role==3){
    $posts11 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
}else {
    $posts11 = Yii::$app->db->createCommand('SELECT * FROM students  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
}




$posts5021 = Yii::$app->db->createCommand('SELECT * FROM buy_store WHERE user_id='.$posts11[0]['id'])->queryAll();


 $user_id = $posts11[0]['id'];
            $number = $posts5021[0]['number'];

            $x_count = 0;

            
            $questions_pr = [];

            for($x=0;$x<=1000;$x++){

                $length = 5;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';

                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }

                $posts5021 = Yii::$app->db->createCommand('SELECT * FROM active_code WHERE code="'.$randomString.'"')->queryAll(); 

                if($posts5021==null){

                    if($x_count <$number){

            $posts126 = Yii::$app->db->createCommand('INSERT INTO active_code (code,status) VALUES ("'.$randomString.'","OFF")')->execute();
            $posts126 = Yii::$app->db->createCommand('INSERT INTO active_code_res (code,user_id) VALUES ("'.$randomString.'",'.$user_id.')')->execute();

            $questions_pr[$g] = $randomString;
        $g++;

                        $x_count++;
                    }

                }else{

                }

            }

            $string_mess ;
            foreach($questions_pr as $kola):

                $string_mess = $string_mess.', '.$kola;
                
            endforeach;

        /*    
            $posts50212 = Yii::$app->db->createCommand('SELECT * FROM school WHERE id='.$user_id)->queryAll(); 

            $to = $posts50212[0]['email'];
            $mail_subject = "You purchase from MentorCard";
            $mail_content = "Hello, - ".$string_mess;
            $header = "From : admin@mentorcard.com" . "\r\n";
         
            $result = mail($to,$mail_subject,$mail_content,$header);

 */
            $posts20 = Yii::$app->db->createCommand('DELETE FROM   buy_store WHERE user_id='.$user_id)->execute();

  


      

      


        $pdf = new FPDF('P','mm','A4');



        if(Yii::$app->user->identity->role==3){
            $posts11 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
        }else {
            $posts11 = Yii::$app->db->createCommand('SELECT * FROM students  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();


            $length = 10;
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }


    $str_G = 'STU-'.$randomString;



  $posts126 = Yii::$app->db->createCommand('UPDATE `customer_id` SET `customer`="'.$str_G .'" WHERE `user_id` = '.$posts11[0]['id'])->execute();


  $length = 5;
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';

  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }


  $posts126 = Yii::$app->db->createCommand('INSERT INTO active_code (code,status) VALUES ("'.$randomString.'","ON")')->execute();

  
$eol = PHP_EOL;
$separator = md5(time());


// email stuff (change data below)
$to = "evtushenko520@gmail.com"; 
$from = "info@mentorcar.de"; 
$subject = "Payment"; 
$message = "Your MentorCard PIN - ".$randomString;

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



// send message
mail($to, $subject, $body, $headers);


        }
        

$posts12 = Yii::$app->db->createCommand('SELECT * FROM customer_id  WHERE user_id='.$posts11[0]['id'])->queryAll();

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','',17);


$pdf->Cell(50	,15,'CODES',0,1);
//$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

$pdf->Cell(15	,7,'SNr.',1,0,'C');
$pdf->Cell(60	,7,'Code',1,1,'C');

$count = 1;

foreach($questions_pr as $kola):

    $pdf->Cell(15	,7,$count,1,0,'C');
$pdf->Cell(60	,7,$kola,1,1,'C');
    
    $count++;

endforeach;


//$pdf->Output('code.pdf', 'I');
//exit;


$filename = "codes.pdf";
        
$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));

$eol = PHP_EOL;
$separator = md5(time());


// email stuff (change data below)
$to = $posts11[0]['email']; 
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



$posts126 = Yii::$app->db->createCommand('INSERT INTO payment_old (user_id,prod_id,date) VALUES ('.$posts11[0]['id'].',10,"'.date('d.m.y').'")')->execute();

     header('Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Fpayment');
        die();

?>