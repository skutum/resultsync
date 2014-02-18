<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Result Sync | Log In</title>
<style type="text/css" media="all">@import "css/master.css";</style>
<style type="text/css" media="all">@import "css/master.css";</style>
<SCRIPT LANGUAGE="JavaScript" SRC="js/sidebar.js"></SCRIPT>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<?php include 'includes/loginformcheck.php' ; ?>
</head>

<body>
    <div id="suggestPost"><a href="http://resultsync.com/suggestions.php?sent=0" ></a></div>
    <div id="page-container">
        <?php include 'includes/header.php'; ?>
        <div id="login-bar">
        <?php
                if(isLoggedIn())
                    include 'includes/menu.php';
                else
                    include 'includes/login.php';
        ?>
        </div>
        <div id="sidebar-a">
            <?php include 'includes/sidebar.php'; ?>
        </div>
        <div id="content">
            <h1>Thank Your for Signing Up!</h1><br><br>
            <h2>We hope you enjoy using ResultSync</h2><br><br>
            <p>As a registered user you can now upload and post your own results and share them with the world. Please
            review our terms and conditions so that you don't post anything that is in violation to them. Once again on
            behalf of the ResultSync Team thank you for becoming a member!</p>
           
            
        </div>
        <div id="footer">
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
 
</body>

</html>