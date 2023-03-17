   <?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shoe World Admin Panel</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<?php include 'admin_header.php'; ?>
<body>
     
           
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>ADMIN DASHBOARD</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Welcome, <?php echo $admin_id; ?>
                             
                             </strong> You Have No pending Task For Today.
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
                  
                        <?php
         $totalComp = 0;
         $selectComp = $conn->prepare("SELECT * FROM orders WHERE payment_status = ?");
         $selectComp->execute(['completed']);
         while($fetchComp = $selectComp->fetch(PDO::FETCH_ASSOC)){
            $totalComp += $fetchComp['total_price'];
         };
      ?>
                            <div class="row text-center pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="admin_orders.php" >
 <i class="fa fa-circle-o-notch fa-5x"></i>
                      <h4>Orders Completed</h4>
                      <h6>$<?= $totalComp; ?>/-</h6>
                      </a>
                      </div>
                     
                     
                  </div> 
                  
                        <?php
         $selectOrd = $conn->prepare("SELECT * FROM orders");
         $selectOrd->execute();
         $numberOrd = $selectOrd->rowCount();
      ?>
                 
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="admin_orders.php" >
 <i class="fa fa-envelope-o fa-5x"></i>
                      <h4>Placed Orders</h4>
                      <h6><?= $numberOrd; ?></h6>
                      </a>
                      </div>
                     
                     
                  </div>
                  
                  <?php
         $totalPend = 0;
         $selectPend = $conn->prepare("SELECT * FROM orders WHERE payment_status = ?");
         $selectPend->execute(['pending']);
         while($fetchPend = $selectPend->fetch(PDO::FETCH_ASSOC)){
            $totalPend += $fetchPend['total_price'];
         };
      ?>
                  
                  
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="admin_orders.php" >
 <i class="fa fa-lightbulb-o fa-5x"></i>
                      <h4>Total Pending Orders</h4>
                      <h6>$<?= $totalPend; ?>/-</h6>
                      </a>
                      </div>
                     
     
            <?php
         $selectAdmin = $conn->prepare("SELECT * FROM users WHERE user_type = ?");
         $selectAdmin->execute(['admin']);
         $numberAdmin = $selectAdmin->rowCount();
      ?>               
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="admin_users.php" >
 <i class="fa fa-users fa-5x"></i>
                      <h4>See Admin Users</h4>
                      <h6><?= $numberAdmin; ?></h6>
                      </a>
                      </div>
                     
                     
                  </div>
                  
          <?php
         $selectUser = $conn->prepare("SELECT * FROM users WHERE user_type = ?");
         $selectUser->execute(['user']);
         $numberUser = $selectUser->rowCount();
      ?>                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="admin_users.php" >
 <i class="fa fa-users fa-5x"></i>
                      <h4>See Total Users</h4>
                      <h6><?= $numberUser; ?></h6>
                      </a>
                      </div>
                     
                     
                  </div>
          <?php
         $selectAcc = $conn->prepare("SELECT * FROM users");
         $selectAcc->execute();
         $numberAcc = $selectAcc->rowCount();
      ?>              
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="admin_users.php" >
 <i class="fa fa-users fa-5x"></i>
                      <h4>See Total Accounts</h4>
                      <h6><?= $numberAcc; ?></h6>
                      </a>
                      </div>
                     
                     
                  </div>
                  
                        <?php
         $selectMsg = $conn->prepare("SELECT * FROM message");
         $selectMsg->execute();
         $numberMsg = $selectMsg->rowCount();
      ?>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="admin_contacts.php" >
 <i class="fa fa-wechat fa-5x"></i>
                      <h4>Messages</h4>
                      <h6><?= $numberMsg; ?></h6>
                      </a>
                      </div>
                     
                     
                  </div>

              </div>
                 <!-- /. ROW  --> 
                
                     
                     
                  
                     
                     
                  
                  
                     
                     
                  </div> 
              </div>   
 
                  <!-- /. ROW  --> 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>

          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
