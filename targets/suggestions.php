<?php 
$ToEmail = 'robinsont@skutum.com'; 
$EmailSubject = 'Suggestion for ResultSync'; 
$mailheader = "From: ".$_POST['email']."\r\n"; 
$mailheader .= "Reply-To: ".$_POST['email']."\r\n"; 
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$MESSAGE_BODY = "Sent By: ".$_POST['name']."<br><br>Suggestion: ".nl2br($_POST['suggestion'])."";
mail('info@resultsync.com', 'Suggestion for ResultSync', $MESSAGE_BODY, $mailheader);
echo "<script> window.location = 'http://resultsync.com/suggestions.php?sent=1'</script>";
?>