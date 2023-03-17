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
}

?>

<header class="header">

          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="admin_page.php">
                        <img src="img/logo.svg" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="logout.php" style="color:#fff;">Logout</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="admin_page.php" ><i class="fa fa-desktop "></i>Home</a>
                    </li>
                   
                    <li>
                        <a href="admin_products.php"><i class="fa fa-qrcode "></i>Products</a>
                    </li>
                    <li>
                        <a href="admin_orders.php"><i class="fa fa-bar-chart-o"></i>Orders</a>
                    </li>

                    <li>
                        <a href="admin_users.php"><i class="fa fa-edit "></i>Users</a>
                    </li>
                    <li>
                        <a href="admin_contacts.php"><i class="fa fa-table "></i>Messages</a>
                    </li>
                    
                </ul>
                            </div>

        </nav>

</header>