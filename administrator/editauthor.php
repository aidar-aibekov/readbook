<?php
 include "../includes/config.php";
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Изменить автора</title>
  <link rel="SHORTCUT ICON" href="../media/favicon.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="../media/style.css" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <?php include "../header.php";
  $author_query = mysqli_query($connection, "SELECT * FROM authors WHERE Id = " . (int) $_GET['Id']);
  $aut = mysqli_fetch_assoc($author_query);
  ?>
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
    <h1 class="h1-admin">Измените автора!</h1>
    <h3 class="h1-admin">Редактируйте только те поля которые хотите изменить</h3>

    <form action="editauthor.php" method="post">
      <div class="title-book-admin">
        Иденитификатор автора в таблице (его изменение недоступно)
      </div>
      <div class="title-book-input-admin">
        <input  class="input-admin" type="text" name="ids" value="<?php echo $aut['Id'];?>" autocomplete="off"  size="40">
      </div>
      <div class="title-book-admin">
        Имя автора или его псевдоним
      </div>
      <div class="title-book-input-admin">
        <input  class="input-admin" type="text" name="name" value="<?php echo $aut['Name'];?>" autocomplete="off" placeholder="Чингиз Айтматов например..." size="40">
      </div>
      <div class="title-book-admin">
        Годы жизни автора
      </div>
      <div class="title-book-input-admin">
        <input class="input-admin" type="text" name="years" value="<?php echo $aut['years'];?>" autocomplete="off" placeholder="В формате 1928-2008..." size="40">
      </div>
      <div class="title-book-admin">
        <input class="buttons-admin" type="submit" name="add" value="Изменить" autocomplete="off" >
      </div>
      </form>
    </div>
<?php
  if(isset($_POST['add'])){
  $name = strip_tags(trim($_POST['name']));
  $years = strip_tags(trim($_POST['years']));
  $ids = strip_tags(trim($_POST['ids']));

  $result = mysqli_query($connection, "UPDATE authors SET Name = '$name', years = '$years' where Id = $ids");
      echo '<span style = "color: green; font-weight: bold; margin-bottom: 10px; display: block; ">
                           Автор успешно изменена!</span>';
                           echo $ids;

    }


 ?>
<div class="empty-space"></div>
<? include "../footer.php";?>
</body>

</html>
