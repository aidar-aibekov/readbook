<?php
 include "../registration/rb.php";
 include "../includes/config.php";
 ?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title>Заполнить данные</title>
    <link rel="SHORTCUT ICON" href="../media/index-images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../media/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <?php include "../header.php";?>
    <div class="main-profile">
      <?php
      $id = $user['id'];
      $profile_query = mysqli_query($connection, "SELECT * FROM clients where id = '$id'");
      $pro = mysqli_fetch_assoc($profile_query);

      $firstname = $pro['firstname'];
      $lastname = $pro['lastname'];
      $avatar = $pro['avatar'];
      $mybooks = $pro['mybooks'];
      $myauthors = $pro['myauthors'];
      $age = $pro['age'];

      if($avatar==""){
        $avatar = "default-user-image.png";
      }
      ?>
      <div class="image-profile">
        <img src="../../media/profile-images/<?php echo $avatar;?>" alt="image-of-profile" width="256px" height="256px">
      </div>
      <hr class="hr-profile">

      <div class="table-profile-div">
      <table class="table-profile">
        <tr class="author-article">
          <td>
            <div class="title-profile">
              <? echo $firstname . " " . $lastname ?>
            </div>
          </td>
        </tr>

        <div class="author-article">
        <tr class="author-article">
          <td class="td-color-article">Возраст:</td>
          <td><?php echo $age;?></td>
        </tr>

        </div>
        <div class="author-article">
        <tr class="author-article">
          <td class="td-color-article">Любимые книги:</td>
          <td><?php echo $mybooks;?></td>
        </tr>

        </div>
       <div class="year-article">
         <tr class="year-article">
           <td class="td-color-article">Любимые авторы:</td><td><?php echo $myauthors;?></td>
         </tr>
        </div>
    </table>
  </div>

  <h1 class="h1-admin">Заполните данные о себе!</h1>
  <form action="editprofile.php" method="post" >
    <div class="title-book-admin">
      Введите ваш возраст
    </div>
    <div class="title-book-input-admin">
    <input class="input-admin" type="text" value="<? echo $age; ?>" name="age" autocomplete="off" size="40">
    </div>
    <div class="title-book-admin">
      Введите названия ваших любимых книг
    </div>
    <div class="title-book-input-admin">
      <textarea name="mybooks" rows="8" cols="80"><? echo $mybooks;?></textarea>
    </div>
    <div class="title-book-admin">
      Введите имена ваших любимых авторов
    </div>
    <div class="title-book-input-admin">
      <textarea name="myauthors" rows="8" cols="80"><? echo $myauthors;?></textarea>
    </div>
    <div class="title-book-admin">
      <input class="buttons-admin" type="submit" name="add" value="Сохранить" autocomplete="off">
    </div>
  </form>
</div>
</div>
<?php
if(isset($_POST['add'])){
  $age = strip_tags(trim($_POST['age']));
  $mybooks_post = strip_tags(trim($_POST['mybooks']));
  $myauthors_post = strip_tags(trim($_POST['myauthors']));


      $result = mysqli_query($connection, "UPDATE clients SET age = '$age', mybooks = '$mybooks_post', myauthors = '$myauthors_post' where id = '$id'");

      echo '<span style = "color: green; font-weight: bold; margin-bottom: 10px; display: block; ">
                           Изменения сохранены!</span>';

}


 ?>
 <div class="empty-space"></div>
<?php include "../footer.php";?>
  </body>

  </html>
