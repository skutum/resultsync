<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Result Sync | Sign Up</title>
<style type="text/css" media="all">@import "css/master.css";</style>
<style type="text/css" media="all">@import "css/master.css";</style>
<SCRIPT LANGUAGE="JavaScript" SRC="js/sidebar.js"></SCRIPT>
<?php include 'includes/signupformcheck.php'; ?>
<?php include 'includes/loginformcheck.php' ; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
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
         <form id="signupform" action=targets/signup.php method="post">
                <h2>Sign Up NOW!</h2>
                <br><br>
                <label>Email: </label>
                <input id="email" type="text" class="rounded" name="email" placeholder="me@example.com"/>
                <label>Password: </label>
                <input id="pass" type="password" class="rounded" name="pass" />
                <label>First Name: </label>
                <input id="fname" type="text" class="rounded" name="fname" />
                <label>Last Name: </label>
                <input id="lname" type="text" class="rounded" name="lname" />
                <input type="submit" class="sbutton" value="Sign Up" />
                <br><br><br><br>
                <span>By clicking "Sign Up" you are agreeing to the resultsync.com terms and conditions.</span>
            </form>
                <p>
                                <br><br>
                                Have you ever made up a new recipe, built a custom house, modified something on your car, created something new and exciting? With ResultSync you can share
                                your creativity with others. Simply create an account, upload pictures, diagrams, videos, and write a description of your result and you'll be sharing
                                your creativity with others in no time!
                                <br><br>
                                Result sync is your source for finding a great way to accomplish a project and a great way to share your creative concepts with others.
                                Result Sync lets you share the outcome of a project that you finish. Sharing your results helps others work more efficiently!
                                Upload pictures, and post videos from YouTube of your completed project and give a description of what you did.
                                Publish your completed projects to Facebook and Twitter. If you've designed a product and your selling it on eBay or amazon you can
                                add a link to your eBay or amazon listing. 
                                
                </p>
        </div>
        <div id="footer">
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
 
</body>

</html>

