<?php
 include "../includes/config.php";
 ?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title>Книга</title>
    <link rel="SHORTCUT ICON" href="../media/index-images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../media/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <?php include "../header.php";
    $book = mysqli_query($connection, "SELECT * FROM books  WHERE Id = " . (int) $_GET['Id']);
    if( mysqli_num_rows($book) <= 0 ){
      ?>
          <h1>Статья не найдена</h1>
      <?php
    }else{
      $boo = mysqli_fetch_assoc($book);
      mysqli_query($connection, "UPDATE books SET views = views + 1 WHERE Id = " . (int)$boo['Id']);
      ?>
    <div class="article">
      <div class="row-article">
        <!-- <div class="column-article"> -->
        <div class="image-article">
          <img src="../media/book-images/<?php echo $boo['image'];?>" alt="image-of-book">
        </div>
        <div class="title-article">
        <?php print $boo['Title'];?>
        </div>
      <?php
      $authors = mysqli_query($connection, "SELECT * FROM authors
                   WHERE Id = " . (int) $boo['AuthorId'] . "" );
      $author = mysqli_fetch_assoc($authors);
      ?>
        <table class="table-article">

          <div class="author-article">
          <tr class="author-article">
            <td class="td-color-article">Автор:</td>
            <td><?php echo $author['Name'];?></td>
          </tr>

          </div>
         <div class="year-article">
           <tr class="year-article">
             <td class="td-color-article">Год:</td><td><?php echo $boo['year'];?></td>
           </tr>
          </div>
         <div class="views-article">

             <div>Просмотров: <?php echo $boo['views'];?></div>

         <div class="description-article">
           <tr class="description-article" >
             <td class="td-color-article">Описание:</td><td><?php echo $boo['description'];?></td>
           </tr>
         </div>
      </table>

        </div>

    <!-- </div> -->
  </div>
    <?php
      }
    ?><div class="empty-space"></div>
    <? include "../footer.php";?>
  </body>

  </html>
