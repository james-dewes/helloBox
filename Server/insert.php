<?php
function insertData (){
  echo 'Uploading video';
  $sql = 'INSERT INTO root '.
    '(
    `video`
    ,`audio`
    ,`text`
    ,`length`
    ,`timestamp`
    )'.
    'VALUES (
      "link1"
      ,"link2"
      ,"link3"
      ,45
      ,CURRENT_TIMESTAMP
    )';

  mysql_select_db('helloBox');
  $retval = mysql_query( $sql, $link );

   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }

  echo 'Finished uploading video';
}
?>
