<?php
include 'includes/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Result Sync | Suggestions</title>
<style type="text/css" media="all">@import "css/master.css";</style>
<style type="text/css" media="all">@import "css/master.css";</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<SCRIPT LANGUAGE="JavaScript" SRC="js/sidebar.js"></SCRIPT>
<meta name="author" content="Tyler Robinson">
<meta name="description" content="This is the news page for resultSync, it will keep you up to date and informed of any changes we make to this great site.">
<meta name="keywords" content="Share Acomplishments, Share Results, Result Sync, ResultSync, share achievments, ResultSync News">
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
            <h1>ResultSync - Suggestions</h1><br><br>
            <h2>ResultSync is always looking to improve the site, we would like to hear from you about any updates you would like to have done to the site. If you
            encounter any errors on the site whether they be grammatical or technical we would love to hear about them. Also if you feel like a certain category needs
            to be added please let us know. We are looking to make this an awesome user friendly site and we can do it with your help, so your comments are
            appreciated! We value your input and will work as fast as possible to update the site to your requests.</h2><br><br>

            <?php
                if ($_GET["sent"]=='1') { 
                ?> 
                <h2>Your suggestion was sent</h2>
                <?php 
                } else { 
                ?> 
                <form action="targets/suggestions.php" class="suggestions" method="post">
                    <h2>Name: </h2><br>
                    <input class="suggestions" name="name" type="text"></input><br><br>
                    <h2>Email:</h2><br>
                    <input class="suggestions" name="email" type="text"></input><br><br>
                    <h2>Suggestions: </h2><br>
                    <textarea cols="30" rows="15" name="suggestion"></textarea><br><br>
                    <input type="submit" value="Send Suggestion" ></input>
                </form>
                <?php 
                }; 
                ?>
                        </div>
        <div id="footer">
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
 
</body>

</html>