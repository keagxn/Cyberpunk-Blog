<?php
 include('resources.php'); 

 include('header.php'); 
//check for submit clicked
if(isset($_POST['submitbutton'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $bio = $_POST['bio'];
    $propic = $_POST['propic'];

    if(!empty($username) && !empty($email) && !empty($password)){

        require('conn.php');
        $query = "INSERT INTO `users` (`userid`, `username`, `email`, `password`, `permissions`, `bio`, `propic`) VALUES (NULL, '$username', '$email', '$password', '1', '$bio', '$propic' );";
        mysqli_query($conn, $query) or die ("cave brain query");
        $msg = "SUCCES REGISTA";
        $showuserstable = 1;
        header('Location: login.php');

    }else{

        $msg = 'Fill THEM BOIS.';

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
                        -1px -1px 0 #00ffff; font-size:40px; text-align: center;">Create Account</h3>

                <form name="register" id="register" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <fieldset>

                        <div class="form-field">
                            <input name="username" type="text" id="username" class="full-width" placeholder="User Name" value="">
                        </div>

                        <div class="form-field">
                            <input name="email" type="email" id="email" class="full-width" placeholder="Email" value="">
                        </div>

                        <div class="form-field">
                            <input name="password" type="password" id="password" class="full-width" placeholder="Password"  value="">
                        </div>

                        <div class="form-field">
                            <input name="bio" type="text" id="bio" class="full-width" placeholder="BIO" value="">
                        </div>

                        <div class="form-field">
                            <input name="propic" type="text" id="propic" class="full-width" placeholder="propic link" value="">
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