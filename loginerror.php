<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Result Sync | Log In</title>
<style type="text/css" media="all">@import "css/master.css";</style>
<style type="text/css" media="all">@import "css/master.css";</style>
<SCRIPT LANGUAGE="JavaScript" SRC="js/sidebar.js"></SCRIPT>
<?php include 'includes/signupformcheck.php'; ?>
<?php include 'includes/loginformcheck.php' ; ?>
</head>

<body>
    <div id="suggestPost"><a href="http://resultsync.com/suggestions.php?sent=0" ></a></div>
    <div id="page-container">
        <?php include 'includes/header.php'; ?>
        <div id="login-bar">
        </div>
        <div id="sidebar-a">
            <?php include 'includes/sidebar.php'; ?>
        </div>
        <div id="content">
            <img src="img/loginerror.png">
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
            <form id="loginform" action=targets/login.php method="post">
                <h2>Log In</h2>
                <br><br>
                <h3>Email: </h3><input id="Email" type="text" class="rounded" name="email" />
                <h3>Password: </h3> <input id="password" type="password" class="rounded" name="pass" />
                <br><br>
                <input type="submit" class="button" value="Log In" />
            </form>
            <br><br>
            <h2>Your username or password was entered incorectly!</h2>
            <p><br><br>Please try logging in again, if you forgot your password please click the forgot button and we will send a new one to your email.
            If you are not yet a member please sign up!</p>
            
        </div>
        <div id="footer">
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
 
</body>

</html>