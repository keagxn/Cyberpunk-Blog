<?php

//check for submit clicked
include('resources.php'); 
include('header.php'); 

require('conn.php');

if(isset($row['categoryid'])){
    $catid = $row['categoryid'] ;

    }else{
        $catid = "broken" ;

    }

if(isset($_POST['submitbutton'])){

    $title = $_POST['title'];
    $content = htmlentities($_POST['content'] , ENT_QUOTES);
    $image = $_POST['image'];
    $category = $_POST['category'];

//category
$categoryq = "SELECT `categoryid` FROM `categories` WHERE `categoryname` = '$category' ;";
$categoryr = mysqli_query($conn, $categoryq) or die ('Bad select query');

while ($row = mysqli_fetch_array($categoryr)){

    $catid = $row['categoryid'] ;

        require('conn.php');
        $he = "INSERT INTO `articles` (`articleid`, `category`, `title`, `publisher`, `datepublished`, `content`, `image`, `visible`) VALUES (NULL, '$catid', '$title', '{$_SESSION['userid']}', current_timestamp(), '$content', '$image', '1');";

        $result = mysqli_query($conn, $he) or die ('Bad Select query');

        $msg = "SUCCES REGISTA";

    }

}else{

    $msg = '';

}


?>

<!DOCTYPE html>
<html class="no-js" lang="en">




    <!-- Form
    ================================================== -->
    <section class="s-content s-content--narrow">

        <div class="row">   

            <div class="col-full s-content__main" >

                <h3 style="color:black; text-shadow: -1px 1px 0 #E01480,
                          1px 1px 0 #00ffff,
                         1px -1px 0 #00ffff,
                        -1px -1px 0 #00ffff; font-size:40px; text-align: center;">Create Post </h3>

                <form name="create" id="create" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <fieldset>

                        <div class="form-field">
                            <input name="title" type="text" id="title" class="full-width" placeholder="Title" value="" style = "border: 2px solid #00ffff; color: purple;">
                        </div>

                        <div class="form-field">
                            <textarea id="editor" name='content' class="full-width" placeholder="Content" value="" style = "border: 3px solid #00ffff; color:#E01480;"></textarea> <script>
                            ClassicEditor
                                .create(document.querySelector('#editor'))
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                        </div>

                        <div class="form-field">
                            <input name="image" type="text" id="image" class="full-width" placeholder="Paste Image Link"  value="" style = "border: 2px solid #00ffff; color:#E01480;">
                        </div>

                        <div class="form-field">

                        
                        <select id="category" name = "category" style = "border: 2px solid #00ffff; color:#E01480; ">

                        <?php
                        require('conn.php');
                        //category
                        $categoryq = "SELECT `categoryname` FROM `categories` WHERE categoryid > 0;";
                        $categoryr = mysqli_query($conn, $categoryq) or die ('Bad select query');

                        while ($row = mysqli_fetch_array($categoryr)){
                            $category = $row['categoryname'] ;

                            echo '<option value="'; echo $category ; echo '" method="post""' ; echo'">';  echo $category ; echo '</option>';

                        }
                        ?>
                            </select>
                        </div>

                        <?php 
                            echo $msg;    
                        ?>

                        <button name= "submitbutton" type="submit" class="submit btn btn--primary full-width">Submit</button>


                    </fieldset>
                </form> <!-- end form -->

            </div> <!-- end s-content__main -->

        </div> <!-- end row -->

    </section> <!-- s-content -->

    <?php include('footer.php'); ?>
    
</body>

</html>