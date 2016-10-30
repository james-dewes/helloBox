<<?php
function getResponse($link,$text){
  $sql = "SELECT * from root WHERE `text` LIKE '$text'";
  mysql_select_db('helloBox');
  $retval = mysql_query( $sql, $link );

   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
if(is_array($retval)){
  //choose a random response
  $choices = count($retval);
  $retval = $retval[rand(0,$choices-1)];

}

 return $retval;
}
 ?>
