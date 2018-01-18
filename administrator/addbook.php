<?php
 include "../includes/config.php";
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Добавить книгу</title>
  <link rel="SHORTCUT ICON" href="../media/favicon.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../media/style.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php include "../header.php";
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
        <h1 class="h1-admin">Добавьте книгу!</h1>
        <form action="addbook.php" method="post" enctype="multipart/form-data">
          <div class="title-book-admin">
            Введите название книги (вводить кириллицей)
          </div>
          <div class="title-book-input-admin">
          <input class="input-admin" type="text" name="name" autocomplete="off" size="40" placeholder="Гарри Поттер например..."> <br><br>
          </div>
          <div class="title-book-admin">
            Выберите автора из списка (не воодить данные "от себя")
          </div>
          <div class="title-book-input-admin">
          <input class="input-admin" list="auts" name="auts" size = "40" placeholder="Чингиз Айтматов например...">
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
           Выберите жанр из списка (не воодить данные "от себя")
         </div>
         <div class="title-book-input-admin">
         <input class="input-admin" list="gens" name="gens" size = "40" placeholder="Повесть например...">
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
            Выберите картинку (в формате jpg, соотношение сторон 200x313)
          </div>
          <div class="title-book-input-admin">
            <input class="input-admin" id="img" name="myfile" type="file" >
          </div>
          <div class="title-book-admin">
            Описание (уложитесь в один абзац)
          </div>
          <div class="title-book-input-admin">
            <textarea name="description" rows="8" cols="80"></textarea>
          </div>
          <div class="title-book-admin">
            Год выпуска (например 2005 или 1859)
          </div>
          <div class="title-book-input-admin">
            <input class="input-admin" type="text" name="year" autocomplete="off" size="40" placeholder="Максимум 4 цифры">
          </div>
          <div class="title-book-admin">
            <input class="buttons-admin" type="submit" name="add" value=" Добавить" autocomplete="off">
          </div>
        </form>
      </div>

<?php
if(isset($_POST['add'])){
  $name = strip_tags(trim($_POST['name']));
  $description = strip_tags(trim($_POST['description']));
  $year = strip_tags(trim($_POST['year']));
  $path = '../media/book-images/'; // директория для загрузки
  $ext = array_pop(explode('.',$_FILES['myfile']['name'])); // расширение
  $new_name = time().'.'.$ext; // новое имя с расширением
  $full_path = $path.$new_name; // полный путь с новым именем и расширением

  if($_FILES['myfile']['error'] == 0){
    if(move_uploaded_file($_FILES['myfile']['tmp_name'], $full_path)){
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
      $result = mysqli_query($connection, "INSERT into books (AuthorId, Title, description, views,image, year, genreId) values ('$return', '$name', '$description', 0, '$new_name', '$year', '$genre_e')");

      echo '<span style = "color: green; font-weight: bold; margin-bottom: 10px; display: block; ">
                           Книга успешно добавлена!</span>';
    }
  }


}


 ?>
<br><br>

<div class="empty-space"></div>
<? include "../footer.php";?>
</body>

</html>
