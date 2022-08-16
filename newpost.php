<?php

?>


<h1>Login</h1>

<p style = "color:red;"> <strong> <?php echo $msg ; ?> </p>

<div class = "form">

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <table>
        <tr>
            <td> Title </td>

                <tr> 
                    <td><input type = "email" name = "email"> Title </td>
                </tr> 

                <tr> 
                    <td><input type = "password" name = "password"> Content </td>
                </tr> 


                <td></td> 
                    <td><input type = "submit" name = "submitbutton" value = "Login"></td>
                </tr> 
        </tr>

        //insert into database

    </table>

</form>
