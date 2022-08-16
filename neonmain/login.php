<?php
include('resources.php');
include('header.php'); 

//check for submit clicked
if(isset($_POST['submitbutton'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    if(empty($email) OR empty ($password)){

        $msg = "Please corect fill them in rat" ;

    }else{

        require('conn.php');
        $query = "SELECT * FROM `users` WHERE `users` . `email` = '$email';";

        $result = mysqli_query($conn, $query) or die ('Bad Select query');

        if($rowcount = mysqli_num_rows($result) > 0){

            //check passpword match
            while($row = mysqli_fetch_array($result)){

                if ($password == $row['password']){

                    $_SESSION['username'] = $row['username'];
                    $_SESSION['userid'] = $row['userid'];
                    $_SESSION['permissions'] = $row['permissions'];

                    //forward user to restericated area
                    echo("<script>location.href = 'index.php';</script>");
                    $_SESSION["log"] = 1 ;

                }else{

                    $msg = "Username or pass inval" ;

                }

            }

        }else{
            //username id did not exist, print err msg
            $msg = "Username or pass inval" ;

        }

    }

}else{

    $msg = '';

}

?>

<!DOCTYPE html>
<html class="no-js" lang="en">





    <!-- Form
    ================================================== -->
    <section class=" s-content--narrow">

        <div class="row">

            <div class="col-full ">

                <h3 style="color:black; text-shadow: -1px 1px 0 #E01480,
                          1px 1px 0 #00ffff,
                         1px -1px 0 #00ffff,
                        -1px -1px 0 #00ffff; font-size:40px; text-align: center;">Login</h3>

                <form name="login" id="login" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <fieldset>

                        <div class="form-field">
                            <input name="username" style="text-align: center;" type="text" id="usernmae" class="full-width" placeholder="User Name" value="">
                        </div>

                        <div class="form-field">
                            <input name="email" style="text-align: center;" type="email" id="email" class="full-width" placeholder="Your Email" value="">
                        </div>

                        <div class="form-field">
                            <input name="password" style="text-align: center;" type="password" id="password" class="full-width" placeholder="Password"  value="">
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