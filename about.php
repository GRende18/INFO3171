<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'views/header.php'; ?>

<section class="about">

   <div class="row">

      <div class="box">
         <img src="images/choose.png" alt="">
         <h3>Why choose us?</h3>
         <p>Shoe World is your go-to destination for on-trend shoes, clothing, handbags, and accessories at an affordable price.</p>
         <a href="contact.php" class="btn">Contact Us</a>
      </div>

      <div class="box">
         <img src="images/provide.png" alt="">
         <h3>What we provide?</h3>
         <p>Quality Product, Free Shipping, 14-Day Return, 24/7 Support</p>
         <a href="shop.php" class="btn">Our Shop</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">Clients Reviews</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>Excellent customer service and selection.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>John Deo</h3>
      </div>

      <div class="box">
         <img src="images/pic-2.png" alt="">
         <p>Excellent service, great selection, the only way to go for buying shoes online.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Clementine Rio</h3>
      </div>

      <div class="box">
         <img src="images/pic-3.png" alt="">
         <p>Everything went really well with the ordering process. Very fast shipping speed. Highly recommend them. Thanks</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Ree Reen</h3>
      </div>

      <div class="box">
         <img src="images/pic-4.png" alt="">
         <p>A large range of shoes and boots, with no other clothes on site.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Sophia Mewn</h3>
      </div>

      <div class="box">
         <img src="images/pic-5.png" alt="">
         <p>Plenty of stock to select from.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Kole Yole</h3>
      </div>

      <div class="box">
         <img src="images/pic-6.png" alt="">
         <p>Excellent prices, and some great additional discounts.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Merry Chang</h3>
      </div>

   </div>

</section>









<?php include 'views/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>