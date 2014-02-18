<?php
//This code logs a user in.
include_once '../../config.php';
$password = $_POST['pass'];
// SQL Stuff: extract password from database and save to $passwordFromDatabase here
$sql = "SELECT * FROM `users` WHERE email='" . mysql_real_escape_string($_POST['email']) . "'";
$result = mysql_query($sql, $connection) or die(mysql_error());
$_SESSION['userid'] = false;
while($array = mysql_fetch_array($result)) {
  $userId = $array['id'];
  $passwordFromDatabase = $array['password'];
}
// Verifys passsword integrety and logs user in
if (crypt($password, $passwordFromDatabase) == $passwordFromDatabase) {
   $_SESSION['userid'] = $userId;
   $date = time();
   mysql_query("UPDATE users SET lastLogin=$date WHERE id= $userId ");
   header ("location: /index.php");
}
else{
  header ("location: /loginerror.php");
}

