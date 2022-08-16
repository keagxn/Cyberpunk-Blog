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



    

    
    
    <!-- s-content
    ================================================== -->
    <section class="s-content" style="background-image: url(images/good.jpg); ">

        <div class="row narrow" style="color:black ;" >
                <div class="col-full s-content__header" data-aos="fade-up" style="color:lime;">
                    <h1 style="color:black; text-shadow: -1px 1px 0 #E01480,
                          1px 1px 0 #00ffff,
                         1px -1px 0 #00ffff,
                        -1px -1px 0 #00ffff; font-size:60px;">Articles Containing Your Keywords:</h1>
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
                    $search = trim($_GET['search']);
                    $recentq = "SELECT `articles`.*,`users`.`username`,`categories`.`categoryname` FROM `articles` INNER JOIN `users` ON `articles`.`publisher` = `users`.`userid` INNER JOIN `categories` ON `articles`.`category` = `categories`.`categoryid` WHERE `title` LIKE '%$search%' OR `content` LIKE '%$search%' OR `categoryname` LIKE '%$search%' OR `datepublished` LIKE '%$search%' OR `username` LIKE '%$search%'";
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
                <h3>Categories</h3>

                <div class="tagcloud">
                    
                    <?php
                        require('conn.php');
                        //category
                        $categoryq = "SELECT `categoryname`, `categoryid` FROM `categories` WHERE categoryid > 0;";
                        $categoryr = mysqli_query($conn, $categoryq) or die ('Bad select query');

                        while ($row = mysqli_fetch_array($categoryr)){
                            $category = $row['categoryname'] ;
                            $categoryid = $row['categoryid'] ;

                            echo '<a href="category.php?categoryid=' ; echo $categoryid . '">';  echo $category ; echo '</a>';

                        }
                    ?>

                </div> <!-- end tagcloud -->
            </div> <!-- end tags -->
        </div> <!-- end tags-wrap -->

    </section> <!-- end s-extra -->


    <?php include('footer.php'); ?>

</body>

</html>