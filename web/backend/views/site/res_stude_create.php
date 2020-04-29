<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use wokster\ltewidgets\BoxWidget;
/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $form yii\widgets\ActiveForm */

if(Yii::$app->user->identity->username ==null){

    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
    die();
  
  }else{
  
  }

  
?>

<script>

    $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

<section class="content">
                <div class="students-create">

    <h1></h1>
 

<div class="box box-success box-solid" data-widget="box-widget"><div class="box-header with-border"><h3 class="box-title">Fill the form</h3><div class="box-tools pull-right"></div></div><div class="box-body">
    <form id="w0" action="http://www.mentorcard.de/backend/web/index.php?r=students%2Fcreate" method="post">
<input type="hidden" name="_csrf-backend" value="UR9myboT18Vg64eJkzyGJD0OtXjxOAqQQ97zgXiEcesidSmIjlbv9wKgyvHGcs5cX3zaDcBfaNkEucf3J8wprg==">
    <div class="form-group field-students-username required has-success">
<label class="control-label" for="students-username">Username</label>
<input type="text" id="students-username" class="form-control" name="Students[username]" maxlength="255" aria-required="true" aria-invalid="false">

<div class="help-block"></div>
</div>
    <div class="form-group field-students-first_name required">
<label class="control-label" for="students-first_name">First Name</label>
<input type="text" id="students-first_name" class="form-control" name="Students[first_name]" maxlength="255" placeholder="First Name..." aria-required="true">

<div class="help-block"></div>
</div>
<div class="form-group field-students-last_name required">
<label class="control-label" for="students-last_name">Last Name</label>
<input type="text" id="students-last_name" class="form-control" name="Students[last_name]" maxlength="255" placeholder="Last Name..." aria-required="true">

<div class="help-block"></div>
</div>
<div class="form-group field-students-password required has-success">
<label class="control-label" for="students-password">Password</label>
<input type="password" id="students-password" class="form-control" name="Students[password]" maxlength="50" aria-required="true" aria-invalid="false">

<div class="help-block"></div>
</div>


<p>Date: <input type="text" id="datepicker"></p>



    <div class="form-group field-students-place_birth required">
<label class="control-label" for="students-place_birth">Place Birth</label>
<input type="text" id="students-place_birth" class="form-control" name="Students[place_birth]" maxlength="255" placeholder="Place..." aria-required="true">

<div class="help-block"></div>
</div>
    <div class="form-group field-students-country required">
<label class="control-label" for="students-country">Country</label>
<input type="text" id="students-country" class="form-control" name="Students[country]" maxlength="255" placeholder="Country..." aria-required="true">

<div class="help-block"></div>
</div>
    <div class="form-group field-students-phone_number required">
<label class="control-label" for="students-phone_number">Phone Number</label>
<input type="text" id="students-phone_number" class="form-control" name="Students[phone_number]" maxlength="255" placeholder="+12345..." aria-required="true">

<div class="help-block"></div>
</div>
    <div class="form-group field-students-email required">
<label class="control-label" for="students-email">Email</label>
<input type="text" id="students-email" class="form-control" name="Students[email]" maxlength="255" placeholder="example@emai..." aria-required="true">

<div class="help-block"></div>
</div>
 <div class="form-group field-students-categor required">
<label class="control-label" for="students-categor">Categor</label>
<input type="text" id="students-categor" class="form-control" name="Students[categor]" maxlength="255" aria-required="true">

<div class="help-block"></div>
</div>
  <div class="form-group field-students-langs_array">
<label class="control-label" for="students-langs_array">Lang Study</label>
<span id="parent-s2-togall-students-langs_array" style="display:none"><span id="s2-togall-students-langs_array" class="s2-togall-button s2-togall-select"><span class="s2-select-label"><i class="glyphicon glyphicon-unchecked"></i>Select all</span><span class="s2-unselect-label"><i class="glyphicon glyphicon-check"></i>Unselect all</span></span></span><input type="hidden" name="Students[langs_array]" value=""><select id="students-langs_array" class="form-control select2-hidden-accessible" name="Students[langs_array][]" multiple="" size="4" data-s2-options="s2options_c4acac00" data-krajee-select2="select2_0c3c4282" style="display:none" tabindex="-1" aria-hidden="true">
<option value="5">CROATIAN</option>
<option value="1">ENGLISH</option>
<option value="7">FRENCH</option>
<option value="2">GERMAN</option>
<option value="12">GREEK</option>
<option value="14">HINDI</option>
<option value="4">ITALIAN</option>
<option value="9">POLISH</option>
<option value="8">PORTUGESE</option>
<option value="13">PUNJABI</option>
<option value="10">ROMANIAN</option>
<option value="11">RUSSIAN</option>
<option value="6">SPANISH</option>
<option value="3">TURKISH</option>
</select><span class="select2 select2-container select2-container--krajee" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Select a state ..." style="width: 1191.48px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

<div class="help-block"></div>
</div>
 <div class="form-group field-students-lang_array">
<label class="control-label" for="students-lang_array">Lang Write</label>
<span id="parent-s2-togall-students-lang_array" style="display:none"><span id="s2-togall-students-lang_array" class="s2-togall-button s2-togall-select"><span class="s2-select-label"><i class="glyphicon glyphicon-unchecked"></i>Select all</span><span class="s2-unselect-label"><i class="glyphicon glyphicon-check"></i>Unselect all</span></span></span><input type="hidden" name="Students[lang_array]" value=""><select id="students-lang_array" class="form-control select2-hidden-accessible" name="Students[lang_array][]" multiple="" size="4" data-s2-options="s2options_c4acac00" data-krajee-select2="select2_0c3c4282" style="display:none" tabindex="-1" aria-hidden="true">
<option value="5">CROATIAN</option>
<option value="1">ENGLISH</option>
<option value="7">FRENCH</option>
<option value="2">GERMAN</option>
<option value="12">GREEK</option>
<option value="14">HINDI</option>
<option value="4">ITALIAN</option>
<option value="9">POLISH</option>
<option value="8">PORTUGESE</option>
<option value="13">PUNJABI</option>
<option value="10">ROMANIAN</option>
<option value="11">RUSSIAN</option>
<option value="6">SPANISH</option>
<option value="3">TURKISH</option>
</select><span class="select2 select2-container select2-container--krajee" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Select a state ..." style="width: 1191.48px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

<div class="help-block"></div>
</div>
    <div class="form-group field-students-activation_code">
<label class="control-label" for="students-activation_code">Activation Code</label>
<input type="text" id="students-activation_code" class="form-control" name="Students[activation_code]">

<div class="help-block"></div>
</div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Save</button>    </div>

    </form>
</div></div>
</div>    </section>