<?php
 include "../includes/config.php";
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Изменить книгу</title>
  <link rel="SHORTCUT ICON" href="../media/favicon.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../media/style.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php include "../header.php";
    $book = mysqli_query($connection, "SELECT * FROM books  WHERE Id = " . (int) $_GET['Id']);
    $boo = mysqli_fetch_assoc($book);
    ?>

  <?php
         $authors_q = mysqli_query($connection, "SELECT * FROM `authors`");
         $authors = array();
         while ($aut = mysqli_fetch_assoc($authors_q)){
            $authors[] = $aut;
         }
         $genres_q = mysqli_query($connection, "SELECT * FROM `genres`");
         $genres = array();
         while ($gen = mysqli_fetch_assoc($genres_q)){
            $genres[] = $gen;
         }
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
        <h1 class="h1-admin">Измените данные книги</h1>
        <h3 class="h1-admin">Редактируйте только те поля которые хотите изменить</h3>
        <form action="editbook.php" method="post" >
          <div class="title-book-admin">
            Иденитификатор книги в таблице (его изменение недоступно)
          </div>
          <div class="title-book-input-admin">
            <input class="input-admin" type="text" name="ids" value="<?php echo $boo['Id'];?>" autocomplete="off" size="40">
          </div>
          <div class="title-book-admin">
            Введите название книги
          </div>
          <div class="title-book-input-admin">
            <input class="input-admin" type="text" name="name" value="<?php echo $boo['Title'];?>" autocomplete="off" size="40" placeholder="Гарри Поттер например...">
          </div>
          <div class="title-book-admin">
            Выберите автора
          </div>
          <div class="title-book-input-admin">
            <input class="input-admin" list="auts" name="auts" value="<?php
             foreach($authors as $aut){
               if($boo['AuthorId']==$aut['Id']){
                 echo $aut['Name'];
               }
             }
             ?>" size = "40" placeholder="Чингиз Айтматов например...">
          <datalist id="auts">
            <?php foreach ($authors as $aut){
              ?>
              <option value="<?php echo $aut['Name'];?>">
                <?php
              }
              ?>
          </datalist>
         </div>
         <div class="title-book-admin">
           Выберите автора
         </div>
         <div class="title-book-input-admin">
           <input class="input-admin" list="gens" name="gens" value="<?php
            foreach($genres as $gen){
              if($boo['genreId']==$gen['id']){
                echo $gen['name'];
              }
            }
            ?>" size = "40" placeholder="Повесть например...">
         <datalist id="gens">
           <?php foreach ($genres as $gen){
             ?>
             <option value="<?php echo $gen['name'];?>">
               <?php
             }
             ?>
         </datalist>
        </div>
          <div class="title-book-admin">
            Описание
          </div>
          <div class="title-book-input-admin">
            <textarea name="description" rows="8" cols="80"><?php echo $boo['description'];?></textarea>
          </div>
          <div class="title-book-admin">
            Год выпуска
          </div>
          <div class="title-book-input-admin">
            <input class="input-admin" type="text" name="year" value="<?php echo $boo['year'];?>"  autocomplete="off" size="40" placeholder="Максимум 4 цифры">
          </div>
          <div class="title-book-admin">
            <input class="buttons-admin" type="submit" name="add" value="Изменить" autocomplete="off">
          </div>
        </form>
      </div>

<?php
if(isset($_POST['add'])){
  $name = strip_tags(trim($_POST['name']));
  $description = strip_tags(trim($_POST['description']));
  $year = strip_tags(trim($_POST['year']));
  $ids = strip_tags(trim($_POST['ids']));

      foreach ($authors as $aut){
        if($_POST['auts']==$aut['Name']){
          $return = strip_tags(trim($aut['Id']));
        }
      }
      foreach ($genres as $gen){
        if($_POST['gens']==$gen['name']){
          $genre_e = strip_tags(trim($gen['id']));
        }
      }
  $result = mysqli_query($connection, "UPDATE books SET AuthorId = '$return', Title = '$name', description = '$description', year = '$year', genreId = '$genre_e' where Id = '$ids'");
  if ($result=='true') {
    echo '<span style = "color: green; font-weight: bold; margin-bottom: 10px; display: block; ">
                             Книга успешно изменена!</span>';
  }
  else {
    echo '<span style = "color: red; font-weight: bold; margin-bottom: 10px; display: block; ">
                             Книга не изменена!</span>';
  }

    }
?><div class="empty-space"></div>
<? include "../footer.php";?>
</body>
</html>
