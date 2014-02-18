<?php include '../config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Result Sync | Share Your Creativity</title>
<style type="text/css" media="all">@import "css/master.css";</style>
<style type="text/css" media="all">@import "css/master.css";</style>
<SCRIPT LANGUAGE="JavaScript" SRC="js/sidebar.js"></SCRIPT>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<meta name="author" content="Tyler Robinson">
<meta name="description" content="ResultSync is a website for sharing things that you accomplish, sharing results and outcomes of projects that you complete. It is also where you can find ideas on how to achieve great things!">
<meta name="keywords" content="Share Acomplishments, Share Results, Result Sync, ResultSync, share achievments">
<?php include 'includes/loginformcheck.php' ; ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35905992-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
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
            <?php include 'includes/slider.php'; ?>
            <?php include 'includes/main.php'; ?>
            <h5>
                Welcome to ResultSync, share your creativity by uploading your own accomplishments. Learn a great new way to achieve something by viewing the results of others.
                ResultSync is a place where everyone can share projects that they have completed with the world. 
            </h5>
        </div>
        <div id="footer">
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
 
</body>

</html>