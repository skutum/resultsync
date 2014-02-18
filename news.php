<?php
include '../config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Result Sync | ResultSync NEWS</title>
<style type="text/css" media="all">@import "css/master.css";</style>
<style type="text/css" media="all">@import "css/master.css";</style>
<SCRIPT LANGUAGE="JavaScript" SRC="js/sidebar.js"></SCRIPT>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
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
            <h2>ResultSync - News</h2>
            <p>
                <br><br>
                I figured I should let you all know the changes that I make to the site, so here is a log of what I'm getting done: 
                <br><br>
                - Nov 15, 2012 - Today I finished the comments system it now displays the latest 3 comments on a result at the bottom of the result.
                <br><br>
                - Nov 11, 2012 - Today I added the ability to comment and rate a result, it is fully functional however it does not display the comments that have been made
                on the result page yet. But it is storing the comments and rating in the database, so if you make comments they will be recorded. Also the rating system is
                working and does display on the page. The rating is the average of all the ratings that have been made. I should be able to get the comments displaying by the
                end of this week.<br><br>
                - Oct 27, 2012 - Today I added the suggestions page. It is so that people can offer me suggestions on additional features for the site. You can also use the
                suggestions form to inform me of any grammatical or technical errors on the site. I would also appreciate it if you would let me know of any additions that
                you would like added onto the site. <br><br>
                - Oct 25, 2012 - Today I made the search feature work on the website so now you can search for results. I also added pagination to the My Results area and
                the saved results area. <br><br>
                - Oct 12, 2012 - Today I fixed a bunch of crap in Internet Explorer so the site should work with IE 8 and above now, if you cross your fingers and knock on
                some hardwood. Everything displays nice now in there or nicer I should say. Its actually workable now whereas before it wasn't. If you are unable to save,
                delete or edit a result, please make sure that you have java script enabled and installed. Or be a real man and download a real man's browser, like chrome
                or Firefox. I also updated some security loop holes today so the site should be even more secure now. <br><br>
                
                - Oct 10, 2012 - Today I updated the My Account area and now users can update their account information such as name, gender, age, etc. I also made updates
                to the edit results page so that the categories populate with the last selected categories by default. Also fixed a few bugs in the program. Coming next
                will be the comments area for results and the ability for users to rate results. Down the road I'm looking into redesigning the way a user adds categories
                for their result by creating sub categories selections and stuff. Also coming soon will be the search feature.<br><br>
                
                - Oct 9, 2012 - Today I created the page for editing a result. It seems to be working great, I have one issue with the categories not populating which I will
                get worked out, but it does work and a user can now edit a result that they have uploaded. I also added a counter to count the number of views on a result.
                I added the Aeronautics and Construction Categories. <br><br>
                
                - Oct 1, 2012 - Today I added the news page, it will keep you all informed of the updates and changes that I'm making to the site!
                I also added the Facebook recommend button and twitter tweet button to the result page. So now you can share your favorite results with
                all your friends. I also fixed some bugs with the addResult page where it was not displaying correctly in some browsers, ugh IE gives me headaches!!!
                Users area still has issues in IE, I'll work on them some other night.<br><br>
                

                
            </p>
            
        </div>
        <div id="footer">
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
 
</body>

</html>