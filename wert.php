<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Panel Control</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="dashboard">

   <h1 class="title">Panel Control</h1>

   <div class="box-container">

      <div class="box">
      <?php
         $totalPend = 0;
         $selectPend = $conn->prepare("SELECT * FROM orders WHERE payment_status = ?");
         $selectPend->execute(['pending']);
         while($fetchPend = $selectPend->fetch(PDO::FETCH_ASSOC)){
            $totalPend += $fetchPend['total_price'];
         };
      ?>
      <h3>$<?= $totalPend; ?>/-</h3>
      <p>Total Pendings</p>
      <a href="admin_orders.php" class="btn">See orders</a>
      </div>

      <div class="box">
      <?php
         $totalComp = 0;
         $selectComp = $conn->prepare("SELECT * FROM orders WHERE payment_status = ?");
         $selectComp->execute(['completed']);
         while($fetchComp = $selectComp->fetch(PDO::FETCH_ASSOC)){
            $totalComp += $fetchComp['total_price'];
         };
      ?>
      <h3>$<?= $totalComp; ?>/-</h3>
      <p>Completed Orders</p>
      <a href="admin_orders.php" class="btn">See Orders</a>
      </div>

      <div class="box">
      <?php
         $selectOrd = $conn->prepare("SELECT * FROM orders");
         $selectOrd->execute();
         $numberOrd = $selectOrd->rowCount();
      ?>
      <h3><?= $numberOrd; ?></h3>
      <p>Orders Placed</p>
      <a href="admin_orders.php" class="btn">See Orders</a>
      </div>

      <div class="box">
      <?php
         $selectOrd = $conn->prepare("SELECT * FROM products");
         $selectOrd->execute();
         $numberProd = $selectOrd->rowCount();
      ?>
      <h3><?= $numberProd; ?></h3>
      <p>Products Added</p>
      <a href="admin_products.php" class="btn">See products</a>
      </div>

      <div class="box">
      <?php
         $selectUser = $conn->prepare("SELECT * FROM users WHERE user_type = ?");
         $selectUser->execute(['user']);
         $numberUser = $selectUser->rowCount();
      ?>
      <h3><?= $numberUser; ?></h3>
      <p>Total Users</p>
      <a href="admin_users.php" class="btn">See Accounts</a>
      </div>

      <div class="box">
      <?php
         $selectAdmin = $conn->prepare("SELECT * FROM users WHERE user_type = ?");
         $selectAdmin->execute(['admin']);
         $numberAdmin = $selectAdmin->rowCount();
      ?>
      <h3><?= $numberAdmin; ?></h3>
      <p>Total Admins</p>
      <a href="admin_users.php" class="btn">See Accounts</a>
      </div>

      <div class="box">
      <?php
         $selectAcc = $conn->prepare("SELECT * FROM users");
         $selectAcc->execute();
         $numberAcc = $selectAcc->rowCount();
      ?>
      <h3><?= $numberAcc; ?></h3>
      <p>Total Accounts</p>
      <a href="admin_users.php" class="btn">See Accounts</a>
      </div>

      <div class="box">
      <?php
         $selectMsg = $conn->prepare("SELECT * FROM message");
         $selectMsg->execute();
         $numberMsg = $selectMsg->rowCount();
      ?>
      <h3><?= $numberMsg; ?></h3>
      <p>Total Messages</p>
      <a href="admin_contacts.php" class="btn">See Messages</a>
      </div>

   </div>

</section>













<script src="js/script.js"></script>

</body>
</html>