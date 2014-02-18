<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Result Sync | ResultSync Top 9</title>
<style type="text/css" media="all">@import "css/master.css";</style>
<style type="text/css" media="all">@import "css/master.css";</style>
<SCRIPT LANGUAGE="JavaScript" SRC="js/sidebar.js"></SCRIPT>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<meta name="author" content="Tyler Robinson">
<meta name="description" content="The Top 9 nine results of resultsync are displayed on this page.">
<meta name="keywords" content="Share Acomplishments, Share Results, Result Sync, ResultSync, share achievments, ResultSync Top Nine, Top 9">
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
            <h1>ResultSync Top 9</h1><br><br>
            <?php
                $query = "SELECT id, title, imageOne, numberOfViews, rating FROM  `results` ORDER BY  `numberOfViews` DESC LIMIT 9";
                $result = mysql_query($query);
                while($row = mysql_fetch_array($result)) { ?>
                    <a href="http://resultsync.com/result.php?id=<?php echo $row['id']; ?>">
                    <div id="result">
                            <img src="http://resultsync.com/img/results/thumbnails/<?php echo $row['imageOne']; ?>" class="boximage">
                            <h2><?php echo $row['title']; ?></h2>
                            <h3> | Views: </h3><p><?php echo $row['numberOfViews']; ?></p>
                            <h3> | Rating: </h3>
                            <?php for ($i = 0; $i < $row['rating']; $i++) //$starsCount is a DB value 
                                echo('<img src="/img/star.png" alt="*" title="" class="star">'); ?>
                            
                    </div>
                    </a>
            <?php } ?>
        </div>
        <div id="footer">
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
 
</body>

</html>