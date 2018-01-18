<?php
 include "../includes/config.php";
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Авторы</title>
     <link rel="SHORTCUT ICON" href="../media/index-images/favicon.png" type="image/x-icon">
     <link rel="stylesheet" type="text/css" href="../media/style.css" >
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body>


       <?php include "../header.php"; ?>

<?php
 $authors_q= mysqli_query($connection, "SELECT * FROM `authors`");
 $buchanzahl_q = mysqli_query($connection, "SELECT * FROM `buchanzahl`");

?>
<h1 class="container1-h1">Легендарные писатели</h1>
<div class="container1">
  <div class="row1 clearfix">

<?php
    while ($aut = mysqli_fetch_assoc($authors_q)){
    ?>
    <div class="column2">
      <div class="title-book">
        <a class="links-to-article" href  = "http://readbook.com/pages/author.php?Id=<?php echo $aut['Id'];?>">
        <?php echo $aut['Name']?>
        </a>
      </div>
      <?php

                    while($buch = mysqli_fetch_assoc($buchanzahl_q)){
                       $buchanzahlen[] = $buch;
                     }
                            $bucher = false;
                              foreach ($buchanzahlen as $buc) {
                                if($aut['Id'] == $buc['authorID']){
                                  $bucher = $buc;
                                  ?><div class="anzahl-book">Книг:
                                    <?php echo $bucher['anzahl'];?>
                                    </div>
                                      <?php
                                    break;
                                }





                            }
                            ?>
                            <div class="year-book">
                              Годы жизни:
                             <?php echo $aut['years'];?>
                             </div>
                           </div>
                             <?php
          }
        ?>
      </div>
      </div>

<div class="empty-space"></div>

<? include "../footer.php";?>
   </body>
 </html>
