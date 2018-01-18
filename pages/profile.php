<?php
 include "../registration/rb.php";
 include "../includes/config.php";?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title>Личный кабинет</title>
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

      <form action="http://readbook.com/pages/editprofile.php">
          <button class="buttons-admin" type="submit">Заполнить данные о себе</button>
      </form>
      <?php
      if($user['admin']=='1'){
          ?>
          <form action="http://readbook.com/administrator/admin.php">
              <button class="buttons-admin" type="submit">Админка</button>
          </form>
          <?php
      }
      ?>
    </div>
    <div class="empty-space"></div>
<? include "../footer.php";?>
  </body>

  </html>
