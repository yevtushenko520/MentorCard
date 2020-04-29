<?php
use marekpetras\yii2ajaxboxwidget\Box;
use wokster\ltewidgets\BoxWidget;
use yii\widgets\DetailView;
use yii\grid\GridView;



?>



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



    <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name <b style="color:red">*</b></label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Product Code</label>
                  <input type="text" class="form-control"  style="width: 500px;" >
                </div>
            

            <div class="row">
  <div class="col-sm-3 col-md-3">
  
  <div class="form-group">
                  <label for="exampleInputPassword1">Net Price <b style="color:red">*</b></label>
                  <input type="text" class="form-control"   >
                </div>

  </div>
  <div class="col-sm-3 col-md-3">
  
  <div class="form-group">
                  <label for="exampleInputPassword1">TAX</label>
                  <input type="text" class="form-control"   >
                </div>
  
  </div>
  <div class="col-sm-3 col-md-3">
  
  <div class="form-group">
                  <label for="exampleInputPassword1">Gross Price</label>
                  <input type="text" class="form-control"   >
                </div>
  
  </div>
  <div class="col-sm-3 col-md-3">
  
  <div class="form-group">
                  <label for="exampleInputPassword1">Currency</label>
                  <input type="text" class="form-control"  value="EUR" disabled>
                </div>
  
  </div>
</div>



<div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="3" ></textarea>
                </div>
               
              </div>



              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Create</button>
              </div>

     <?php BoxWidget::end();?>