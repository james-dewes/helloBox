<?php
$link = mysql_connect('localhost', 'root', 'summit123');
function connect(){
  global $link;
  if (!$link) {
      die('Could not connect: ' . mysql_error());
  }
}

function disconnect() {
  global $link;
  mysql_close($link);
}
?>
