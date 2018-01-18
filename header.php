
<header>
  <div class = "main">
    <div class = "main-header">
      <a class="main-image" href  = "http://readbook.com/">
      <img src = "../media/index-images/main-logo.png" height="50px" width="325px" >
      </a>
      <div class="reg-block">
        <?php
          if(isset($_SESSION['logged_user'])){
        ?>

        <table>
          <td>
            <th>
        <form action="http://readbook.com/pages/profile.php">
          <button class="button-reg"type="submit" name="submit">
            Мой профиль</button>
        </form>
        </th>
        <th>
        <form action="http://readbook.com/registration/logout.php" >
        <button class="button-reg"type="submit" name="submit">
          Выйти</button>
        </form>
        </th>
        </td>
      </table>

        <?php
        }
        else {
          ?>
          <table>
            <td>
              <th>
          <form action="http://readbook.com/registration/login.php">
            <button class="button-reg"type="submit" name="submit">
              Авторизация</button>
          </form>
          </th>
          <th>
          <form action="http://readbook.com/registration/signup.php" >
          <button class="button-reg"type="submit" name="submit">
            Регистрация</button>
          </form>
          </th>
          </td>
        </table>

            <?php
        }
      ?>
      </div>
    </div>

      <div class="main-menu">
        <ul class="hr">
          <li>
            <a href="http://readbook.com">Главная</a>
          </li>
          <li>
            <a href="http://readbook.com/pages/books.php">Книги</a>
          </li>
          <li>
            <a href="http://readbook.com/pages/authors.php">Авторы</a>
          </li>
          <li>
            <a href="http://readbook.com/pages/genres.php">Жанры</a>
          </li>
          <li>
            <a href="http://readbook.com/pages/aboutproject.php">О проекте</a>
          </li>
        </ul>

    </div>
  </div>
  <div class="main-line-image">
      <img src="../media/index-images/main-line.png" alt="main-line" width="1000px">
  </div>
</header>
