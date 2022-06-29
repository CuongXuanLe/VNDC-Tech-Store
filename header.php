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

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
   <!-- Container wrapper -->
   <div class="container">
      <!-- Toggle button -->
      <!-- " -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon font-size-12"></span>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
         <!-- Navbar brand -->
         <a class="navbar-brand mt-2 mt-lg-0 text-decoration-none font-rubik font-size-20 text-dark font-weight-bold" href="home.php">VNDC Tech</a>
         <!-- Left links -->
         <ul class="navbar-nav mb-2 mb-md-0 m-auto">
            <li class="nav-item active">
               <a class="nav-link pr-5 text-decoration-none text-dark font-rubik text-capitalize"  href="home.php" >Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link pr-5 text-decoration-none text-dark font-rubik text-capitalize" href="about.php">About</a>
            </li>
            <li class="nav-item">
               <a class="nav-link pr-5 text-decoration-none text-dark font-rubik text-capitalize" href="shop.php">shop</a>
            </li>
            <li class="nav-item">
               <a class="nav-link pr-5 text-decoration-none text-dark font-rubik text-capitalize" href="contact.php">contact</a>
            </li>
            <li class="nav-item">
               <a class="nav-link pr-5 text-decoration-none text-dark font-rubik text-capitalize" href="orders.php">order</a>
            </li>
         </ul>
      </div>


      <!-- Right elements -->
      <div class="d-flex align-items-center">
            <a href="search_page.php" class="fas fa-search mr-3 text-dark text-decoration-none"></a>
            
            <!-- toggle menu use -->
            <div class="dropdown">
               <div class="fas fa-user mr-3" data-toggle="dropdown"></div>
                  <div class="dropdown-menu p-0 w-auto font-rubik" style="left:-185px;">
                     <p class="px-3 pt-3">Username : <span class="color-primary font-size-16"><?php echo $_SESSION['user_name']; ?></span></p>
                     <p class="px-3" style="margin-top:-10px;">Email : <span class="color-primary font-size-16"><?php echo $_SESSION['user_email']; ?></span></p>
                     <hr class="dropdown-divider p-0">
                     <p class="p-0 text-center font-weight-bold"><a href="logout.php" class="user-box delete-btn text-danger text-decoration-none" >Logout</a></p>
                  </div>
               
            </div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a class="text-decoration-none" href="cart.php"> <i class="fas fa-shopping-cart text-dark"></i> <span class="text-dark">(<?php echo $cart_rows_number; ?>)</span> </a>
      </div>
   </div>
</nav>
