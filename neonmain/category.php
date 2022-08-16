<!DOCTYPE html>
<html class="no-js" lang="en">

<?php 

    include('resources.php'); 

    include('header.php');

    require('conn.php');

    if(isset($_GET['categoryid'])){
        $categoryid = $_GET['categoryid'];
    }else{



    }

    //category
    $categoryq = "SELECT `categoryname` FROM `categories` WHERE `categoryid` = '$categoryid' ;";
    $categoryr = mysqli_query($conn, $categoryq) or die ('Bad select query');

    while ($row = mysqli_fetch_array($categoryr)){
        $category = $row['categoryname'] ;
    }

    //cat desc
    $categoryq = "SELECT `categorydescription` FROM `categories` WHERE `categoryid` = '$categoryid' ;";
    $categoryr = mysqli_query($conn, $categoryq) or die ('Bad select query');

    while ($row = mysqli_fetch_array($categoryr)){
        $categorydescription = $row['categorydescription'] ;
    }

?>


    <!-- s-content
    ================================================== -->
    <section class="s-content" style="background-image: url(images/black.jpg); ">

    <div class="row narrow" style="color:lime;">
                <div class="col-full s-content__header" data-aos="fade-up" style="color:lime;">
                    <h1 style="color:black; text-shadow: -1px 1px 0 #E01480,
                          1px 1px 0 #00ffff,
                         1px -1px 0 #00ffff,
                        -1px -1px 0 #00ffff; font-size:60px;">Category: <?php echo $category ; ?></h1>
                </div>
        </div>

<div class="row masonry-wrap">
    <div class="masonry">

        <div class="grid-sizer"></div>

        <!-- NUMBER !!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->


        <?php

//sql for filling it

//SELECT supplier_city  FROM suppliers  WHERE supplier_name = 'IBM'  ORDER BY supplier_city DESC;  
//order by descending timestamp and do most recent
//then can get data
//get loop for x most recent and cut it off

//select article id from row num 

//order by most recent, then loop through first 12 printing data

require('conn.php');

if(isset($_GET['categoryid'])){
    $categoryid = $_GET['categoryid'];
}

//most recent ones
$recentq = "SELECT * FROM `articles` WHERE `category` = '$categoryid' ORDER BY `datepublished` DESC ;";
$recentr = mysqli_query($conn, $recentq) or die ('Bad select query');

while($row = mysqli_fetch_array($recentr)){

    $title = $row['title'] ;
    $publisher = $row['publisher'] ;
    $content = $row['content'] ;
    $articleid = $row['articleid'] ;
    $image = $row['image'] ; 

    echo'

    <article class="masonry__brick entry format-standard" data-aos="fade-up">

        <div class="entry__thumb">
            <a href="article.php?articleid=' ; echo $row["articleid"] ;  echo '" class="entry__thumb-link"> 
                <img src="' ; echo $row["image"] ;  echo '" alt="boi">
            </a>
        </div>
        
        <div class="entry__text" style="background-color:cyan;">
            <div class="entry__header">
        
                <div class="entry__date">
                    <a href="article.php?articleid=' ; echo $row["articleid"] ;  echo '">' ; echo $row["datepublished"] ;  echo '</a>
                </div>
                <h1 class="entry__title" style="color:black; text-shadow: -1px 1px 0 #E01480,
                1px 1px 0 #00ffff,
               1px -1px 0 #00ffff,
              -1px -1px 0 #00ffff;"><a href="article.php?articleid=' ; echo $row["articleid"] ;  echo '">' ; echo $row["title"] ;  echo '</a>
                </h1>
        
            </div>
            <div class="entry__excerpt">
                <p> ' ; echo html_entity_decode($row["content"]) ;  echo ' </p>
            </div>
            <div class="entry__meta">
                <span class="entry__meta-links">
                    <a href="category.php?categoryid=' ; echo $row["category"] ;  echo '">' ; echo $category ;  echo '</a>
                </span>
            </div>
        </div>
    
    </article>

' ; }

?>

                
            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->

        

    </section> <!-- s-content -->


    


    <?php include('footer.php'); ?>

</body>

</html>