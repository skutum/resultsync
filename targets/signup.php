<?php
//This code places a new user into the table users
include '../../config.php';
// Validates Signup Form 
$errEmail = "";
$errPassword = "";
$errFirstName = "";
$errLastName = "";
$errAlreadyUser = "";
$errCode = "";
$email = $_POST['email'];
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$sql = "SELECT * FROM `users` WHERE email='" . mysql_real_escape_string($_POST['email']) . "'";
$result = mysql_query($sql, $connection) or die(mysql_error());

if (!strchr($email, '@'))
  {
    $errEmail = '<p>Valid Email required.</p><br><br>';
    $errCode = '1';
  }
  // Password must be strong
if(preg_match("/^.*(?=.{8,}).*$/", $_POST["pass"]) === 0)
  {
    $errPassword = '<p>Password must be at least 8 characters.</p><br><br>';
    $errCode = '1';
  }
if($_POST["fname"] == "")
  {
    $errFirstName = '<p>Valid First Name required.</p><br><br>';
    $errCode = '1';
  }
if($_POST["lname"] == "")
  {
    $errLastName = '<p>Valid Last Name required.</p><br><br>';
    $errCode = '1';
  }
  
  //Checks if user already exists in database
if( mysql_num_rows( $result ) > 0 )
  {
    $errAlreadyUser = '<p>This email address is already signed up, please <a href="../index.php">Login</a> or <a href="#">reset your password</a></p><br><br>';
    $errCode = '1';
  }
  
if ($errCode > "0")
{
  ?>
    <html>
    <head>
      <title>ResultSync | Error Signing Up</title>
      <style type="text/css" media="all">@import "../css/master.css";</style>
      <style type="text/css" media="all">@import "../css/master.css";</style>
      <SCRIPT LANGUAGE="JavaScript" SRC="../js/sidebar.js"></SCRIPT>
    </head>
    <body>
      <div id="page-container">
        <?php include '../includes/header.php'; ?>
        <div id="login-bar">
        </div>
              <h2>We are sorry for the inconvience, but there was an error signing you up.</h2><br><br>
              <?php   echo $errEmail;
                      echo $errPassword;
                      echo $errFirstName;
                      echo $errLastName;
                      echo $errAlreadyUser;
              ?>
              <h2><a href="../about.php">Please Try Again</a> or <a href="../index.php">Login</a></h2>
              <br><br>
        <div id="footer">
            <?php include '../includes/footer.php'; ?>
        </div>
    </div>
    </body>
    </html>
  <?php
 
  
}
else
  {
  
    $password = $_POST['pass'];
    //encrypts password
    $encryptedPassword=crypt($password);

    $sql = "INSERT INTO users (email, password, fname, lname) VALUES ('" . mysql_real_escape_string($_POST['email']) . "', '" . mysql_real_escape_string($encryptedPassword) . "', '" . mysql_real_escape_string($_POST['fname']) . "', '" . mysql_real_escape_string($_POST['lname']) . "')";

    if (!mysql_query($sql))
      {
       header ("location: /loginsuccess.php");
      }
    
    $to      =  $email ;
    $subject = 'Welcome to Result Sync!';
    $message = "Hello " .$firstname.", thank you for signing up with ResultSync! Please Log-In at www.resultsync.com to begin posting your results! Your username is: " .$email;
    $headers = 'From: no-reply@resultsync.com' . "\r\n" .
    'Reply-To: no-reply@resultsync.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
    header ("location: /registersuccess.php");
    }
?>


