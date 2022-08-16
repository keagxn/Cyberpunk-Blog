<!DOCTYPE html>
<html class="no-js" lang="en">
    
<?php 

    include('resources.php'); 

    include('header.php'); 

    require('conn.php');

    if(isset($_GET['articleid'])){
        $articleid = $_GET['articleid'];
    }

$titleq = "SELECT `title` FROM `articles` WHERE `articleid` = '$articleid' ;";
$titler = mysqli_query($conn, $titleq) or die ('Bad select query');

//title
while ($row = mysqli_fetch_array($titler)){
    $title = $row['title'] ;
}

//date
$datepublishedq = "SELECT `datepublished` FROM `articles` WHERE `articleid` = '$articleid' ;";
$datepublishedr = mysqli_query($conn, $datepublishedq) or die ('Bad select query');

while ($row = mysqli_fetch_array($datepublishedr)){
    $date = $row['datepublished'] ;
}

//category
$categoryq = "SELECT categories.categoryname FROM `articles` INNER JOIN categories ON articles.category = categories.categoryid ;";
$categoryr = mysqli_query($conn, $categoryq) or die ('Bad select query');

while ($row = mysqli_fetch_array($categoryr)){
    $category = $row['categoryname'] ;
}

//content
$contentq = "SELECT `content` FROM `articles` WHERE `articleid` = '$articleid' ;";
$contentr = mysqli_query($conn, $contentq) or die ('Bad select query');

while ($row = mysqli_fetch_array($contentr)){
    $content = $row['content'] ;
}

//publisher
$publisherq = "SELECT `publisher` FROM `articles` WHERE `articleid` = '$articleid' ;";
$publisherr = mysqli_query($conn, $publisherq) or die ('Bad select query');

while ($row = mysqli_fetch_array($publisherr)){
    $publisher = $row['publisher'] ;
}

//username
$usernameq = "SELECT `username` FROM `users` WHERE `userid` = '$publisher' ;";
$usernamer = mysqli_query($conn, $usernameq) or die ('Bad select query');

while ($row = mysqli_fetch_array($usernamer)){
    $username = $row['username'] ;
}

//image
$imageq = "SELECT `image` FROM `articles` WHERE `articleid` = '$articleid' ;";
$imager = mysqli_query($conn, $imageq) or die ('Bad select query');

while ($row = mysqli_fetch_array($imager)){
    $image = $row['image'] ;
}

//bio
$bioq = "SELECT `bio` FROM `users` WHERE `userid` = '$publisher' ;";
$bior = mysqli_query($conn, $bioq) or die ('Bad select query');

while ($row = mysqli_fetch_array($bior)){
    $bio = $row['bio'] ;
}

//profile pic
$propicq = "SELECT `propic` FROM `users` WHERE `userid` = '$publisher' ;";
$propicr = mysqli_query($conn, $propicq) or die ('Bad select query');

while ($row = mysqli_fetch_array($propicr)){
    $propic = $row['propic'] ;
}

?>

    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title" style="color:black; text-shadow: -1px 1px 0 #E01480,
                          1px 1px 0 #00ffff,
                         1px -1px 0 #00ffff,
                        -1px -1px 0 #00ffff; font-size:60px;">
                    <?php echo $title ; ?>
                </h1>
                <ul class="s-content__header-meta">
                    <li class="date" style = "color: #E01480; "><?php echo $date ; ?></li>
                    <li class="cat" style = "color: #E01480; ">
                        Category:
                        <a href="#0" style = "color: #E01480; "><?php echo $category ; ?></a>
                    </li>
                </ul>
            </div> <!-- end s-content__header -->
    
            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <img src="<?php echo $image ; ?>" alt="Image don work" >
                </div>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

                <p class="lead" style= "color:cyan;"><?php echo html_entity_decode($content) ; ?></p>
                <hr style= size="3", color=#E01480>

                <div class="s-content__author">
               
                    <img src="<?php echo $propic ; ?>" alt="">

                    <div class="s-content__author-about">
                        <h4 class="s-content__author-name" style= "color:cyan;">
                            <a href="#0" style= "color:cyan;"><?php echo "Author: " . $username ; ?></a>
                        </h4>
                    
                        <p style= "color:white;"> <?php echo "About " . $username . ": " . $bio ; ?> </p>

                    </div>
                    
                </div>
                <hr style= size="3", color=#E01480>

            </div> <!-- end s-content__main -->

        </article>


        <!-- comments
        ================================================== -->
        <div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">


                    <h3 class="h2"><?php 
                require('conn.php');

                    $countq = "SELECT count(*) FROM `comments` WHERE `articleid` = '$articleid';" ;
                    $countr = mysqli_query($conn, $countq) or die ('Bad select query');

                    $row = mysqli_fetch_row($countr);
                    echo $row['0'] . " Comments" ; //Here is your count

                        ?></h3>
        <?php //most recent ones 


                    $commentq = "SELECT * FROM `comments` WHERE `articleid` = '$articleid' ORDER BY `pubdate` DESC ;";
                    $commentr = mysqli_query($conn, $commentq) or die ('Bad select query');

                    while($row = mysqli_fetch_array($commentr)){

                        $comment = $row['comment'] ;
                        $publisher = $row['publisher'] ;
                        $pubdate = $row['pubdate'] ;

                        echo'


                    <!-- commentlist -->
                    <ol class="commentlist">

                        <li class="depth-1 comment">

                            <div class="comment__avatar">
                                <img width="50" height="50" class="avatar" src="';
                                
                                
                                
                                $pfq = "SELECT `propic` FROM `users` WHERE `userid` = '$publisher' ;";
                                $pfr = mysqli_query($conn, $pfq) or die ('Bad select query');

                                    while($row = mysqli_fetch_array($pfr)){

                                        $pfp = $row['propic'] ;
                                        echo $pfp;
                                    }
                                
                                
                                
                                
                                
                                echo '" alt="">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                    <cite>';echo $publisher ; echo '</cite>

                                    <div class="comment__meta">
                                        <time class="comment__time">';echo $pubdate ; echo '</time>
                                    </div>
                                </div>

                                <div class="comment__text">
                                <p>';echo $comment ; echo '</p>
                                </div>

                            </div>
                            </li>

                            ' ; }

        ?>





                      

                        

                        </li> <!-- end comment level 1 -->

                        

                    </ol> <!-- end commentlist -->


                    <!-- respond
                    ================================================== -->
                    <div class="respond">

                        <h3 class="h2">Add Comment</h3>

                        <form name="comment" id="comment" method="post" action="">
                            <fieldset>

                                <div class="form-field">
                                        <input name="comment" type="text" id="comment" class="full-width" placeholder="Add a Comment" value="">
                                </div>

                                <button name="submitbutton" type="submitbutton" class="submit btn--primary btn--large full-width">Submit</button>

                            </fieldset>
                        </form> <!-- end form -->

                    </div> <!-- end respond -->

                    <?php 
                        require('conn.php');
                        if(isset($_POST['submitbutton'])){

                            $comment = $_POST['comment'];


                            //category
                            $commentq = "INSERT INTO `comments` (`commentid`, `publisher`, `comment`, `pubdate`, `visible`, `articleid`) VALUES (NULL, '{$_SESSION['userid']}', '$comment', current_timestamp(), '1', '$articleid') ;";
                            $commentr = mysqli_query($conn, $commentq) or die ('Bad select query');

                            

                        }else{

                            $msg = '';

                        }

                        ?>
                    
                    
                    
                    










                </div> <!-- end col-full -->

            </div> <!-- end row comments -->
        </div> <!-- end comments-wrap -->

    </section> <!-- s-content -->

    <?php include('footer.php'); ?>

</body>

</html>