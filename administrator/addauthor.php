<?php
 include "../includes/config.php";
?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title>Добавить автора</title>
    <link rel="SHORTCUT ICON" href="../media/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../media/style.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <?php include "../header.php"; ?>
    <div class="menu-admin">
      <h3 class="h1-admin">Еще Действия</h3>
      <form action="http://readbook.com/administrator/admin.php">
          <button class="buttons-admin" type="submit">На админку</button>
      </form>
        <form action="http://readbook.com/administrator/addbook.php">
          <button class="buttons-admin" type="submit">Добавить книгу</button>
        </form>
       <form action="http://readbook.com/administrator/addauthor.php">
        <button class="buttons-admin" type="submit">Добавить автора</button>
       </form>
       <form action="http://readbook.com/administrator/removebook.php">
        <button class="buttons-admin" type="submit">Удалить книгу</button>
       </form>
       <form action="http://readbook.com/administrator/removeauthor.php">
         <button class="buttons-admin"  type="submit">Удалить автора</button>
      </form>
      <form action="http://readbook.com/administrator/choosebook.php">
          <button class="buttons-admin" type="submit">Изменить книгу</button>
      </form>
      <form action="http://readbook.com/administrator/chooseauthor.php">
       <button class="buttons-admin" type="submit">Изменить автора</button>
      </form>
    </div>


    <div class="main-admin-heightauto">
      <h1 class="h1-admin">Добавьте автора!</h1>
      <form action="addauthor.php" method="post">
        <div class="title-book-admin">
          Имя автора или его псевдоним (вводить кириллицей)
        </div>
        <div class="title-book-input-admin">
          <input  class="input-admin" type="text" name="name" autocomplete="off" placeholder="Чингиз Айтматов например..." size="40">
        </div>
        <div class="title-book-admin">
          Годы жизни автора (в формате 1928-2008)
        </div>
        <div class="title-book-input-admin">
          <input class="input-admin" type="text" name="years" autocomplete="off" placeholder="В формате 1928-2008..." size="40">
        </div>
        <div class="title-book-admin">
          <input class="buttons-admin" type="submit" name="add" value="Добавить" autocomplete="off" >
        </div>
        </form>
      </div>
  <?php
    if(isset($_POST['add'])){
    $name = strip_tags(trim($_POST['name']));
    $years = strip_tags(trim($_POST['years']));
    $result = mysqli_query($connection, "INSERT INTO authors (Name, years, views) values ('$name','$years', 0)");
        echo '<span style = "color: green; font-weight: bold; margin-bottom: 10px; display: block; ">
                             Автор успешно добавлен!</span>';

      }


   ?>
<div class="empty-space"></div>
<? include "../footer.php";?>
  </body>

  </html>
