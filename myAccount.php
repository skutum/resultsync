<?php include '../config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Result Sync | My Account</title>
<style type="text/css" media="all">@import "css/master.css";</style>
<style type="text/css" media="all">@import "css/master.css";</style>
<SCRIPT LANGUAGE="JavaScript" SRC="js/sidebar.js"></SCRIPT>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready( function() {

});
</script>
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
            <?php if(isLoggedIn()){?>
            <h1>My Account </h1><h2> - Here you can edit your user information.</h2><br><br>
            <?php
            $query = "SELECT * FROM users WHERE id=". getuserid();
            $result = mysql_query($query);
            $row = mysql_fetch_assoc($result);
            ?>
            <form class="myAccount" method="post" action="targets/myAccountUpdate.php" enctype="multipart/form-data">
                <h2>First Name: </h2><br><input type="text" name="fname" class="rounded" value="<?php echo $row['fname']; ?>"></input><br>
                <h2>Last Name: </h2><br><input type="text" name="lname" class="rounded" value="<?php echo $row['lname']; ?>"></input><br>
                <h2>Age: </h2><br><input type="text" name="age" class="rounded" value="<?php echo $row['age']; ?>"></input><br>
                <hr>
                <h2>Gender: </h2><select name="sex">
                    <?php
                        if($row['sex'] == "Male")
                            echo "<option value='Male' selected>Male</option>\n"; 
                            else
                            echo "<option value='Male'>Male</option>\n";
                            
                            if($row['sex'] == "Female")
                            echo "<option value='Female' selected>Female</option>\n"; 
                            else
                            echo "<option value='Female'>Female</option>\n";
                            
                            if($row['sex'] == "Other")
                            echo "<option value='Other' selected>Other</option>\n"; 
                            else
                            echo "<option value='Other'>Other</option>\n"; 
                    ?>
                </select><br><hr>
                <h2>Public Name: </h2><br><input type="text" name="fakeName" class="rounded" value="<?php echo $row['fakeName']; ?>"></input><br>
                <h2>Alternate Email: </h2><br><input type="text" name="alternateEmail" class="rounded" value="<?php echo $row['alternateEmail']; ?>"></input><br>
                <h2>Newsletter: </h2>
                    <input type="hidden" name="newsletter" value="0"></input>
                    <input type="checkbox" name="newsletter" value="1" <?php if($row['newsletter']) echo "checked";?>></input><br>
                <span>Newsletter is sent to both the account email and the alternate email.</span><br><br>
                
                <input type="submit" value="Save Changes" ></input>
            </form>
        </div>
            <?php
            } 
                else
                {
                    echo "<script>window.location = 'http://www.resultsync.com'</script>";
                }
            ?>
        <div id="footer">
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
 
</body>

</html>