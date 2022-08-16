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
                        -1px -1px 0 #00ffff; font-size:60px;">Admin</h1>
                </div>
        </div>

        <div class="row masonry-wrap" style="color:black ;" >
                <div class="col-full s-content__header" data-aos="fade-up" style="color:lime;">
                    <h1 style="color:black; text-shadow: -1px 1px 0 #E01480,
                          1px 1px 0 #00ffff,
                         1px -1px 0 #00ffff,
                        -1px -1px 0 #00ffff; font-size:40px; text-align: left">Posts: <hr style= size="3", color=#E01480>  </h1>
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
                                <a href="editpost.php?articleid=' ; echo $row["articleid"] ;  echo '" class="entry__thumb-link"> 
                                    <img src="' ; echo $row["image"] ;  echo '" alt="boi">
                                </a>
                            </div>
                            
                            <div class="entry__text" style="background-color:cyan;">
                                <div class="entry__header">
                            
                                    <div class="entry__date" style="color:lime;">
                                        <a style="color:#E01480;" href="editpost.php?articleid=' ; echo $row["articleid"] ;  echo '">' ; echo $row["datepublished"] ;  echo '</a>
                                    </div>
                                    <h1 class="entry__title" style="color:black; text-shadow: -1px 1px 0 #E01480,
                                    1px 1px 0 #00ffff,
                                   1px -1px 0 #00ffff,
                                  -1px -1px 0 #00ffff; "><a href="editpost.php?articleid=' ; echo $row["articleid"] ;  echo '">' ; echo $row["title"] ;  echo '</a>
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

        <div class="row masonry-wrap" style="color:black ;" >
                <div class="col-full s-content__header" data-aos="fade-up" style="color:lime;">
                    <h1 style="color:black; text-shadow: -1px 1px 0 #E01480,
                          1px 1px 0 #00ffff,
                         1px -1px 0 #00ffff,
                        -1px -1px 0 #00ffff; font-size:40px; text-align: left">Categories: <hr style= size="3", color=#E01480>  </h1>
                </div>
        </div>

        <?php require('conn.php');

$query = "SELECT * FROM `users`";
$result = mysqli_query($conn, $query) or die ('Bad select query'); ?>

        <table style = "border: 1" width = "50%">
            <thead>
                <tr>
                    <td> User ID </td>
                    <td> Username </td>
                    <td> Email </td>
                    <td> Password </td>
                    <td> Permission ID </td>
                </tr>
            </thead>

                <tbody>

                    <?php
                        while ($row = mysqli_fetch_array($result)){
                        echo '<tr><td> <input type = "radio" name = "userid" value = "' . $row['userid'] . '"> </td>' ;
                        echo '<td>' . $row['userid'] . '</td>' ;
                        echo '<td>' . $row['username'] . '</td>' ;
                        echo '<td>' . $row['password'] . '</td>' ;
                        echo '<td>' . $row['permissions'] . '</td></tr>' ;
                        }
                    ?>

                    <input type = "submit" name = "submitbutton" value = "edit user">
                    </form>

                </tbody>

        </table>

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