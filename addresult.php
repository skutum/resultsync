<?php
include '../config.php';
$query = mysql_query("SELECT id,category FROM categories");
$query2 = mysql_query("SELECT id,category FROM categories");
$query3 = mysql_query("SELECT id,category FROM categories");
                if(isLoggedIn())
                {
                    ?>
                    <!DOCTYPE html>
                <html>
                <head>    
                    <title>Result Sync | Add Your Result</title>
                    <style type="text/css" media="all">@import "css/master.css";</style>
                    <style type="text/css" media="all">@import "css/master.css";</style>
                    <SCRIPT LANGUAGE="JavaScript" SRC="js/sidebar.js"></SCRIPT>
                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
                    <?php include 'includes/addresultcheck.php'; ?>
                </head>
                <body>
                    <div id="suggestPost"><a href="http://resultsync.com/suggestions.php?sent=0" ></a></div>
                    <div id="page-container">
                    <?php include 'includes/header.php'; ?>
                    <div id="login-bar">
                        <?php include 'includes/menu.php'; ?>
                    </div>
                    <div id="addResult">
                        <form id="addresult" method="post" action="targets/addresult.php" enctype="multipart/form-data">
                            <h1>Let's add your result!</h1>
                            <br><br>
                            <h6>Give it a name: * </h6><span> Short and Catchy is best, less than 30 characters.</span><br><input id="title" type="text" name="title" class="add" maxlength="30" /><br><br>
                            <h6>Tell us about it: *</h6><br><textarea id="description" name="description"  rows="15"></textarea><br><br>
                            <div id="firstCategory">
                            <h6>First Category: *</h6><br>
                            <select id="categoryOne" name="categoryOne">
                                <option value="0">Select a Category for your result</option>
                                <?php 
                                    //for each row we get from mysql, echo a form input 
                                    while ($row = mysql_fetch_array($query)) { 
                                    echo "<option value=\"$row[id]\">$row[category]</option>\n"; 
                                    } 
                                ?> 
                            </select>
                            </div>
                            <div id="secondCategory">
                            <h6>Second Category:</h6><br>
                            <select name="categoryTwo">
                                <option value="0">Select a Category for your result</option>
                                <?php 
                                    //for each row we get from mysql, echo a form input 
                                    while ($row = mysql_fetch_array($query2)) { 
                                    echo "<option value=\"$row[id]\">$row[category]</option>\n"; 
                                    } 
                                ?> 
                            </select>
                            </div>
                            <div id="thirdCategory">
                            <h6>Third Category:</h6><br>
                            <select name="categoryThree">
                                <option value="0">Select a Category for your result</option>
                                <?php 
                                    //for each row we get from mysql, echo a form input 
                                    while ($row = mysql_fetch_array($query3)) { 
                                    echo "<option value=\"$row[id]\">$row[category]</option>\n"; 
                                    } 
                                ?> 
                            </select>
                            </div>
                            <br><br><br><hr><br>
                            <div id="firstImage">
                            <h6>First Image: *</h6><br>
                                <input id="imageOne" type="file" name="imageOne" /><br />
                                <input type="hidden" name="MAX_FILE_SIZE" value="4000000" />
                            </div>
                            <div id="secondImage">
                            <h6>Second Image:</h6><br>
                                <input type="file" name="imageTwo" /><br />
                                <input type="hidden" name="MAX_FILE_SIZE" value="4000000" />
                            </div>
                            <div id="thirdImage">
                            <h6>Third Image:</h6><br>
                                <input type="file" name="imageThree" /><br />
                                <input type="hidden" name="MAX_FILE_SIZE" value="4000000" />
                            </div>
                            <br><br><br><hr><br>    
                            <h6>YouTube Video Embed Link: </h6><span>Navigate to Video on YouTube, click share, click embed, select 560x315 size, copy code, paste here:</span><br>
                            <input id="youtube" type="text" name="youtube" class="add" /><br>
                            <h6>Your Website: </h6><span>Do not use http://</span><br>
                            <input id="website" type="text" name="website" class="add" /><br>
                            <h6>Ebay Listing Address: </h6><span>Copy and Paste the Address for your eBay Listing from your Browser Address Bar.</span><br>
                            <input id="ebay" type="text" name="ebay" class="add" /><br>
                            <h6>Amazon Listing Address: </h6><span>Copy and Paste the Address for your Amazon Listing from your Browser Address Bar.</span><br>
                            <input id="amazon" type="text" name="amazon" class="add" /><br>
                            <h6>Facebook Page Address: </h6><span>Copy and Paste the Address for your Facebook Page from your Browser Address Bar.</span><br>
                            <input id="facebook" type="text" name="facebook" class="add" /><br>
                            <h6>Twitter Page Address:</h6><br>
                            <input id="twitter" type="text" name="twitter" class="add" /><br>
                            <h6>LinkedIn Page Address:</h6><br>
                            <input id="linkedin" type="text" name="linkedin" class="add" /><br><br>
                            <input class="abutton" type="submit" value="Add Result" name="Add" /><br><br>
                            <span>* = Required Field</span>
                            
                        </form>
                    </div>    
                    <div id="footer">
                        <?php include 'includes/footer.php'; ?>
                    </div>
                    <br><br>
                </div>
                </body>
                </html>
                    <?php
                } 
                else
                {
                    header ("location: /index.php");
                }
?>


