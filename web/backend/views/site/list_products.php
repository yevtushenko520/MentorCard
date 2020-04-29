<?php
use marekpetras\yii2ajaxboxwidget\Box;
use wokster\ltewidgets\BoxWidget;
use yii\widgets\DetailView;
use yii\grid\GridView;



?>
<a href="http://www.mentorcard.de/backend/web/index.php?r=site%2Fproducts">
<button type="submit" class="btn btn-primary" style="margin-bottom:5px;" >Create New</button></a>

<?php BoxWidget::begin([
        'title' => "Create Product", //string    
        'border' => false,       //boolean
        'color' => 'default',     //bootstrap color name 'success', 'danger' еtс.
        'solid' => false,        //boolean
        'padding' => true,       //boolean
        'footer' => false,       //boolean or html to render footer
        'collapse' => false,      //boolean Default AdminLTE button for collapse box
             //boolean Default AdminLTE button for remove box
        'hide' => false,         //boolean collapsed or not
        'buttons' => [           //array with config to add custom buttons or links
        ],   //boolean or html to render footer
        
    ]);
    ?>



    
    <table class="table table-hover" >
                <tbody><tr>
                  <th>Name</th>
                  <th>Product Code</th>
                  <th>Net Price</th>
                  <th>TAX</th>
                  <th>Gross Price</th>
                  <th>Description</th>
                  <th></th>
                </tr>
              
                <tr>
                <td>123</td>
                
                  <td>123</td>
                  <td>123</td>
                  <td>
                 123</td>
                  <td>123</td>
                 
                  <td id="buton">
                  
                  <a class="btn btn-social-icon btn-success " style=""  ><i class="fa fa-eye"></i></a>

                  <a class="btn btn-social-icon btn-warning " style=""  ><i class="fa fa-edit "></i></a>
                  
                  <a class="btn btn-social-icon  " style="background-color: #dd4b39;border-color: #d73925;color:#fff;margin-left:3px;"   title="Delete" aria-label="Delete" data-pjax="0" data-confirm="Are you sure you want to delete this item?" data-method="post"><i class="fa fa-remove "></i></a>


                </td>
                
                </tr>
                

                  
              </tbody></table>


    
    <?php BoxWidget::end();?>