<?php
include '../includes/config.php';
$sql = "DELETE FROM savedResults WHERE saveId=". $_GET['id'];
mysql_query($sql);

?>