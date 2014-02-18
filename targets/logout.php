<?php
//This code links with the logout button on menu.php in the includes folder, it logs a user out.
include '../../config.php';
$_SESSION = array();
header('location: /');
?>