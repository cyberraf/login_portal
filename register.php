<?php
  // connect the database
  require_once("database.php");

  //Retrieve user input
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $class = $_POST["year"];
  $password = $_POST["password"];

  //apply currency formating to the dollar and percent amounts
  $first_name_f = htmlspecialchars($first_name);
  $last_name_f = htmlspecialchars($last_name);
  $username_f = htmlspecialchars($username);
  $email_f = htmlspecialchars($email);
  $phone_f = htmlspecialchars($phone);
  $class_f = htmlspecialchars($class);
  $password_f = htmlspecialchars($password);
  $hashed_password = password_hash($password_f, PASSWORD_DEFAULT);
  
  $query1 = "SELECT firstName, lastName, username, email, telephone from users WHERE username = '$username_f'";

  $query = "INSERT INTO users(firstName, lastName, email, telephone, username, classYear, password) 
                        VALUES('$first_name_f', '$last_name_f', '$email_f', '$phone_f', '$username_f', '$class_f', '$hashed_password');";

  $statement = $db->prepare($query1);
  $statement-> execute();
  $user = $statement->fetch();
  $statement->closeCursor();

  if ($user['username'] == $username_f or $user['email'] == $email_f) {
    echo "This user already exist in our system. Try different credentials or reset your password.";
  } else {
    $statement1 = $db->prepare($query);
    $statement1-> execute();
   // $adduser = $statement1->fetch();
    $statement1->closeCursor(); 
    
    echo "Registered Successfully!";
    //include('inccorrect_credentials.html');
  }

?>
