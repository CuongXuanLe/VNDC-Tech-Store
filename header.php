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

<header class="header fixed-top navbar bg-white shadow py-3 px-3 position-static">

      <div class="container">
         <a href="home.php" class="text-decoration-none font-rubik font-size-20 text-dark font-weight-bold">VNDC Tech</a>

         <nav class="navbar">
            <a href="home.php" class="px-4 text-decoration-none text-dark font-rubik text-uppercase font-weight-bold" >home</a>
            <a href="about.php" class="px-4 text-decoration-none text-dark font-rubik text-uppercase font-weight-bold" >about</a>
            <a href="shop.php" class="px-4 text-decoration-none text-dark font-rubik text-uppercase font-weight-bold" >shop</a>
            <a href="contact.php" class="px-4 text-decoration-none text-dark font-rubik text-uppercase font-weight-bold" >contact</a>
            <a href="orders.php" class="px-4 text-decoration-none text-dark font-rubik text-uppercase font-weight-bold" >orders</a>
         </nav>

         <div class="d-flex align-items-center">
            <a href="search_page.php" class="fas fa-search mr-3 text-dark text-decoration-none"></a>
            
            <!-- toggle menu use -->
            <div class="dropdown">
               <div id="user-btn" class="fas fa-user mr-3" data-toggle="dropdown">
                  <div class="dropdown-menu p-0 w-auto font-rubik" style="left:-185px;">
                     <p class="px-3 pt-3">Username : <span class="color-primary font-size-16"><?php echo $_SESSION['user_name']; ?></span></p>
                     <p class="px-3" style="margin-top:-10px;">Email : <span class="color-primary font-size-16"><?php echo $_SESSION['user_email']; ?></span></p>
                     <hr class="dropdown-divider p-0">
                     <p class="p-0 text-center font-weight-bold"><a href="logout.php" class="delete-btn text-danger text-decoration-none" >Logout</a></p>
                  </div>
               </div>
            </div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a class="text-decoration-none" href="cart.php"> <i class="fas fa-shopping-cart text-dark"></i> <span class="text-dark">(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>
   </div>

</header>