<?php
//This code prints a welcome user on menu bar. Linked to menu.php in includes
include_once 'includes/config.php';
$sql = "SELECT * FROM `users` WHERE id='" . getuserid() . "'";
$result = mysql_query($sql, $connection) or die(mysql_error());

while($array = mysql_fetch_array($result)) {
    $fname = $array['fname'];
    $lname = $array['lname'];
}
$name = substr("$fname", 0, +10);

echo '<h3>';
echo ("Welcome " .$name);
echo '</h3>';
