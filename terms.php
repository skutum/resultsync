<?php include '../config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Result Sync | Terms and Conditions</title>
<style type="text/css" media="all">@import "css/master.css";</style>
<style type="text/css" media="all">@import "css/master.css";</style>
<SCRIPT LANGUAGE="JavaScript" SRC="js/sidebar.js"></SCRIPT>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<meta name="author" content="Tyler Robinson">
<meta name="description" content="This is the Terms and Conditions Page of ResultSync">
<meta name="keywords" content="Share Acomplishments, Share Results, Result Sync, ResultSync, share achievments, ResultSync Terms and Conditions">
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
            <h2>ResultSync - Terms and Conditions</h2>
            <p>
                <br><br>
                Terms and Conditions last updated 8/19/12. 
                <br><br>
                - Copyrighted or Patented Material shall not be submitted on resultsync.com if you are not the patent or copyright holder.
                <br><br>
                - Pornographic or Sexual Material of any kind shall not be submitted on resultsync.com
                <br><br>
                - resultsync.com reserves the right to remove any submitted material that does not meet these terms.
                <br><br>
                - As a resultsync user you are granted the option of deleting your account with us, by sending an email to <a href="mailto:info@resultsync.com">info@resultsync.com</a>.
                <br><br>
                - Users should read these terms and conditions often as they may change and be updated.
                <br><br>
                - Results for the Top 9 are selected based on the number of views and the rating of the result.
                <br><br>
                - Profanity and Foul Language is not permitted on resultsync.com, results or comments containing such content will be removed.
                <br><br>
                - Comments should be accurate and descriptive but not degrading, please treat everyone nice or your comment will be removed. There are nice ways to critique.
                <br><br>
                - Illegal, Hacking, and Crime related results are not allowed on reslutsync.com.
                <br><br>
                - Rating is based on 1-5 stars, 5 stars is the best and 1 star is the worst. Ratings are calculated by a users rating input when commenting on results
                The overall rating of a result is the average of those rating comments.
            </p>
            
        </div>
        <div id="footer">
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
 
</body>

</html>