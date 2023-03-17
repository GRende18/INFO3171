<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = md5($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = $conn->prepare("SELECT * FROM users WHERE email = ?");
   $select->execute([$email]);

   if($select->rowCount() > 0){
      $message[] = 'user email already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert = $conn->prepare("INSERT INTO users(name, email, password, image) VALUES(?,?,?,?)");
         $insert->execute([$name, $email, $pass, $image]);

         if($insert){

               $message[] = 'registered successfully!';
               header('location:login.php');
            }
         }

      }
   }



?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portal</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="Page description">
    <!--Twitter Card data-->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="Page Title">
    <meta name="twitter:description" content="Page description less than 200 characters">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="http://www.example.com/image.jpg">
    <!--Open Graph data-->
    <meta property="og:title" content="Title Here">
    <meta property="og:type" content="article">
    <meta property="og:url" content="http://www.example.com/">
    <meta property="og:image" content="http://example.com/image.jpg">
    <meta property="og:description" content="Description Here">
    <meta property="og:site_name" content="Site Name, i.e. Moz">
    <meta property="fb:admins" content="Facebook numeric ID">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" media="all" href="css/app.css">
  </head>
  <body>
     <?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}?>
    <div class="page">
      <form class="form" action="" enctype="multipart/form-data" method="POST">
        <div class="form__container">
          <div class="logo"><img class="logo__pic" src="img/logo.svg" width="45"></div>
          <div class="fieldset">
            <div class="field"><input class="input" name="name" type="text" placeholder="enter your name" required></div>
            <div class="field"><input class="input" name="email" type="email" placeholder="enter your email" required></div>
            <div class="field"><input class="input" name="pass" type="password" placeholder="enter your password" required></div>
            <div class="field"><input class="input" name="cpass" type="password" placeholder="confirm your password" required></div>
            
          </div><input type="submit" value="register now" class="btn" name="submit">
          <div class="text">By creating an account, you agree and accept our <a href="#">Terms</a> and <a href="#">Privacy Policy</a>.</div>
        </div>
        <div class="form__footer">Already have an account? <a href="login.php">Log in</a>.</div>
      </form>
      
    </div>
  </body>
</html>