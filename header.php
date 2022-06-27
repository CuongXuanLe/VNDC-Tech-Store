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

   <div class="header-2">
      <div class="container">
         <a href="home.php" class="text-decoration-none font-rubik font-size-20 text-dark font-weight-bold">VNDC Tech</a>

         <nav class="navbar">
            <a href="home.php" class="text-decoration-none" >home</a>
            <a href="about.php" class="text-decoration-none" >about</a>
            <a href="shop.php" class="text-decoration-none" >shop</a>
            <a href="contact.php" class="text-decoration-none" >contact</a>
            <a href="orders.php" class="text-decoration-none" >orders</a>
         </nav>

         <div class="icons">
            <a href="search_page.php" class="fas fa-search"></a>
            <div class="dropdown">
               <div id="user-btn" class="fas fa-user" data-toggle="dropdown">

               <!-- toggle menu use -->
               <div class="user-box">
                  <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
                  <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
                  <a href="logout.php" class="delete-btn">logout</a>
               </div>
            </div>


            </div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>
      </div>
   </div>

</header>