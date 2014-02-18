<?php
include '../../config.php';

if(isLoggedIn()) {
    
mysql_query("INSERT INTO savedResults  (userId, resultId) VALUES ('" . getUserId() . "', '" . mysql_real_escape_string($_GET['id']) . "')");
}
else {
    
}
?>