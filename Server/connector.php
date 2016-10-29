<?php
$link = mysql_connect('192.168.226.240', 'root', 'summit123');
function connect(
  glob $link;
  if (!$link) {
      die('Could not connect: ' . mysql_error());
  }
  echo 'Connected successfully';
)

function disconnect(
  glob $link;
  mysql_close($link);
)
?>
