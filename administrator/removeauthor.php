<?php
 include "../includes/config.php";
 ?>
 <!DOCTYPE html>
 <html>

 <head>
   <meta charset="utf-8">
   <title>Удалить автора</title>
   <link rel="SHORTCUT ICON" href="../media/favicon.png" type="image/x-icon">
   <link rel="stylesheet" type="text/css" href="../media/style.css" >
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>

 <body>
     <?php include "../header.php"; ?>
     <?php
        $authors_q = mysqli_query($connection, "SELECT * FROM `authors`");
        $authors = array();
        while ($aut = mysqli_fetch_assoc($authors_q)){
           $authors[] = $aut;
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
          <h1 class="h1-admin">Удалите автора!</h1>
          <form method="post" action="removeauthor.php">
            <div class="title-book-admin">
              Имя автора
            </div>
            <div class="title-book-input-admin">
              <input class="input-admin"  list="name" name="name" size = "40" placeholder="Чингиз Айтматов например...">
              <datalist id="name">
            <?php foreach ($authors as $aut){
                ?>
                <option value="<?php echo $aut['Name'];?>">
            <?php
                }
              ?>
          </datalist>
        </div>
        <div class="title-book-admin">
         <input class="buttons-admin" type="submit" name="remove" value="Удалить" autocomplete="off" placeholder="">
       </div>
        </form>
       </div>



         <?php
         if($_POST['remove']){
           $name = strip_tags(trim($_POST['name']));
           $author_cat = false;
           $author = false;
           foreach ($authors as $aut){
             if($_POST['name']==$aut['Name']){
               $author_cat = $aut;
               $author = strip_tags(trim($author_cat['Id']));
             }
           }

           $result = mysqli_query($connection, "DELETE FROM authors WHERE Id = '$author'");

           echo '<span style = "color: green; font-weight: bold; margin-bottom: 10px; display: block; ">
                                Автор успешно удален!</span>';




         }


          ?><div class="empty-space"></div>
<? include "../footer.php";?>
   </body>
</html>
