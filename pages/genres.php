<?php
 include "../includes/config.php";
 ?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title>Жанры</title>
    <link rel="SHORTCUT ICON" href="../media/index-images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../media/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <?php include "../header.php"; ?>


    <?php
    $genres = mysqli_query($connection, "SELECT * FROM `genres`");
    ?>
    <h1 class="container1-h1">Жанры литературы</h1>
    <div class="container1">
      <div class="row1 clearfix">
        <ul>
          <?php
    while($gen = mysqli_fetch_assoc($genres)){
      ?>
      <a class="links-to-article" href  = "http://readbook.com/pages/genre.php?id=<?php echo $gen['id'];?>">
        <li><h4><?php echo $gen['name'];?></h4></li>
      </a>
      <?php
    }
    ?>
    </ul>
      </div>
    </div><div class="empty-space"></div>
<? include "../footer.php";?>
  </body>

  </html>
