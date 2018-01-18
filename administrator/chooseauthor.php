<?php
 include "../includes/config.php";
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Выбери книгу</title>
  <link rel="SHORTCUT ICON" href="../media/favicon.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../media/style.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php include "../header.php";?>
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
        <h1 class="h1-admin">Выберите автора которого хотите изменить </h1>
        <?php
        $authors_q_ordered_by_alpha = mysqli_query($connection, "SELECT * FROM `authors` order by id asc");

        ?>
        <div class="container1">
          <div class="row1 clearfix">
            <ul>
              <?php
        while($auto = mysqli_fetch_assoc($authors_q_ordered_by_alpha)){
          ?>
          <a class="links-to-article" href  = "http://readbook.com/administrator/editauthor.php?Id=<?php echo $auto['Id'];?>">
            <li><h4><?php echo $auto['Name'];?></h4></li>
          </a>
          <?php
        }
        ?>
        </ul>
          </div>
        </div>
          </div><div class="empty-space"></div>
<? include "../footer.php";?>
</body>

</html>
