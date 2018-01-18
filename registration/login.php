<?php
 include "rb.php";
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Регистрация</title>
    <link rel="SHORTCUT ICON" href="../media/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../media/style.css" >
  </head>
  <body>
    <?php
     include "../header.php";
     ?>

<?php

  $data = $_POST;
  if(isset($data['do_login'])){
    $errors = array();
    $user = R::findOne('clients', 'username = ?', array($data['username']));
  if($user){
    if(password_verify($data['password'],$user->password)){
      $_SESSION['logged_user'] = $user;
      echo '<div style  = "color: green;">'.'Вы авторизованы!'.'</div>';

    }else{
      $errors[] = 'Неверно введен пароль!';
     }
  }else{
    $errors[] = 'Пользователь с таким логином не найден!';
  }
  if(!empty($errors)){
    echo '<div style  = "color: red;">'.array_shift($errors).'</div><hr>';
    }
  }
?>
  <form method="POST" action="login.php">
      <label class="label-vhod" for="username">Логин:</label>
      <input class="input-vhod"type="text" name="username" value ="<?php echo @$data['username']?>"><br>
      <label class="label-vhod"for="password">Пароль:</label>
      <input class="input-vhod"type="password" name="password"><br>
      <button class="button-vhod"type="submit" name="do_login">Войти</button>
  </form>


</body>
</html>
