<?php
//This code adds comments to results
include '../../config.php';
//Makes rating be withing 1 to 5 and checks to make sure that it is a number

$rating = mysql_real_escape_string($_POST['rating']);

if (is_numeric ($rating)) 
{
    if ($rating > "5") {
        $newRating = "5";
    }
    else {
        $newRating = $rating;
    }
}

else {
$newRating = "5";
}
if($_POST['comment'] == "")
    {
      echo "<script>window.location = 'http://www.resultsync.com/result.php?id=".$_GET['id']."'</script>";

    }
    else {
        //Adds Comment into Database
        $sql = "INSERT INTO comments (resultId, userId, comment, rating) VALUES ('" . mysql_real_escape_string($_GET['id']) . "',
        '" . getUserId() . "','" . mysql_real_escape_string($_POST['comment']) . "',
        '" . $newRating . "')";
        
        mysql_query ($sql);
        //Emails Result Owner notifying them that someone has commented on their Result
        
        $getUser =  "SELECT userid, title FROM results WHERE id=". mysql_real_escape_string($_GET['id']);
        $user = mysql_query ($getUser);
        $row = mysql_fetch_assoc($user);
        
        $getUserEmail = "SELECT email FROM users WHERE id=".$row['userid'];
        $email = mysql_query ($getUserEmail);
        $rowTwo = mysql_fetch_assoc($email);
        
        $emailTo = $rowTwo['email'];
        $title = "Coment on your result: " .$row['title'] ;
        $message = 'Another ResultSync User has commented on your result: '.$row['title'] .'. Check it out at: www.resultsync.com/result.php?id='.$_GET['id'].'. Please notify ResultSync if this comment is profain or if it violates our terms and condionts so that we can remove it. You can contact us at info@resultsync.com, thank you for sharing your result! ';
        $headers = 'From: no-reply@resultsync.com' . "\r\n" .
        'Reply-To: no-reply@resultsync.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        mail($emailTo, $title, $message, $headers);
        
        
        //Returns User to Result displaying newly added comment
        
        echo "<script>window.location = 'http://www.resultsync.com/result.php?id=".$_GET['id']."'</script>";
    }

?>