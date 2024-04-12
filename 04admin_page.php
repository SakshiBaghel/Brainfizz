<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:03login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="03style.css">
   <style>
      body {
         background-image: url('https://media.istockphoto.com/id/1221063207/photo/white-question-mark-background.webp?b=1&s=170667a&w=0&k=20&c=i9UX2mXMNFc0OPTSrUl9F7IoXQbDZLFQgNoQhxFxfCc=');
         background-size: cover;
         background-repeat: no-repeat;
      }
   </style>

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>Player</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>Embrace the challenge, unlock the knowledge</p>
      <!-- <a href="login_form.php" class="btn">login</a>
      <a href="register_form.php" class="btn">register</a> -->
      <a href="05logout.php" class="btn">logout</a>
      <a href="07guide.html" class="btn">Click to play</a>

   </div>

</div>

</body>
</html>