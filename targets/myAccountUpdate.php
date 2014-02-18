<?php
include "../includes/config.php";

/*
if(isset($_POST['newsletter']))
    $newsletter = 1;
else
    $newsletter = 0;
*/
//$newsletter = isset($_POST['newsletter']) ? 1 : 0;

$sql=("UPDATE users SET fname='". mysql_real_escape_string($_POST['fname']) ."', lname='". mysql_real_escape_string($_POST['lname']) ."',
      age='". mysql_real_escape_string($_POST['age']) ."', sex='". mysql_real_escape_string($_POST['sex']) ."',
      fakeName='". mysql_real_escape_string($_POST['fakeName']) ."', alternateEmail='". mysql_real_escape_string($_POST['alternateEmail']) ."',
      newsletter='". mysql_real_escape_string($_POST['newsletter']) ."' WHERE id=" .getUserId());

mysql_query($sql);

header ("location: /myAccount.php");
?>