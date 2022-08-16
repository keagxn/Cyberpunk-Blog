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

                    $recentq = "SELECT * FROM `articles` ORDER BY `datepublished` DESC ;";
                    $recentr = mysqli_query($conn, $recentq) or die ('Bad select query');

                    while($row = mysqli_fetch_array($recentr)){

                        $title = $row['title'] ;
                        $publisher = $row['publisher'] ;
                        $content = $row['content'] ;
                        $articleid = $row['articleid'] ;
                        $image = $row['image'] ;
                        ' ; echo $row["image"] ;  echo '

                        echo'

                        <article class="masonry__brick entry format-standard" data-aos="fade-up">

                        <div class="entry__thumb">
                            <a href="single-standard.html" class="entry__thumb-link">
                                <img src="' ; echo $row["image"] ;  echo '" alt="boi">
                            </a>
                        </div>
                        
                        <div class="entry__text">
                            <div class="entry__header">
                        
                                <div class="entry__date">
                                    <a href="article.php?articleid=3">' ; echo $row["date"] ;  echo '</a>
                                </div>
                                <h1 class="entry__title"><a href="single-standard.html">' ; echo $row["title"] ;  echo '</a>
                                </h1>
                        
                            </div>
                            <div class="entry__excerpt">
                                <p> ' ; echo $row["content"] ;  echo ' </p>
                            </div>
                            <div class="entry__meta">
                                <span class="entry__meta-links">
                                    <a href="category.php?catergoryid=' ; echo $row["category"] ;  echo '">' ; echo $row["category"] ;  echo '</a>
                                </span>
                            </div>
                        </div>
                        
                        </article>

                ';
                    }


                ?>

<article class="masonry__brick entry format-standard" data-aos="fade-up">

<div class="entry__thumb">
    <a href="single-standard.html" class="entry__thumb-link">
        <img src="<?php echo $row['image'] ; ?>" alt="boi">
    </a>
</div>

<div class="entry__text">
    <div class="entry__header">

        <div class="entry__date">
            <a href="article.php?articleid=3"><?php echo $row['date'] ; ?></a>
        </div>
        <h1 class="entry__title"><a href="single-standard.html"><?php echo $row['title'] ; ?></a>
        </h1>

    </div>
    <div class="entry__excerpt">
        <p> <?php echo $row['content'] ; ?> </p>
    </div>
    <div class="entry__meta">
        <span class="entry__meta-links">
            <a href="category.php?catergoryid=<?php echo $row['category'] ; ?>"><?php echo $row['category'] ; ?></a>
        </span>
    </div>
</div>

</article>