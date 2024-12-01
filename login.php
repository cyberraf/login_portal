<?php
  // connect the database
  require_once("database.php");

  //Retrieve user input
  $username = $_POST["username"];
  $password = $_POST["password"];
 
  //apply currency formating to the dollar and percent amounts
  $username_f = htmlspecialchars($username);
  $password_f = htmlspecialchars($password);
  $hashed_password = password_hash($password_f, PASSWORD_DEFAULT);
  //$query_username = "SELECT * from users WHERE unsername = '$username';";
  $query = "SELECT username, password from users WHERE username = '$username_f' AND password = '$hashed_password'";
 
  $statement = $db->prepare($query);
  $statement-> execute();
  $user = $statement->fetch();
  $statement->closeCursor();
  
  if ($user) {
    echo "Logged in Successfully!";
  } else {
   //echo $hashed_password;
   include('inccorrect_credentials.html');
  }
  
?>
