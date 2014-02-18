<?php
//This code places a result into the results table
include '../includes/config.php';
// Validates that data was entered
// Defines default Error Variables
$errTitle = "";
$errDescription = "";
$errCategory = "";
$errCode = "";
$errImageType = "";
$errImageSize = "";

//Gets the type of image for each image
$imagetypeOne = $_FILES['imageOne']['type'];
$imagetypeTwo = $_FILES['imageTwo']['type'];
$imagetypeThree = $_FILES['imageThree']['type'];
//Generates a unique name for each uploaded image
$imageOne  = basename($_FILES['imageOne']['name']);
$extension = pathinfo($imageOne, PATHINFO_EXTENSION);
$newOne       = md5($imageOne).time().'.'.$extension;

$imageTwo  = basename($_FILES['imageTwo']['name']);
$extension = pathinfo($imageTwo, PATHINFO_EXTENSION);
$newTwo       = md5($imageTwo).time().'.'.$extension;

$imageThree  = basename($_FILES['imageThree']['name']);
$extension = pathinfo($imageThree, PATHINFO_EXTENSION);
$newThree       = md5($imageThree).time().'.'.$extension;


//Gets rid of new image name and replaces with null if no image was uploaded
if($imagetypeOne == '') {
    $newOne = '';
}
if($imagetypeTwo == '') {
    $newTwo = '';
}
if($imagetypeThree == '') {
    $newThree = '';
}
//Sets Maximum Image upload size
$max_filesize = 20240000;
$max_filesize_kb = ($max_filesize / 1024);
//Sets the Image upload directory
$uploads = '../img/results';

//Verifys that images are actually images and not other filetypes.

if($imagetypeOne != 'image/gif' && $imagetypeOne != 'image/jpg' && $imagetypeOne != 'image/png' && $imagetypeOne != 'image/jpeg' && $imagetypeOne != '')
{
    $errImageType = '<P>Image 1 is the wrong format, must be jpg, gif or png</p><br><br>';
    $errCode = '1';
}

if($imagetypeTwo != 'image/gif' && $imagetypeTwo != 'image/jpg' && $imagetypeTwo != 'image/png' && $imagetypeTwo != 'image/jpeg' && $imagetypeTwo != '')
{
    $errImageType = '<P>Image 2 is the wrong format, must be jpg, gif or png</p><br><br>';
    $errCode = '1';
}
if($imagetypeThree != 'image/gif' && $imagetypeThree != 'image/jpg' && $imagetypeThree == 'image/png' && $imagetypeThree != 'image/jpeg' && $imagetypeThree != '')
{
    $errImageType = '<P>Image 3 is the wrong format, must be jpg, gif or png</p><br><br>';
    $errCode = '1';
}
//Checks each image that it doesn't exceed maximum filesize
if($_FILES['imageOne']['size'] > $max_filesize)
{
    #file is larger than the value of $max_filesize return an error
    $errImageSize = '<p>Image 1 is Larger than 20MB, please reduce image size.</p><br><br>';
    $errCode = '1';
}
if($_FILES['imageTwo']['size'] > $max_filesize)
{
    #file is larger than the value of $max_filesize return an error
    $errImageSize = '<p>Image 2 is Larger than 20MB, please reduce image size.</p><br><br>';
    $errCode = '1';
}
if($_FILES['imageThree']['size'] > $max_filesize)
{
    #file is larger than the value of $max_filesize return an error
    $errImageSize = '<p>Image 3 is Larger than 20MB, please reduce image size.</p><br><br>';
    $errCode = '1';
}


//Makes sure that there is data in the Title Field
if($_POST["title"] == "")
  {
    $errTitle = '<p>Title is required.</p><br><br>';
    $errCode = '1';
  }
//Makes sure that user entered a description  
if($_POST["description"] == "")
  {
    $errDescription = '<p>Description is required.</p><br><br>';
    $errCode = '1';
  }
//Makes sure that user picked a category  
if($_POST["categoryOne"] < "1")
  {
    $errCategory = '<p>First Category is required.</p><br><br>';
    $errCode = '1';
  }

//Creates a simple HTML Page explaining any errors.
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
              <h2>We are sorry for the inconvience, but there was an error adding your result.</h2><br><br>
              <?php   echo $errTitle;
                      echo $errDescription;
                      echo $errCategory;
                      echo $errImageType;
                      echo $errImageSize;
              ?>
              <h2><a href="../addresult.php">Please Try Again</a></h2>
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
    //Moves Original Image into results directory.
    move_uploaded_file($_FILES['imageOne']['tmp_name'], $uploads.'/'.$newOne);
    move_uploaded_file($_FILES['imageTwo']['tmp_name'], $uploads.'/'.$newTwo); 
    move_uploaded_file($_FILES['imageThree']['tmp_name'], $uploads.'/'.$newThree); 
    //Resizes Uploaded Images and places rezied image into thumbnails directory, calls on function in config.php
    if($imagetypeOne != ''){
    $image = new SimpleImage();
    $image->load("../img/results/"."$newOne");
    $image->resizeToWidth(150);
    $image->save("../img/results/thumbnails/"."$newOne");
    }
    if($imagetypeTwo != ''){
    $image = new SimpleImage();
    $image->load("../img/results/"."$newTwo");
    $image->resizeToWidth(150);
    $image->save("../img/results/thumbnails/"."$newTwo");
    }
    if($imagetypeThree != ''){
    $image = new SimpleImage();
    $image->load("../img/results/"."$newThree");
    $image->resizeToWidth(150);
    $image->save("../img/results/thumbnails/"."$newThree");
    }
    
   //Inserts Data into database
    $sql = "INSERT INTO results (userid, title, description, categoryOne, categoryTwo, categoryThree, imageOne, imageTwo, imageThree, video, website, ebay, amazon, facebook, twitter, linkedin)
    VALUES ('" . getUserId() . "', '" . mysql_real_escape_string($_POST['title']) . "', '" . mysql_real_escape_string($_POST['description']) . "', '" .
    mysql_real_escape_string($_POST['categoryOne']) . "', '" . mysql_real_escape_string($_POST['categoryTwo']) . "', '" .
    mysql_real_escape_string($_POST['categoryThree']) . "', '" . mysql_real_escape_string($newOne) . "', '" . mysql_real_escape_string($newTwo) . "', '" . mysql_real_escape_string($newThree) . "', '" .
    mysql_real_escape_string($_POST['youtube']) . "', '" . mysql_real_escape_string($_POST['website']) . "', '" .
    mysql_real_escape_string($_POST['ebay']) . "', '" . mysql_real_escape_string($_POST['amazon']) . "', '" .
    mysql_real_escape_string($_POST['facebook']) . "', '" . mysql_real_escape_string($_POST['twitter']) . "', '" .
    mysql_real_escape_string($_POST['linkedin']) . "')";
    
    mysql_query ($sql);
    

    
    header ("location: /resultAdded.php");
    
    }
?>