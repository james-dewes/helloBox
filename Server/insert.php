<?php
function insertData ($video, $audio, $text, $length){
  echo 'Uploading video';
  $sql = 'INSERT INTO root '.
    "(
    `video`
    ,`audio`
    ,`text`
    ,`length`
    ,`timestamp`
    )'.
    'VALUES (
      $video
      ,$audio
      ,$text
      ,$length
      ,CURRENT_TIMESTAMP
    )";

  mysql_select_db('helloBox');
  $retval = mysql_query( $sql, $link );

   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }

  echo 'Finished uploading video';
}
?>
