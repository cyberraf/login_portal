<?php
  $dsn = 'mysql:host=joecool.highpoint.edu;dbname=CSC3212_S23_rtarbari_db';
  $username = 'rtarbari';
  $password = '1889582';

  try {
    $db = new PDO($dsn, $username, $password);
   // echo '<p>You are connected to the database!</p>';
  
  }
  catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
  }
?>
