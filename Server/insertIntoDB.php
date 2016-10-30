<?php
require_once ('../connector.php');
require_once ('../insert.php');

connect();
//GET DATA FROM THE GLOBAL POST Array
#check for our api key
if(isset($_POST['key']) && $_POST['key']='summit123'){
  //then its james
  echo "I hear you james";
  $videoName = (isset($_POST['vn'])?$_POST['vn']:'');
  $audioName = (isset($_POST['an'])?$_POST['an']:'');
  if($vn !='' && $an !=''){
    //better store it in the db
    insertData($videoName, $audioName, 'hello', 30);
  }
}
disconnect();
