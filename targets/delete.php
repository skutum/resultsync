<?php
include '../../config.php';

$query = "SELECT imageOne, imageTwo, imageThree FROM  `results` WHERE id=". $_GET['id'];
$result = mysql_query($query);
$row = mysql_fetch_assoc($result);

if($row['imageOne'] != ''){
unlink('../img/results/'.$row['imageOne']);
unlink('../img/results/thumbnails/'.$row['imageOne']);
}
if($row['imageTwo'] != ''){
unlink('../img/results/'.$row['imageTwo']);
unlink('../img/results/thumbnails/'.$row['imageTwo']);
}
if($row['imageThree'] != ''){
unlink('../img/results/'.$row['imageThree']);
unlink('../img/results/thumbnails/'.$row['imageThree']);
}

mysql_query("DELETE FROM results WHERE id=". $_GET['id']);
mysql_query("DELETE FROM savedResults WHERE resultId=". $_GET['id'])

?>