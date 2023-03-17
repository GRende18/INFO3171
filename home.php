<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['add_to_wishlist'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);

   $check_wishlist_numbers = $conn->prepare("SELECT * FROM wishlist WHERE name = ? AND user_id = ?");
   $check_wishlist_numbers->execute([$p_name, $user_id]);

   $check_cart_numbers = $conn->prepare("SELECT * FROM cart WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_wishlist_numbers->rowCount() > 0){
      $message[] = 'Already added to wishlist!';
   }elseif($check_cart_numbers->rowCount() > 0){
      $message[] = 'Already added to cart!';
   }else{
      $insert_wishlist = $conn->prepare("INSERT INTO wishlist(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
      $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
      $message[] = 'Added to wishlist!';
   }

}

if(isset($_POST['add_to_cart'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM cart WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_cart_numbers->rowCount() > 0){
      $message[] = 'Already added to cart!';
   }else{

      $check_wishlist_numbers = $conn->prepare("SELECT * FROM wishlist WHERE name = ? AND user_id = ?");
      $check_wishlist_numbers->execute([$p_name, $user_id]);

      if($check_wishlist_numbers->rowCount() > 0){
         $delete_wishlist = $conn->prepare("DELETE FROM wishlist WHERE name = ? AND user_id = ?");
         $delete_wishlist->execute([$p_name, $user_id]);
      }

      $insert_cart = $conn->prepare("INSERT INTO cart(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'Added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home Page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'views/header.php'; ?>

<div class="home-bg">

   <section class="home">

      <div class="content">
         <span>Don't panic, buy it!</span>
         <h3>All shoes you want are always available and verified by Shoe World. </h3>
         <p>Shoe World provides everyone globally with a trusted source and the widest selection of sneakers and streetwear needs.</p>
         <a href="about.php" class="btn">About Us</a>
      </div>

   </section>

</div>

<section class="home-category">

   <h1 class="title">Shop by Category</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/cat-1.png" alt="">
         <h3>Casual</h3>
         <p>Casual shoes are characterized by sturdy leather uppers, non-leather outsoles, and wide profile. Some designs of dress shoes can be worn by either gender. The majority of dress shoes have an upper covering, commonly made of leather, enclosing most of the lower foot, but not covering the ankles.</p>
         <a href="category.php?category=casual" class="btn">Casual</a>
      </div>

      <div class="box">
         <img src="images/cat-2.png" alt="">
         <h3>Formal</h3>
         <p>Formal shoes are also called dress shoes as they can be worn when ‘dressing up’ – suits, blazers, shirts, trousers, etc. Due to their elegant looks they are the best fit for a business / formal setting where conventions and conformity matter.</p>
         <a href="category.php?category=Formal" class="btn">Formal</a>
      </div>

      <div class="box">
         <img src="images/cat-3.png" alt="">
         <h3>Boots</h3>
         <p>A boot is a type of footwear. Most boots mainly cover the foot and the ankle, while some also cover some part of the lower calf. Some boots extend up the leg, sometimes as far as the knee or even the hip.</p>
         <a href="category.php?category=boots" class="btn">Boots</a>
      </div>

      <div class="box">
         <img src="images/cat-4.png" alt="">
         <h3>Athletic</h3>
         <p>A shoe designed to be worn for sports, exercising, or recreational activity, as racquetball, jogging, or aerobic dancing.</p>
         <a href="category.php?category=athletic" class="btn">Athletic</a>
      </div>
      
      <div class="box">
         <img src="images/cat-5.png" alt="">
         <h3>Sandals</h3>
         <p>Sandals are an open type of footwear, consisting of a sole held to the wearer's foot by straps going over the instep and around the ankle. Sandals can also have a heel.</p>
         <a href="category.php?category=sandals" class="btn">Sandals</a>
      </div>
      
      <div class="box">
         <img src="images/cat-6.png" alt="">
         <h3>High Heels</h3>
         <p>High-heeled shoes, also known as high heels, are a type of shoe with a raised heel. This design raises the heel of the wearer's foot higher off the ground than the wearer's toes.</p>
         <a href="category.php?category=heels" class="btn">Heels</a>
      </div>
      
      <div class="box">
         <img src="images/cat-7.png" alt="">
         <h3>Flats</h3>
         <p>They are flat heel, closed toe, typically low-cut shoes, exposing the top of the foot and are usually made out of soft leather or satin.</p>
         <a href="category.php?category=flats" class="btn">Flats</a>
      </div>
      
      <div class="box">
         <img src="images/cat-8.png" alt="">
         <h3>Basketball</h3>
         <p>With constant jumping, starting and stopping, basketball shoes are designed to act as shock absorbers and provide ankle stability with the flexibility to allow players to move laterally. As such, basketball shoes are much bulkier than running shoes.</p>
         <a href="category.php?category=basketball" class="btn">Basketball</a>
      </div>

   </div>

</section>

<section class="products">

   <h1 class="title">Latest Products</h1>

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM products LIMIT 6");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" class="box" method="POST">
      <div class="price">$<span><?= $fetch_products['price']; ?></span>/-</div>
      <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
      <input type="number" min="1" value="1" name="p_qty" class="qty">
      <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist">
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">No products added yet!</p>';
   }
   ?>

   </div>

</section>







<?php include 'views/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>