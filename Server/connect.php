<?php
$link = mysql_connect('192.168.226.240', 'root', 'summit123');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);
?>
