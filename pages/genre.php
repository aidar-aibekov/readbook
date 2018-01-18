<?php
 include "../includes/config.php";
 ?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title>Жанр</title>
    <link rel="SHORTCUT ICON" href="../media/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../media/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <?php include "../header.php"; ?>


    <?php
    $books_q_ordered_by_genre = mysqli_query($connection, "SELECT * FROM `books` where genreId =  " . (int) $_GET['id']);
    $genre = $authors_q = mysqli_query($connection, "SELECT * FROM `genres` where id =  " . (int) $_GET['id']);
    $gen = mysqli_fetch_assoc($genre);
    $authors_q = mysqli_query($connection, "SELECT * FROM `authors`");
    while ($aut = mysqli_fetch_assoc($authors_q)){
       $authors[] = $aut;
    }

    ?>
    <h1 class="container1-h1">Книги в жанре <?php echo $gen['name'];?></h1>
    <div class="container1">
      <div class="row1 clearfix">
          <?php

    while($boo = mysqli_fetch_assoc($books_q_ordered_by_genre)){
  ?>
      <div class="column1">
        <div class="image-book">
          <a class="links-to-article" href  = "http://readbook.com/pages/article.php?Id=<?php echo $boo['Id'];?>">
          <img src="../media/book-images/<?php echo $boo['image'];?>" alt="image-of-book">
          </a>
        </div>
        <div class="title-book">
          <a class="links-to-article" href  = "http://readbook.com/pages/article.php?Id=<?php echo $boo['Id'];?>">
        <?php print $boo['Title'];?>
        </a>
        </div>
      <?php
                          $art_cat = false;
                          foreach ($authors as $aut) {
                              if($aut['Id'] == $boo['AuthorId'])
                              {
                                $art_cat = $aut;
                                break;
                              }
                            }
                          ?>
                          <br>
          <div class="author-book">
            <a class="links-to-article" href  = "http://readbook.com/pages/author.php?Id=<?php echo $aut['Id'];?>">
            <?php echo $art_cat['Name'];?>
            </a>
         </div>
         <div class="year-book">
           Год выпуска:
          <?php echo $boo['year'];?>
          </div>
         <div class="views-book">Просмотров:
           <?php echo $boo['views'];?>
         </div>

        </div>
        <?php
    }?>


</div>
</div><div class="empty-space"></div>
<? include "../footer.php";?>
  </body>

  </html>
