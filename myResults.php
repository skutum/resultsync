<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Result Sync | My Results</title>
<style type="text/css" media="all">@import "css/master.css";</style>
<style type="text/css" media="all">@import "css/master.css";</style>
<SCRIPT LANGUAGE="JavaScript" SRC="js/sidebar.js"></SCRIPT>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready( function() {
    
   $('.delete').click( function() {
        if(!confirm('Are you sure you want to delete this result?'))
            return false;
        
        var id = $(this).attr('data-id');
        var url = 'http://resultsync.com/targets/delete.php?id=' + id;
        var button = $(this);
        $.post(url, function(data) {
            button.parents('.result:first').detach();
        });
    });
    
    $('.edit').click( function() {
            var id = $(this).attr('data-id');
            window.location = 'http://resultsync.com/edit.php?id=' + id;
    });
    
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
            <h1>My Results </h1><h2> - Here you can manage any results that you have uploaded.</h2><br><br>
            
            <?php
                // find out how many rows are in the table 
                $sql = "SELECT COUNT(*) FROM results WHERE userid=" . getuserid() . "";
                $result = mysql_query($sql);
                $r = mysql_fetch_row($result);
                $numrows = $r[0];
                
                // number of rows to show per page
                $rowsperpage = 10;
                // find out total pages
                $totalpages = ceil($numrows / $rowsperpage);
                
                // get the current page or set a default
                if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
                   // cast var as int
                   $currentpage = (int) $_GET['currentpage'];
                } else {
                   // default page num
                   $currentpage = 1;
                } // end if
                
                // if current page is greater than total pages...
                if ($currentpage > $totalpages) {
                   // set current page to last page
                   $currentpage = $totalpages;
                } // end if
                // if current page is less than first page...
                if ($currentpage < 1) {
                   // set current page to first page
                   $currentpage = 1;
                } // end if
                
                // the offset of the list, based on current page 
                $offset = ($currentpage - 1) * $rowsperpage;
            
            
            
                $query = "SELECT id, title, imageOne, numberOfViews, rating FROM  `results` WHERE userid=" . getuserid() . "  ORDER BY  `dateCreated` DESC LIMIT $offset, $rowsperpage";
                $results = mysql_query($query);
                while($row = mysql_fetch_array($results)) { ?>
                    <div id="result" class="result">
                            <a href="http://resultsync.com/result.php?id=<?php echo $row['id'] ?>">
                            <img src="http://resultsync.com/img/results/thumbnails/<?php echo $row['imageOne']; ?>" class="boximage">
                            <h2><?php echo $row['title']; ?></h2>
                            <h3> | Views: </h3><p><?php echo $row['numberOfViews']; ?></p>
                            <h3> | Rating: </h3>
                            <?php for ($i = 0; $i < $row['rating']; $i++) //$starsCount is a DB value 
                                echo('<img src="/img/star.png" alt="*" title="" class="star">'); ?>
                            <br><br></a>
                                
                            <input type="button" class="delete" data-id="<?php echo $row['id']; ?>" value="Delete"></input>
                            <input type="button" class="edit" data-id="<?php echo $row['id']; ?>" value="Edit"></input>    
                    </div>
            <?php } ?>
             <div class="pages">
                <?php 
                if ($currentpage > 1) {
                // show << link to go back to page 1
                echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'>FIRST ~ </a> ";
                // get previous page num
                $prevpage = $currentpage - 1;
                // show < link to go back to 1 page
                echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'>PREVIOUS ~ </a> ";
                } // end if
                
                // range of num links to show
                $range = 3;
                
                // loop to show links to range of pages around current page
                for ($x = ($currentpage - $range); $x < (($currentpage + $range)  + 1); $x++) {
                   // if it's a valid page number...
                   if (($x > 0) && ($x <= $totalpages)) {
                      // if we're on current page...
                      if ($x == $currentpage) {
                         // 'highlight' it but don't make a link
                         echo " <h2><b>$x</b></h2> ";
                      // if not current page...
                      } else {
                         // make it a link
                         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
                      } // end else
                   } // end if 
                } // end for
                
                // if not on last page, show forward and last page links        
                if ($currentpage != $totalpages) {
                   // get next page
                   $nextpage = $currentpage + 1;
                    // echo forward link for next page 
                   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'> ~ NEXT</a> ";
                   // echo forward link for lastpage
                   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'> ~ LAST</a> ";
                } // end if
            ?>
            <br><br>
            </div>
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