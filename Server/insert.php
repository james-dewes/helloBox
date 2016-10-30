<?php
<<<<<<< HEAD
function insertData ($link,$video, $audio, $text, $length){
  $sql = "INSERT INTO root(
=======
function insertData ($video, $audio, $text, $length){
  echo 'Uploading video';
  $sql = "INSERT INTO root
    (
>>>>>>> 2e973800de57b0a812ac12b5f2ac58c1e7859c8c
    `video`
    ,`audio`
    ,`text`
    ,`length`
    ,`timestamp`
    )
    VALUES (
<<<<<<< HEAD
      '$video'
      ,'$audio'
      ,'$text'
      ,'$length'
=======
      $video
      ,$audio
      ,$text
      ,$length
>>>>>>> 2e973800de57b0a812ac12b5f2ac58c1e7859c8c
      ,CURRENT_TIMESTAMP
    )";

  mysql_select_db('helloBox');
  $retval = mysql_query( $sql, $link );

   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
}
?>
