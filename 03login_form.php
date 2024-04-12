<?php
@include 'config.php';

session_start();

$error = array(); // Initialize an array to hold error messages

if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass'"; // Modify the query to match both email and password

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      
      if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['name'];
         header('location:04admin_page.php');
         exit; // Exit to prevent further execution
      } elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
         header('location:04admin_page.php');
         exit; // Exit to prevent further execution
      }
   } else {
      $error[] = 'Incorrect email or password!'; // Add error message to the array
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
   <link rel="stylesheet" href="03style.css"> <!-- Custom CSS file link -->
</head>
<body>
<div class="form-container">
   <form action="" method="post">
      <h3>Login Now</h3>
      <?php
      if(!empty($error)){ // Check if there are any error messages
         foreach($error as $err){
            echo '<span class="error-msg">'.$err.'</span>'; // Display each error message
         }
      }
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="Login Now" class="form-btn">
      <p>Don't have an account? <a href="06register_form.php">Register Now</a></p>
   </form>
</div>
</body>
</html>
