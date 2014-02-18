<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Result Sync | Result Added</title>
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
            <h1>Your Result was succesfully added!</h1><br><br>
            <h2>You can now manage your result by clicking "MY RESULTS" on the menu bar.</h2><br><br>
            <p>Please note that if your result violates the resultsync.com terms and conditions it will be removed.</p>
           
            
        </div>
        <div id="footer">
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
 
</body>

</html>