<a href="http://resultsync.com/about.php"><img src="img/banner/banner.png"></a>
<div id="signupbutton">
<a href="about.php">Learn More and Sign-Up</a>
</div>

<?php
$query = "SELECT id, title, imageOne FROM  `results` ORDER BY  `dateCreated` DESC LIMIT 12";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)) { ?>

          <a href="http://resultsync.com/result.php?id=<?php echo $row['id']; ?>">
          <div id="box">
                <p><?php echo $row['title']; ?><br><img src="http://resultsync.com/img/results/thumbnails/<?php echo $row['imageOne']; ?>" class="boximage"></p>
          </div>
          </a>
<?php } ?>
        