<?php
session_start();
if(!isset($_SESSION['userid'])){
header('Location:login.php');
}else{

//list all users

require('conn.php');

$query = "SELECT * FROM `users`";
$result = mysqli_query($conn, $query) or die ('Bad select query');

?>

<html>

<head>

</head>

    <body>
    
    <h1> Users /<h1>

    <form name = "displayusers "method = "POST"  action = "useredit.php">

        <table border = "1" width = "50%">
            <thead>
                <tr>
                    <td> User ID </td>
                    <td> First Name </td>
                    <td> Last Name </td>
                    <td> Email </td>
                    <td> Permission ID </td>
                </tr>
            </thead>

                <tbody>

                    <?php
                        while ($row = mysqli_fetch_array($result)){
                        echo '<tr><td> <input type = "radio" name = "userid" value = "' . $row['userid'] . '"> </td>' ;
                        echo '<td>' . $row['firstname'] . '</td>' ;
                        echo '<td>' . $row['lastname'] . '</td>' ;
                        echo '<td>' . $row['email'] . '</td>' ;
                        echo '<td>' . $row['permissionid'] . '</td></tr>' ;
                        }
                    ?>

                    <input type = "submit" name = "submitbutton" value = "edit user">
                    </form>

                </tbody>

        </table>
    </body>
</html>

<?php } ?>