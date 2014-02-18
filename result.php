<?php include '../config.php'; 
    //Gets Result Data
    $query = "SELECT id, userid, title, description, imageOne, imageTwo, imageThree, video, website, ebay, amazon, facebook, twitter,
    linkedin, live, rating, numberOfViews, dateCreated FROM  `results` WHERE id=" . $_GET['id'];
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
    //Get the Rating of the Result
    $ratingQuery = "SELECT AVG(rating) FROM comments WHERE resultId=".$_GET['id'];
    $ratingResult = mysql_query($ratingQuery);
    $ratingRow = mysql_fetch_assoc($ratingResult);
    $rating = $ratingRow['AVG(rating)'];
    if($rating == "") {
        $ratingNew = "5";
    }
    else {
        $ratingNew = $rating;
    }
    
    //Updates the number of views for a result
    $views = $row['numberOfViews'];
    $newViews = $views + 1;
    mysql_query("UPDATE results SET numberOfViews='$newViews', rating='$ratingNew' WHERE id=".$_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
<title>Result Sync | Share Your Creativity</title>
<meta name="author" content="Tyler Robinson">
<meta name="description" content="<?php echo $row['title'] ?>">
<meta name="keywords" content="Share Acomplishments, Share Results, Result Sync, ResultSync, share achievments, result, sync">
<style type="text/css" media="all">@import "css/master.css";</style>
<style type="text/css" media="all">@import "css/master.css";</style>
<SCRIPT LANGUAGE="JavaScript" SRC="js/sidebar.js"></SCRIPT>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready( function() {
        
    $('.save').click( function() {
        var id = $(this).attr('data-id');
        var url = 'http://resultsync.com/targets/save.php?id=' + id;
        var button = $(this);
        $.post(url, function(data) {
            alert('Result has been saved.');
        });
    });    
});
</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);
js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
           
            
            <?php if($row['live'] != 1){ ?>
            <div id="resultDisplay">
            
            <div id="linkSpacer"><input type="button" value="Save Result" class="save" data-id="<?php echo $row['id']; ?>" ></input></div>
            <div id="linkSpacer"><a href="https://twitter.com/share" class="twitter-share-button" data-text="Check this out: <?php echo $row['title']; ?>">Tweet</a></div>
            <div id="linkSpacerf"><div class="fb-like" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-action="recommend"></div></div>
            <br>
            <hr>
            <h1><?php echo $row['title']; ?></h1><h2> | Rating: </h2><?php for ($i = 0; $i < $ratingNew; $i++) //$starsCount is a DB value 
                                                            echo('<img src="/img/star.png" alt="*" title="" class="star">'); ?>
            <br>
            <hr>
            <p><?php echo $row['description']; ?></p><br><br>
            
            <?php if($row['imageOne'] != ''){ ?>
            <a href="http://resultsync.com/img/results/<?php echo $row['imageOne'] ?>"><img src="../img/results/<?php echo $row['imageOne']?>" class="resultImage"></a>
            <br>
            <?php } ?>
            <?php if($row['imageTwo'] != ''){ ?>
            <a href="http://resultsync.com/img/results/<?php echo $row['imageTwo'] ?>"><img src="../img/results/<?php echo $row['imageTwo']?>" class="resultImage"></a>
            <br>
            <?php } ?>
            <?php if($row['imageThree'] != ''){ ?>            
            <a href="http://resultsync.com/img/results/<?php echo $row['imageThree'] ?>"><img src="../img/results/<?php echo $row['imageThree']?>" class="resultImage"></a>
            <br>
            <?php } ?>
            <?php if($row['video'] != ''){ ?>            
            <div id="video"><?php echo $row['video'] ?></div>
            <br>
            <?php } ?>
            <?php if($row['website'] != ''){ ?>            
            <p>You can checkout the web-site for this result here: </p><a href="http://<?php echo $row['website'] ?>" target="_blank"><?php echo $row['website'] ?></a>
            <br>
            <?php } ?>
            <?php if($row['ebay'] != ''){ ?>            
            <p>You can checkout the ebay listing for this result </p><a href="<?php echo $row['ebay'] ?>" target="_blank">by clicking here.</a>
            <br>
            <?php } ?>
            <?php if($row['amazon'] != ''){ ?>            
            <p>You can checkout the amazon listing for this result </p><a href="<?php echo $row['amazon'] ?>" target="_blank">by clicking here.</a>
            <br>
            <?php } ?>
            <?php if($row['facebook'] != ''){ ?>            
            <p>You can checkout the Facebook Page for this result </p><a href="<?php echo $row['facebook'] ?>" target="_blank">by clicking here.</a>
            <br>
            <?php } ?>
            <?php if($row['twitter'] != ''){ ?>            
            <p>You can checkout the Twitter Feed for this result </p><a href="<?php echo $row['twitter'] ?>" target="_blank">by clicking here.</a>
            <br>
            <?php } ?>
            <?php if($row['linkedin'] != ''){ ?>            
            <p>You can checkout the LinkedIn Page for this result </p><a href="<?php echo $row['linkedin'] ?>" target="_blank">by clicking here.</a>
            <br>
            <?php } ?>
            <hr>
            
                <?php
                $commentSQL = "SELECT * FROM comments WHERE resultId=" . $_GET['id'] . " ORDER BY dateCreated DESC LIMIT 3";
                $comment = mysql_query($commentSQL);
                while($commentRow = mysql_fetch_assoc($comment)) {; ?>
                    <?php   $usernameSQL = mysql_query("SELECT fakeName FROM users WHERE id=".$commentRow['userId']);
                           $username = mysql_fetch_assoc($usernameSQL);  
                    ?>
                    <div id="comment">
                        <h4>User: </h4><h3> <?php echo $username['fakeName']; ?></h3> <h4>Rating: </h4><?php for ($i = 0; $i < $commentRow['rating']; $i++) echo('<img src="/img/star.png" alt="*" title="" class="star">'); ?>
                        <br><br>
                        <h4>Comment: </h4><h3><?php echo $commentRow['comment']; ?></h3>
                    </div>
                    
                <?php } ?>    
            <?php
            if(isLoggedIn())
                {
            ?>
            <hr>
            <h2>Comment and Rate this Restult</h2>
            <br>
            <form class="comment" action="targets/comment.php?id=<?php echo $_GET['id']; ?>" method="post">
                <h4>Rating: </h4><span>Please enter a number 1 thru 5, 5 being the best and 1 being the worst.</span>
                <input name="rating" type="text" class="rating" maxlength="1"></input><br><br>
                <textarea name="comment" cols="10" rows="5"></textarea>
                <input type="submit" value="Save Comment" class="submitComment"></input>
            </form>
            
            <?php } else { ?>
            <hr>
                <h2>Log-In or Sign-Up to Rate and Comment on this Result</h2>
                <div id="signupbutton">
                <a href="about.php">Learn More and Sign-Up</a>
                </div>
            <?php } ?>
            </div>
            <?php }
            else { ?>
            <h1>Result has been Removed!</h1><br><p>This result has been removed because it was in violation to our Terms & Conditions, we are working
            with the user to correct these issues. If issues are corected result will become active once again. Please remember to always follow the
            resultsync.com Terms & Conditions.</p>
            <?php } ?>
        </div>
        <div id="footer">
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
 
</body>

</html>