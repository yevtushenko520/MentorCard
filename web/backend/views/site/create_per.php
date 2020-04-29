<?php 
if(Yii::$app->user->identity->username ==null){

    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
    die();
  
  }else{
  
  }

  

if(Yii::$app->user->identity->role!=3){

    header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

}else{

}

$x_count = 1;

$posts3 = Yii::$app->db->createCommand('SELECT username FROM user  WHERE id='.Yii::$app->user->identity->id)->queryAll();

$posts4 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.$posts3[0]['username'].'"')->queryAll();


$posts5 = Yii::$app->db->createCommand('SELECT * FROM students WHERE res_id='.$posts4[0]['id'])->queryAll();

$posts55 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM students WHERE res_id='.$posts4[0]['id'])->queryAll();



$posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts4[0]['id'])->queryAll();



$set = $_COOKIE["govno"];

if($set!=null){

  //  язык
  $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$set)->queryAll();
}else{
    
    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Fchoose_lang");
die();
   

}




?>


<section class="content">
                 <h2 style="margin-bottom:20px;"><span><?php echo $posts1002[0]['you_stud']?>
</span></h2>
 <p>
        <a class="btn btn-success" href="http://www.mentorcard.de/backend/web/index.php?r=stud-res%2Fcreate"><?php echo $posts1002[0]['create_stud']?></a>    </p>

<div class="box box-primary box-solid" data-widget="box-widget"><div class="box-header"><h3 class="box-title"><?php echo $posts1002[0]['stud_list']?></h3><div class="box-tools pull-right"></div></div><div class="box-body">    
     <div id="w0" class="grid-view"><div class="summary"><?php echo $posts1002[0]['showing']?> <b>1-<?php echo $posts55[0]['COUNT(*)']?></b> <?php echo $posts1002[0]['of']?> <b><?php echo $posts55[0]['COUNT(*)']?>
     </b> <?php echo $posts1002[0]['items']?>.</div>
<table class="table table-striped table-bordered"><thead>
<tr><th>#</th><th><a href="http://www.mentorcard.de/backend/web/index.php?r=students%2Findex&amp;sort=username" data-sort="username"><?php echo $posts1002[0]['username']?></a>
</th><th><a href="http://www.mentorcard.de/backend/web/index.php?r=students%2Findex&amp;sort=first_name" data-sort="first_name"><?php echo $posts1002[0]['first_name']?></a>
</th><th><a href="http://www.mentorcard.de/backend/web/index.php?r=students%2Findex&amp;sort=last_name" data-sort="last_name"><?php echo $posts1002[0]['last_name']?></a>
</th><th><a href="http://www.mentorcard.de/backend/web/index.php?r=students%2Findex&amp;sort=country" data-sort="country"><?php echo $posts1002[0]['country']?></a></th>
<th><a href="http://www.mentorcard.de/backend/web/index.php?r=students%2Findex&amp;sort=categor" data-sort="categor"><?php echo $posts1002[0]['category']?></a></th><th>
<a href="http://www.mentorcard.de/backend/web/index.php?r=students%2Findex&amp;sort=phone_number" data-sort="phone_number"><?php echo $posts1002[0]['phone_number']?></a>
</th><th><a href="http://www.mentorcard.de/backend/web/index.php?r=students%2Findex&amp;sort=email" data-sort="email"><?php echo $posts1002[0]['email']?></a></th>
</tr>
</thead>
<tbody>

<?php 




foreach($posts5 as $role):

    $posts6 = Yii::$app->db->createCommand('SELECT * FROM stud_res WHERE username="'.$role['username'].'"')->queryAll();


    echo "
    
    <tr data-key='4'>
<td>".$x_count."</td>
<td>".$role['username']."</td>
<td>".$role['first_name']."</td>
<td>".$role['last_name']."</td>
<td>".$role['place_birth']."</td>
<td>".$role['categor']."</td>
<td>".$role['phone_number']."</td>
<td><a href='mailto:".$role['email']."'>".$role['email']."</a></td>
<td></td>
<td></td>
<td><a href='http://www.mentorcard.de/backend/web/index.php?r=students%2Fview&amp;id=".$role['id']."' title='View' aria-label='View' data-pjax='0'>
<span class='glyphicon glyphicon-eye-open'></span>
</a> </td></tr>
    
    ";

    $x_count++;

endforeach;

?>

</tbody>

</table>
</div>



    </div></div>
    </section>