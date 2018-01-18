<?php
 include "../includes/config.php";
 ?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title>Книги</title>
    <link rel="SHORTCUT ICON" href="../media/index-images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../media/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <?php include "../header.php"; ?>


    <?php
    $books_q_ordered_by_views = mysqli_query($connection, "SELECT * FROM `books` order by views desc limit 5");
    $authors_q = mysqli_query($connection, "SELECT * FROM `authors`");

    while ($aut = mysqli_fetch_assoc($authors_q)){
       $authors[] = $aut;
    }
    $genres_q = mysqli_query($connection, "SELECT * FROM `genres`");

    while ($gen = mysqli_fetch_assoc($genres_q)){
       $genre[] = $gen;
    }

    ?>
    <h1 class="container1-h1">Мировые Хиты</h1>
    <div class="container1">
      <div class="row1 clearfix">
          <?php

    while($boo = mysqli_fetch_assoc($books_q_ordered_by_views)){
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
          <?php
                              $book_gen = false;
                              foreach ($genre as $gen) {
                                  if($gen['id'] == $boo['genreId'])
                                  {
                                    $book_gen = $gen;
                                    break;
                                  }
                                }
                              ?>

        <div class="year-book">
          Жанр:
         <?php echo $book_gen['name'];?>
         </div>
         <div class="views-book">Просмотров:
           <?php echo $boo['views'];?>
         </div>

        </div>
        <?php
    }?>


</div>
</div>


          <!-- Новиники -->
    <?php
      $books_q_ordered_by_date = mysqli_query($connection, "SELECT * FROM `books` order by Id desc limit 5");
      ?>



<h1 class="container1-h1">Новинки</h1>
<div class="container1">
  <div class="row1 clearfix">
      <?php

while($boo = mysqli_fetch_assoc($books_q_ordered_by_date)){
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
      <?php
                          $book_gen = false;
                          foreach ($genre as $gen) {
                              if($gen['id'] == $boo['genreId'])
                              {
                                $book_gen = $gen;
                                break;
                              }
                            }
                          ?>

    <div class="year-book">
      Жанр:
     <?php echo $book_gen['name'];?>
     </div>

     <div class="views-book">Просмотров:
       <?php echo $boo['views'];?>
     </div>

    </div>
    <?php
}?>


</div>
</div>


<!-- Случайные книги -->
<?php
$books_q_ordered_by_rand = mysqli_query($connection, "SELECT * FROM `books` ORDER BY RAND() LIMIT 5");
?>



<h1 class="container1-h1">Случайные книги</h1>
<div class="container1">
<div class="row1 clearfix">
<?php

while($boo = mysqli_fetch_assoc($books_q_ordered_by_rand)){
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
            <?php
                    $book_gen = false;
                    foreach ($genre as $gen) {
                        if($gen['id'] == $boo['genreId'])
                        {
                          $book_gen = $gen;
                          break;
                        }
                      }
                    ?>

<div class="year-book">
Жанр:
<?php echo $book_gen['name'];?>
</div>

<div class="views-book">Просмотров:
<?php echo $boo['views'];?>
</div>

</div>
<?php
}?>


</div>
</div>
<? include "../footer.php";?>
  </body>

  </html>
