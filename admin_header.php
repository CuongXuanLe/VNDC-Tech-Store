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

<header class="fixed-top navbar bg-white shadow py-3 px-3 position-static">

   <div class="container">

      <a href="admin_page.php" class="text-decoration-none font-rubik font-size-20 text-dark" style="font-weight:700">Dashboard</a>

      <nav class="navbar">
         <a href="admin_page.php" class="px-4 text-decoration-none text-dark font-rubik">Home</a>
         <a href="admin_products.php" class="px-4 text-decoration-none text-dark font-rubik">Products</a>
         <a href="admin_orders.php" class="px-4 text-decoration-none text-dark font-rubik">Orders</a>
         <a href="admin_users.php" class="px-4 text-decoration-none text-dark font-rubik">Users</a>
         <a href="admin_contacts.php" class="px-4 text-decoration-none text-dark font-rubik">Messages</a> 
      </nav>

      <div class="dropdown">
         <!-- <div id="menu-btn" class="fas fa-bars"></div> -->
         <div id="user-btn" class="fas fa-user" data-toggle="dropdown"></div>

         <div class="dropdown-menu p-0" style="left:-185px; width:200px">
               <p class="px-3 pt-3">Username : <span class="color-primary font-size-16"><?php echo $_SESSION['admin_name']; ?></span></p>
               <p class="px-3" style="margin-top:-10px;">Email : <span class="color-primary font-size-16"><?php echo $_SESSION['admin_email']; ?></span></p>
               <hr class="dropdown-divider p-0">
               <p class="p-0 text-center font-weight-bold"><a href="logout.php" class="delete-btn text-danger text-decoration-none" >Logout</a></p>
            </div>
         </div>
   </div>
</header>

<!-- <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav> -->