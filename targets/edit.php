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

//Sets Maximum Image upload size
$max_filesize = 20240000;
$max_filesize_kb = ($max_filesize / 1024);
//Sets the Image upload directory
$uploads = '../img/results';

if( isset($_FILES['imageOne']['name']))
{
    $imagetypeOne = $_FILES['imageOne']['type'];
    $imageOne  = basename($_FILES['imageOne']['name']);
    $extension = pathinfo($imageOne, PATHINFO_EXTENSION);
    $newOne       = md5($imageOne).time().'.'.$extension;
    
    if($imagetypeOne == '') {
    $newOne = '';
    }
    
    if($imagetypeOne != 'image/gif' && $imagetypeOne != 'image/jpg' && $imagetypeOne != 'image/png' && $imagetypeOne != 'image/jpeg' && $imagetypeOne != '')
    {
    $errImageType = '<P>Image 1 is the wrong format, must be jpg, gif or png</p><br><br>';
    $errCode = '1';
    }
    if($_FILES['imageOne']['size'] > $max_filesize)
    {
    #file is larger than the value of $max_filesize return an error
    $errImageSize = '<p>Image 1 is Larger than 20MB, please reduce image size.</p><br><br>';
    $errCode = '1';
    }
}
if( isset($_FILES['imageTwo']['name']))
{
    $imagetypeTwo = $_FILES['imageTwo']['type'];
    $imageTwo  = basename($_FILES['imageTwo']['name']);
    $extension = pathinfo($imageTwo, PATHINFO_EXTENSION);
    $newTwo       = md5($imageTwo).time().'.'.$extension;
    
    if($imagetypeTwo == '') {
        $newTwo = '';
    }
    if($imagetypeTwo != 'image/gif' && $imagetypeTwo != 'image/jpg' && $imagetypeTwo != 'image/png' && $imagetypeTwo != 'image/jpeg' && $imagetypeTwo != '')
    {
        $errImageType = '<P>Image 2 is the wrong format, must be jpg, gif or png</p><br><br>';
        $errCode = '1';
    }
    if($_FILES['imageTwo']['size'] > $max_filesize)
    {
    #file is larger than the value of $max_filesize return an error
    $errImageSize = '<p>Image 2 is Larger than 20MB, please reduce image size.</p><br><br>';
    $errCode = '1';
    }

}
if( isset($_FILES['imageThree']['name']))
{
    $imagetypeThree = $_FILES['imageThree']['type'];
    $imageThree  = basename($_FILES['imageThree']['name']);
    $extension = pathinfo($imageThree, PATHINFO_EXTENSION);
    $newThree       = md5($imageThree).time().'.'.$extension;
    
    if($imagetypeThree == '') {
        $newThree = '';
    }
    if($imagetypeThree != 'image/gif' && $imagetypeThree != 'image/jpg' && $imagetypeThree == 'image/png' && $imagetypeThree != 'image/jpeg' && $imagetypeThree != '')
    {
        $errImageType = '<P>Image 3 is the wrong format, must be jpg, gif or png</p><br><br>';
        $errCode = '1';
    }
    if($_FILES['imageThree']['size'] > $max_filesize)
    {
    #file is larger than the value of $max_filesize return an error
    $errImageSize = '<p>Image 3 is Larger than 20MB, please reduce image size.</p><br><br>';
    $errCode = '1';
    }
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
      <title>ResultSync | Error Updating Result</title>
      <style type="text/css" media="all">@import "../css/master.css";</style>
      <style type="text/css" media="all">@import "../css/master.css";</style>
      <SCRIPT LANGUAGE="JavaScript" SRC="../js/sidebar.js"></SCRIPT>
    </head>
    <body>
      <div id="page-container">
        <?php include '../includes/header.php'; ?>
        <div id="login-bar">
        </div>
              <h2>We are sorry for the inconvience, but there was an error Updating your result.</h2><br><br>
              <?php   echo $errTitle;
                      echo $errDescription;
                      echo $errCategory;
                      echo $errImageType;
                      echo $errImageSize;
              ?>
              <h2><a href="../myResults.php">Please Try Again</a></h2>
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
    if( isset($_FILES['imageOne']['name']))
    {
    move_uploaded_file($_FILES['imageOne']['tmp_name'], $uploads.'/'.$newOne);
    }
    if( isset($_FILES['imageTwo']['name']))
    {
    move_uploaded_file($_FILES['imageTwo']['tmp_name'], $uploads.'/'.$newTwo);
    }
    if( isset($_FILES['imageThree']['name']))
    {
    move_uploaded_file($_FILES['imageThree']['tmp_name'], $uploads.'/'.$newThree);
    }
    //Resizes Uploaded Images and places rezied image into thumbnails directory, calls on function in config.php
    if( isset($_FILES['imageOne']['name']))
    {
        if($imagetypeOne != ''){
        $image = new SimpleImage();
        $image->load("../img/results/"."$newOne");
        $image->resizeToWidth(150);
        $image->save("../img/results/thumbnails/"."$newOne");
        }
    }
    if( isset($_FILES['imageTwo']['name']))
    {
        if($imagetypeTwo != ''){
        $image = new SimpleImage();
        $image->load("../img/results/"."$newTwo");
        $image->resizeToWidth(150);
        $image->save("../img/results/thumbnails/"."$newTwo");
        }
    }
    if( isset($_FILES['imageThree']['name']))
    {
        if($imagetypeThree != ''){
        $image = new SimpleImage();
        $image->load("../img/results/"."$newThree");
        $image->resizeToWidth(150);
        $image->save("../img/results/thumbnails/"."$newThree");
        }
    }
   //Inserts Data into database

    $sql = "UPDATE results SET title='". mysql_real_escape_string($_POST['title']) ."', description='". mysql_real_escape_string($_POST['description']) ."',
    categoryOne='". mysql_real_escape_string($_POST['categoryOne']) ."', categoryTwo='". mysql_real_escape_string($_POST['categoryTwo']) ."',
    categoryThree='". mysql_real_escape_string($_POST['categoryThree']) ."', ";
    
    if(isset($newOne))
        $sql .= "imageOne='" . mysql_real_escape_string($newOne) ."', ";
    
    if(isset($newTwo))
        $sql .= "imageTwo='" . mysql_real_escape_string($newTwo) ."', ";
    
    if(isset($newThree))
        $sql .= "imageThree='" . mysql_real_escape_string($newThree) . "', "; 
    
    $sql .="
    video='". mysql_real_escape_string($_POST['youtube']) ."', website='". mysql_real_escape_string($_POST['website']) ."',
    ebay='". mysql_real_escape_string($_POST['ebay']) ."', amazon='". mysql_real_escape_string($_POST['amazon']) ."',
    facebook='". mysql_real_escape_string($_POST['facebook']) ."', twitter='". mysql_real_escape_string($_POST['twitter']) ."',
    linkedin='". mysql_real_escape_string($_POST['linkedin']) ."' WHERE id=". $_GET['id'];

    
    mysql_query ($sql);
    

    
    header ("location: /myResults.php");
    
    }
?>