<?php
function getLastIndex ($link){
  $sql = "SELECT MAX(`index`) FROM `root`;";

  mysql_select_db('helloBox');
  $retval = mysql_query( $sql, $link );

   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
 return $retval;
}
?>
