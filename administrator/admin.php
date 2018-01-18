<?php
 include "../includes/config.php";
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Администратор</title>
  <link rel="SHORTCUT ICON" href="../media/favicon.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="../media/style.css" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php include "../header.php"; ?>
    <section class="main-admin">
      <h1 class="h1-admin">Привет, Администратор!</h1>
      <div class="h2-position-admin">
        <div class="first-h2-admin">
          <h2 class="h2-admin1">Действия с книгами</h2>
        </div>
        <div class="second-h2-admin">
          <h2 class="h2-admin2">Действия с авторами</h2>
        </div>
      </div>



        <div class="block-buttons-book">
            <form action="http://readbook.com/administrator/addbook.php">
              <button class="buttons-admin"  type="submit">Добавить книгу</button>
            </form>

            <form action="http://readbook.com/administrator/removebook.php">
              <button class="buttons-admin" type="submit">Удалить книгу</button>
            </form>

            <form action="http://readbook.com/administrator/choosebook.php">
              <button class="buttons-admin" type="submit">Редактировать</button>
            </form>

          </div>
          <div class="block-buttons-author">
              <form  action="http://readbook.com/administrator/addauthor.php">
              <button  class="buttons-admin" type="submit">Добавить автора</button>
            </form>

            <form action="http://readbook.com/administrator/removeauthor.php">
              <button class="buttons-admin" type="submit">Удалить автора</button>
            </form>

            <form action="http://readbook.com/administrator/chooseauthor.php">
              <button class="buttons-admin" type="submit">Реадктировать</button>
            </form>
          </div>
        </section>
        <div class="empty-space"></div>
<? include "../footer.php";?>
</body>

</html>
