<?php
require('conn.php');

$userid = $_POST['userid'] ;


$query = "select * from `users` where `users`.`userid` = " . $userid ;
$result = mysqli_query($conn, $query) or die ('BAD QUUUUUAUAUAU');

if(isset($_POST['submit'])){
    $userid = $_POST['userid'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST["email"];
    $password = $_POST['password'];
    $permissionid = $_POST['permissionid'];

    if(empty($_POST['password'])){

        $insertquery = "UPDATE `users` SET `firstname` = '$fname', `lastname` = '$lname', `email` = '$email', `password` = '$password', `permissionid` = '$permissionid' WHERE `users`.`userid` = $userid;";

    }else{

        $insertquery = "UPDATE `users` SET `firstname` = '$fname', `lastname` = '$lname', `email` = '$email', `password` = '$password', `permissionid` = '$permissionid' WHERE `users`.`userid` = $userid;";

    }
}

?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<body>

<div class = 'container'>

<h1> Edit User: </h1>

    <form method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>">

    <?php while ($row = mysqli_fetch_array($result)){ 

        echo '<input type = "hidden" name = "userid" value = "'. $userid .'">';
        echo '<p> Firstname </p> <input type = "text" name = "firstname" value = "'. $row ['firstname'] .'"> <br><br>';
        echo '<p> Lastname </p> <input type = "text" name = "firstname" value = "'. $row ['lastname'] .'"> <br><br>';
        echo '<p> Email </p> <input type = "text" name = "firstname" value = "'. $row ['email'] .'"> <br><br>';
        echo '<p> Password </p> <input type = "text" name = "password" <br><br>';
        echo '<p> PermissionID </p> <input type = "text" name = "permissionid" value = "'. $row ['permissionid'] .'"> <br><br>';

        echo '<input type = "submit" name = "submit" value ="Submit Changes">';

    } ?>

    </form>

    </div>

</body>

</html>