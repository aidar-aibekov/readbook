<?php
require "rb-mysql.php";

R::setup( 'mysql:host=localhost:3306;dbname=buchdatabase',
        'root', '56632524' );

session_start();
$user = $_SESSION['logged_user'];
?>
