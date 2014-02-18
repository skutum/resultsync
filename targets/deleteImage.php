<?php
include '../includes/config.php';

$query = "SELECT imageOne, imageTwo, imageThree  FROM  `results` WHERE id=". $_GET['id'];
$result = mysql_query($query);
$row = mysql_fetch_assoc($result);

if($_GET['where'] == 'imageOne'){
unlink('../img/results/'.$row['imageOne']);
unlink('../img/results/thumbnails/'.$row['imageOne']);
mysql_query("UPDATE results SET imageOne='' WHERE id=". $_GET['id']);
}
if($_GET['where'] == 'imageTwo'){
unlink('../img/results/'.$row['imageTwo']);
unlink('../img/results/thumbnails/'.$row['imageTwo']);
mysql_query("UPDATE results SET imageTwo='' WHERE id=". $_GET['id']);
}
if($_GET['where'] == 'imageThree'){
unlink('../img/results/'.$row['imageThree']);
unlink('../img/results/thumbnails/'.$row['imageThree']);
mysql_query("UPDATE results SET imageThree='' WHERE id=". $_GET['id']);
}

?>