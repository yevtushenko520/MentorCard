<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ActiveCodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Active Codes');
$this->params['breadcrumbs'][] = $this->title;

if(Yii::$app->user->identity->username ==null){

    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
    die();
  
  }else{
  
  }

  
if(Yii::$app->user->identity->role!=1){

    header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

}else{

}


$posts5111 = Yii::$app->db->createCommand('SELECT * FROM price ')->queryAll();

?>


<div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Price
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                   

<div class="frontend-langs-index">

<div id="w0" class="grid-view">
<table class="table table-striped table-bordered"><thead>

</thead>
<tbody>

<?php

$x = 0;

foreach($posts5111 as $kola):
  
  $x++;

  ?>




      <p><b>price:</b><br>
   <input type="text" size="40" id="email" value="<?php echo $kola['price']?>">
  </p>
 

</td></tr>

<?php endforeach;?>



</tbody></table>
<button type="button" style="margin:15px;" onclick="update()" class="btn btn-success">Update</button>
</div>

                    </div>
                  </div>
                </div>
                
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    Active Code
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">



  <button type="submit" name="submit"  onclick="closeNav()" class="btn btn-success">Create Active Code
                        </button>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'code',
            'status',
            'student',
            'res',

           
        ],
    ]); ?>


<script>
function update(){

$.ajax({
    url: 'index.php?r=site/mock_end',
    type: "POST",
    data: {
        price:document.getElementById('email').value,
        coc:3
    },
    success: function(res){


if(res =="yes"){

  console.log(res);

  alert('Price Update!');
  
 

}else {

  alert('No');
  console.log(res);
}




},

error: function(){

alert('Error!');

}
})


}
</script>



    <script>
function closeNav() {

    var preload = document.createElement('div');

preload.className = "preloader";
preload.innerHTML = '<div class="b-ico-preloader"></div><div class="spinner"></div>';
document.body.appendChild(preload);

window.addEventListener('load', function() {
  // Uncomment to fade preloader after document load
  // preload.className +=  ' fade';
  setTimeout(function(){
      preload.style.display = 'none';
   },2000);
})


 $.ajax({
url: 'index.php?r=active-code',
type: "POST",
data: {

    coc:1

},
success: function(res){


if(res =="yes"){

console.log(res);

location.reload();


}else{

console.log(res);
}

},

error: function(){

alert('Error!');

}
})



document.getElementById("myNav").style.width = "0%";


}
</script>
  </div>
                  </div>
                </div>
