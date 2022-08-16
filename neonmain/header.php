<?php
session_start();  
if(!isset($_SESSION["log"])){

    $_SESSION["log"] = NULL ;

}
?>

<html>

<body id="top">

    <!-- pageheader
    ================================================== -->
    <div class="s-pageheader" style= "position: sticky; top: 0; z-index:100000; ">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <a class="logo" href="index.php">
                        <img src="images/neon.png" alt="Homepage">
                    </a>
                </div> <!-- end header__logo -->

                <ul class="header__social">
                    <li>
                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><i class="fa fa-smile-o" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://finance.yahoo.com/quote/GME/"><i class="fa fa-rocket" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/watch?v=9PWjqgM_CU8"><i class="fa fa-cutlery" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/watch?v=wjTZfbfr3QI"><i class="fa fa-coffee" aria-hidden="true"></i></a>
                    </li>
                </ul> <!-- end header__social -->

                <a class="header__search-trigger" href="#0"></a>

                <div class="header__search">

                    <form role="search" method="get" class="header__search-form" action="results.php">
                        <label>
                            <span class="hide-content">Search for:</span>
                            <input type="search" class="search-field" style= "color: cyan; text-color:cyan;" placeholder="Type Keywords" value="" name="search"
                                title="Search for:" autocomplete="off">
                        </label>
                        <input type="submit" class="search-submit" value="Search">
                    </form>

                    <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

                </div> <!-- end header__search -->


                <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

                <nav class="header__nav-wrap">

                    <h2 class="header__nav-heading h6">Site Navigation</h2>

                    <ul class="header__nav">
                        <li class="has-children">
                            <a href="#0" title="">Categories</a>
                            <ul class="sub-menu">

                            <?php
                                require('conn.php');
                                //category
                                $categoryq = "SELECT `categoryname`, `categoryid` FROM `categories` WHERE categoryid > 0;";
                                $categoryr = mysqli_query($conn, $categoryq) or die ('Bad select query');

                                while ($row = mysqli_fetch_array($categoryr)){
                                    $category = $row['categoryname'] ;
                                    $categoryid = $row['categoryid'] ;

                                    echo '<li><a href="category.php?categoryid=' ; echo $categoryid . '">';  echo $category ; echo '</a></li>';

                                }
                            ?>
                              
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#0" title="">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="article.php">Article Template</a></li>
                                <li><a href="single-video.php">Video Post</a></li>
                                <li><a href="single-audio.php">Audio Post</a></li>
                                <li><a href="single-gallery.php">Gallery Post</a></li>
                            </ul>
                        </li>
                        
                        <?php
                        if($_SESSION["log"] == 1){
                            echo "<li><a href=" . "'createpost.php'"  . ">Create Post</a></li>";
                        }
                        ?>
                        

                        <li><a href=" 
                        <?php

                        if($_SESSION["log"] == 1){
                            echo "logout.php";
                        }else{
                            echo "login.php";
                        }
                        
                        ?>" 
                        
                        title=""><?php

                        if($_SESSION["log"] == 1){
                            echo "Logout";
                        }else{
                            echo "Login";
                        }

                        ?></a></li>

                        <!-- ============== -->

                        
                        <?php

                        if($_SESSION["log"] == 1 && $_SESSION['permissions'] == 3){
                            echo "<li><a href='admin.php'>";
                        }
                        
                        ?>
                        
                        <?php

                        if($_SESSION["log"] == 1 && $_SESSION['permissions'] == 3){ 
                            echo "Admin</a></li>";
                        }

                        ?>

                        <!-- ============== -->

                        <li><a href=" 
                        <?php

                        if($_SESSION["log"] == NULL){
                            echo "register.php";
                        }
                        
                        ?>" 
                        
                        title=""><?php

                        if($_SESSION["log"] == NULL){ 
                            echo "Create Account";
                        }

                        ?></a></li>

                    </ul> <!-- end header__nav -->

                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

                </nav> <!-- end header__nav-wrap -->

            </div> <!-- header-content -->

        </header> <!-- header -->

    </div> <!-- end s-pageheader -->

</body>

</html>