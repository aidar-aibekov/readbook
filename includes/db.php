  <?php


$connection = mysqli_connect(
  $config['db']['host'],
  $config['db']['username'],
  $config['db']['password'],
  $config['db']['name']
);

  if($connection==false){
    echo "Database is not connected";
    echo mysqli_connect_error();
    die();

  }
