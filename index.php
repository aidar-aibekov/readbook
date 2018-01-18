<?php
 include "includes/config.php";
 ?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title>Почитай Книжку</title>
    <link rel="SHORTCUT ICON" href="media/index-images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="media/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>


    <?php include "header.php"; ?>

    <div class="content">
      <div class="content-overlay"></div>
      <div class="wrapper">
      </div>
    </div>

    <section class="catalog">

      <div class="block1">
        <div class="image-block1-div">
          <a class="links-to-article" href="http://readbook.com/pages/books.php">
            <img class="image-block1"src="media/index-images/books-img.jpg" alt="Books">
          </a>
        </div>
        <div class="text-block1">
          <a class="links-to-article" href="http://readbook.com/pages/books.php">
            <h2 class="h2-block1">Любимые книги</h2>
          </a>
          <p class="p-block1">Все самые популярные книги <br>от именитых авторов <br>в разных жанрах</p>
        </div>

      </div>
      <div class="block2">
        <div class="image-block1-div">
          <a class="links-to-article" href="http://readbook.com/pages/genres.php">
            <img class="image-block1"src="media/index-images/genres-img.jpg" alt="Books">
          </a>
        </div>
        <div class="text-block1">
          <a class="links-to-article" href="http://readbook.com/pages/genres.php">
            <h2 class="h2-block1">Различные жанры</h2>
          </a>
          <p class="p-block1">Фэнтези, Романы, Детективы.<br> Любые жанры книг <br> на ваш вкус</p>
        </div>

      </div>
      <div class="block3">
        <div class="image-block1-div">
          <img class="image-block1"src="media/index-images/readers-img.png" alt="Books">
        </div>
        <div class="text-block1">
          <h2 class="h2-block1">Сообщество читателей</h2>
          <p class="p-block1">Делитесь мнениями о книгах,<br> общайтесь в форумах,<br> почитайте книжку</p>
        </div>

      </div>

    </section>
    <div class="content2">
      <div class="content-overlay2">
        <p class="citate1-index">Перестать читать книги - значит перестать мыслить</p>
        <p class="citate1-index-author">© Фёдор Достоевский</p>
      </div>
      <div class="wrapper2">
      </div>
    </div>

    <section class = "diagram-genres-with-description-index">
      <div class="diagram-genres-index">
        <span class="heading">Популярные жанры на сайте</span>
        <p>В электронной библиотеке более 3-х миллионов книг</p>
        <hr style="border:3px solid #f1f1f1">

        <div class="row">
  <div class="side">
    <div>Детективы</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-5"></div>
    </div>
  </div>
  <div class="side right">
    <div>2 771 тыс.</div>
  </div>
  <div class="side">
    <div>Романы</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-4"></div>
    </div>
  </div>
  <div class="side right">
    <div>1 778 тыс.</div>
  </div>
  <div class="side">
    <div>Повести</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-3"></div>
    </div>
  </div>
  <div class="side right">
    <div>567 тыс.</div>
  </div>
  <div class="side">
    <div>Поэмы</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-2"></div>
    </div>
  </div>
  <div class="side right">
    <div>320 тыс.</div>
  </div>
  <div class="side">
    <div>Сказки</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-1"></div>
    </div>
  </div>
  <div class="side right">
    <div>943 тыс.</div>
  </div>
</div>

</div>
<div class="genres-description-index">

<!-- <p>Нажмите на название жанра чтобы прочитать поподробнее:</p> -->

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Povest')" id="defaultOpen">Повесть</button>
  <button class="tablinks" onclick="openCity(event, 'Detektiv')">Детектив</button>
  <button class="tablinks" onclick="openCity(event, 'Roman')">Роман</button>
  <button class="tablinks" onclick="openCity(event, 'Skazka')">Сказка</button>
  <button class="tablinks" onclick="openCity(event, 'Poema')">Поэмы</button>
</div>

<div id="Povest" class="tabcontent">
  <h3>Повесть</h3>
  <p>Прозаический жанр, занимающий по объёму текста промежуточное место между романом и рассказом, тяготеющий к хроникальному сюжету, воспроизводящему естественное течение жизни. В зарубежном литературоведении специфически русскому понятию «повесть» коррелирует «короткий роман» (англ. short novel) и novella с омонимом «новелла» русской традиции, означающим «короткий рассказ»</p>
</div>

<div id="Detektiv" class="tabcontent">
  <h3>Детектив</h3>
  <p>Преимущественно литературный и кинематографический жанр, произведения которого описывают процесс исследования загадочного происшествия с целью выяснения его обстоятельств и раскрытия загадки. Обычно в качестве такого происшествия выступает преступление, и детектив описывает его расследование и определение виновных, в таком случае конфликт строится на столкновении справедливости с беззаконием, завершающемся победой справедливости.</p>
</div>

<div id="Roman" class="tabcontent">
  <h3>Роман</h3>
  <p>Литературный жанр, чаще прозаический, зародившийся в средние века у романских народов как рассказ на народном языке и ныне превратившийся в самый распространенный вид эпической литературы, изображающий жизнь человека с её волнующими страстями (на первом плане любовь), борьбой, социальными противоречиями и стремлениями к идеалу. </p>
</div>
<div id="Skazka" class="tabcontent">
  <h3>Сказка</h3>
  <p>Один из жанров фольклора, либо литературы. Эпическое, преимущественно прозаическое произведение волшебного, героического или бытового характера. Сказку характеризует отсутствие претензий на историчность повествования, нескрываемая вымышленность сюжета.</p>
</div>

<div id="Poema" class="tabcontent">
  <h3>Поэма</h3>
  <p>Крупное или среднее по объёму многочастное стихотворное произведение лиро-эпического характера, принадлежащее определённому автору, имеет большую стихотворную повествовательную форму. Может быть героической, романтической, критической, сатирической и т.п.</p>
</div>



</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
    </section>

    <div class="content3">
      <div class="content-overlay3">
        <p class="citate2-index">Пожалуйста, принесите мне что-нибудь почитать. Хотя бы почтовую марку.</p>
        <p class="citate2-index-author">© Марк Твен</p>
      </div>
      <div class="wrapper3">
      </div>
    </div>

    <div class="tai-lopez-div">
      <div class="video-tai-lopez">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/Ipo2PANvDmE" frameborder="0" gesture="media" allow="encrypted-media"></iframe>
      </div>
      <div class="img-tai-lopez">
        <img class="tai-lopez-image" src="media/index-images/tai-lopez-net-worth.png" alt="tai">
      </div>
      <div class="p-tai-lopez">
        <p>На конференции TEDx ТайЛопез (Tai Lopez) рассказывает о «правиле 33%» и, как основываясь на скромности, упорстве, закалке и любознательности, он воплотил свои мечты в реальность.</p>
      </div>
      <div class="p2-tai-lopez">
        <p>1 Книга в день!</p>
      </div>
    </div>
    <? include "footer.php";?>
  </body>

  </html>
