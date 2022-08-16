<?php 

    require('conn.php');

    if(isset($_GET['articleid'])){
        $articleid = $_GET['articleid'];
    }

//title
$titleq = "SELECT `title` FROM `articles` WHERE `articleid` = '$articleid' ;";
$titler = mysqli_query($conn, $titleq) or die ('Bad select query');

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
$categoryq = "SELECT `category` FROM `articles` WHERE `articleid` = '$articleid' ;";
$categoryr = mysqli_query($conn, $categoryq) or die ('Bad select query');

while ($row = mysqli_fetch_array($categoryr)){
    $category = $row['category'] ;
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

?>