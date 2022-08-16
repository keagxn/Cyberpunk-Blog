<?php 

//to do
//hashing
//admin
//edit and clk editor

//admin area
//-manage posts
//manage categories
//manage comment, users
//featured


if(!isset($_SESSION["log"])){

    $_SESSION["log"] = NULL ;

}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<?php include('resources.php'); ?>

<?php include('header.php'); ?>



<?php


//sql for filling it

//SELECT supplier_city  FROM suppliers  WHERE supplier_name = 'IBM'  ORDER BY supplier_city DESC;  
//order by descending timestamp and do most recent
//then can get data
//get loop for x most recent and cut it off

//select article id from row num 

//order by most recent, then loop through first 12 printing data

require('conn.php');

//most recent ones
$recentq = "SELECT * FROM `articles` ORDER BY `datepublished` ASC ;";
$recentr = mysqli_query($conn, $recentq) or die ('Bad select query');

$recentq = "SELECT * FROM `articles` ORDER BY `datepublished` ASC ;";
$recentr = mysqli_query($conn, $recentq) or die ('Bad select query');

while($row = mysqli_fetch_array($recentr)){

    $title = $row['title'] ;
    $publisher = $row['publisher'] ;
    $content = $row['content'] ;
    $articleid = $row['articleid'] ;
    $image = $row['image'] ;
    $datepublished = $row['datepublished'] ;
    $category = $row['category'] ;

    echo'

' ; } ?>


    <section class="s-pageheader s-pageheader">

        <div class="pageheader-content row">
            <div class="col-full">

                <div class="featured">

                    <div class="featured__column featured__column--big">
                        <div class="entry"
                            style="background-image:url('<?php echo "$image"; ?> ');">

                            <div class="entry__content">
                                <span class="entry__category"><a href="#0"><?php echo "$category"; ?></a></span>

                                <h1><a href="#0" title=""><?php echo "$title"; ?></a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#0"><?php echo "$publisher"; ?></a></li>
                                        <li><?php echo "$datepublished"; ?></li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->

                        </div> <!-- end entry -->
                    </div> <!-- end featured__big -->

                    <div class="featured__column featured__column--small">

                        <div class="entry" style="background-image:url('images/albums.jpg');">

                            <div class="entry__content">
                                <span class="entry__category"><a href="#0">Concept</a></span>

                                <h1><a href="#0" title="">GridLock</a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="images/crop.png" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#0">25</a></li>
                                        <li>December</li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->

                        </div> <!-- end entry -->

                        <div class="entry" style="background-image:url('images/crop.jpg');">

                            <div class="entry__content">
                                <span class="entry__category"><a href="#0">Concept 2</a></span>

                                <h1><a href="#0" title="">Marble</a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="images/kingshark.jpg" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#0">Monday</a></li>
                                        <li>December</li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->

                        </div> <!-- end entry -->

                    </div> <!-- end featured__small -->
                </div> <!-- end featured -->

            </div> <!-- end col-full -->
        </div> <!-- end pageheader-content row -->

    </section>

    

    
    
    <!-- s-content
    ================================================== -->
    <section class="s-content" style="background-image: url(images/good.jpg); ">

        <div class="row narrow" style="color:black ;" >
                <div class="col-full s-content__header" data-aos="fade-up" style="color:lime;">
                    <h1 style="color:black; text-shadow: -1px 1px 0 #E01480,
                          1px 1px 0 #00ffff,
                         1px -1px 0 #00ffff,
                        -1px -1px 0 #00ffff; font-size:60px;">Most Recent</h1>
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

                    //most recent ones
                    $recentq = "SELECT * FROM `articles` ORDER BY `datepublished` DESC ;";
                    $recentr = mysqli_query($conn, $recentq) or die ('Bad select query');

                    $recentq = "SELECT * FROM `articles` ORDER BY `datepublished` DESC ;";
                    $recentr = mysqli_query($conn, $recentq) or die ('Bad select query');

                    while($row = mysqli_fetch_array($recentr)){

                        $title = $row['title'] ;
                        $publisher = $row['publisher'] ;
                        $content = $row['content'] ;
                        $articleid = $row['articleid'] ;
                        $image = $row['image'] ; 
                        $category = $row['category'] ; 

                        echo'

                        <article class="masonry__brick entry format-standard" data-aos="fade-up" >

                            <div class="entry__thumb">
                                <a href="article.php?articleid=' ; echo $row["articleid"] ;  echo '" class="entry__thumb-link"> 
                                    <img src="' ; echo $row["image"] ;  echo '" alt="boi">
                                </a>
                            </div>
                            
                            <div class="entry__text" style="background-color:cyan;">
                                <div class="entry__header">
                            
                                    <div class="entry__date" style="color:lime;">
                                        <a style="color:#E01480;" href="article.php?articleid=' ; echo $row["articleid"] ;  echo '">' ; echo $row["datepublished"] ;  echo '</a>
                                    </div>
                                    <h1 class="entry__title" style="color:black; text-shadow: -1px 1px 0 #E01480,
                                    1px 1px 0 #00ffff,
                                   1px -1px 0 #00ffff,
                                  -1px -1px 0 #00ffff; "><a href="article.php?articleid=' ; echo $row["articleid"] ;  echo '">' ; echo $row["title"] ;  echo '</a>
                                    </h1>
                            
                                </div>
                                <div class="entry__excerpt">
                                    <p style="color:black;"> ' ; echo html_entity_decode($row["content"]) ;  echo ' </p>
                                </div>
                                
                            </div>
                        
                        </article>

                    ' ; }

                ?>

            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->

        <div class="row">
            <div class="col-full">
                <nav class="pgn">
                    <ul>
                        <li><a class="pgn__prev" href="#0">Prev</a></li>
                        <li><a class="pgn__num" href="#0">1</a></li>
                        <li><span class="pgn__num current">2</span></li>
                        <li><a class="pgn__num" href="#0">3</a></li>
                        <li><a class="pgn__num" href="#0">4</a></li>
                        <li><a class="pgn__num" href="#0">5</a></li>
                        <li><span class="pgn__num dots">…</span></li>
                        <li><a class="pgn__num" href="#0">8</a></li>
                        <li><a class="pgn__next" href="#0">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>

    </section> <!-- s-content -->


    <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row bottom tags-wrap">
            <div class="col-full tags">
                <h3 class="s-content__header-title" style="color:black; text-shadow: -1px 1px 0 #E01480,
                          1px 1px 0 #00ffff,
                         1px -1px 0 #00ffff,
                        -1px -1px 0 #00ffff; font-size:40px;">Categories</h3>

                <div class="tagcloud">
                    
                    <?php
                        require('conn.php');
                        //category
                        $categoryq = "SELECT `categoryname`, `categoryid` FROM `categories` WHERE categoryid > 0;";
                        $categoryr = mysqli_query($conn, $categoryq) or die ('Bad select query');

                        while ($row = mysqli_fetch_array($categoryr)){
                            $category = $row['categoryname'] ;
                            $categoryid = $row['categoryid'] ;

                            echo '<a style = "color: #E01480;" href="category.php?categoryid=' ; echo $categoryid . '">';  echo $category ; echo '</a>';

                        }
                    ?>

                </div> <!-- end tagcloud -->
            </div> <!-- end tags -->
        </div> <!-- end tags-wrap -->

    </section> <!-- end s-extra -->


    <?php include('footer.php'); ?>

</body>

</html>