<?php
function getLastIndex ($link){
  $sql = "SELECT MAX(index)";

  mysql_select_db('helloBox');
  $retval = mysql_query( $sql, $link );

   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
 return $retval;
}
?>