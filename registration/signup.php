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
  if(isset($data['submit'])){
    // zdes registriruem
    $errors = array();
    if(trim($data['firstname']) == ''){
      $errors[] = 'Введите имя!';
    }
    if(trim($data['lastname']) == ''){
      $errors[] = 'Введите фамилию!';
    }
    if(trim($data['username']) == ''){
      $errors[] = 'Введите логин!';
    }
    if(trim($data['email']) == ''){
      $errors[] = 'Введите Email!';
    }
    if($data['password1'] == ''){
      $errors[] = 'Введите пароль!';
    }
    if($data['password1'] != $data['password2']){
      $errors[] = 'Повторный пароль введен неверно!';
    }
    if(R::count('clients',"username = ? ", array($data['username']))>0){
      $errors[] = 'Пользователь с таким логином существует!';
    }
    if(R::count('clients',"email = ?", array($data['email']))>0){
      $errors[] = 'Пользователь с таким Email существует!';
    }
          if(empty($errors)){

            $client = R::dispense('clients');
            $client->username = $data['username'];
            $client->email = $data['email'];
            $client->firstname = $data['firstname'];
            $client->lastname = $data['lastname'];
            $client->password = password_hash($data['password1'], PASSWORD_DEFAULT);
            R::store($client);
            echo '<div style  = "color: green;">'.'Вы успешно зарегестрировались!'.'</div><hr>';
          }else{
            echo '<div style  = "color: red;">'.array_shift($errors).'</div><hr>';
          }

  }

?>

    	<form method="POST" action="signup.php">
          <label class="label-vhod" for="firstname">Введите ваше имя:</label>
          <input class="input-vhod"type="firstname" name="firstname" value ="<?php echo @$data['firstname']?>"><br>

          <label class="label-vhod" for="lastname">Введите вашу фамилию:</label>
          <input class="input-vhod"type="lastname" name="lastname" value ="<?php echo @$data['lastname']?>"><br>

    	    <label class="label-vhod" for="username">Введите ваш логин:</label>
    	    <input class="input-vhod"type="text" name="username" value ="<?php echo @$data['username']?>"><br>

          <label class="label-vhod" for="email">Введите ваш Email:</label>
     	    <input class="input-vhod"type="email" name="email" value ="<?php echo @$data['email']?>"><br>

    	    <label class="label-vhod"for="password">Введите ваш пароль:</label>
    	    <input class="input-vhod"type="password" name="password1"><br>

    	    <label class="label-vhod"for="password">Введите пароль еще раз:</label>
    	    <input class="input-vhod" type="password" name="password2"><br>

    	    <button class="button-vhod"type="submit" name="submit">Зарегистрироваться</button>
    	</form>

</body>
</html>
