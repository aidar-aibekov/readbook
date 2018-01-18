<?php
 include "../includes/config.php";
 ?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title>Автор</title>
    <link rel="SHORTCUT ICON" href="../media/index-images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../media/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <?php include "../header.php";
    $authors = mysqli_query($connection, "SELECT * FROM authors  WHERE Id = " . (int) $_GET['Id']);
    if( mysqli_num_rows($authors) <= 0 ){
      ?>
          <h1>Статья не найдена</h1>
      <?php
    }else{
      $aut = mysqli_fetch_assoc($authors);
      mysqli_query($connection, "UPDATE authors SET views = views + 1 WHERE Id = " . (int)$aut['Id']);
      ?>
    <div class="author">
      <div class="row-author">
        <div class="title-author">
        <?php print $aut['Name'];?>
        </div>
      <?php
      $buchanzahl = mysqli_query($connection, "SELECT * FROM buchanzahl
                   WHERE authorID = " . (int) $aut['Id'] . "" );
      $buch = mysqli_fetch_assoc($buchanzahl);
      $books = mysqli_query($connection, "SELECT Title FROM books  WHERE AuthorId = " . (int) $aut['Id'] . "" );

      ?>
        <table class="table-author">


         <div class="year-author">
           <tr class="year-author">
             <td class="td-color-author">Годы жизни:</td><td><?php echo $aut['years'];?></td>
           </tr>
          </div>
         <div class="views-author">

             <div>Просмотров: <?php echo $aut['views'];?></div>

         <!-- <div class="description-article">
           <tr class="description-article" >
             <td class="td-color-article">Описание:</td><td><?php //echo $boo['description'];?></td>
           </tr>
         </div> -->
         <div class="books-author">
           <tr class="books-author">
             <td class="td-color-author">Книги:</td><td><?php
                while ($boo = mysqli_fetch_assoc($books)){
                  echo $boo['Title']; ?><br><?php
                }
             ?></td>
           </tr>
          </div>
      </table>

        </div>


  </div>
    <?php
      }
    ?><div class="empty-space"></div>
    <? include "../footer.php";?>
  </body>

  </html>
