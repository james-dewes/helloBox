<?php
require_once ('connector.php');
require_once ('insert.php');
require_once('lastIndex.php');

connect();
//GET DATA FROM THE GLOBAL POST Array
#check for our api key
if(isset($_POST['key']) && $_POST['key']='summit123'){
  //then its james
  $videoName = (isset($_POST['vn'])?$_POST['vn']:'');
  $audioName = (isset($_POST['an'])?$_POST['an']:'');
  if($vn !='' && $an !=''){
    //better store it in the db
    //connector link (obj), videoName (str), audioName(str), audioText(str), totalLengh (int)
    insertData($link,$videoName, $audioName, 'hello', 30);
    //get the number of the db index so we can use this as the file name
    $index = getLastIndex($link);
    move_uploaded_file($_FILES['uploaded_file'], '/path/to/destination/' . $index . '.zip');

    //work out the response file
    echo getResponse($link,'hello');
  }
}
disconnect();
