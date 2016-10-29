<?php
$link = mysql_connect('192.168.226.240', 'root', 'summit123');
function connect(
  global $link;
  if (!$link) {
      die('Could not connect: ' . mysql_error());
  }
  echo 'Connected successfully';
)

function disconnect(
  global $link;
  mysql_close($link);
)
?>
