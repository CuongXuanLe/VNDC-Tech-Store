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

<!-- <header class="header">

   <!-- <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <p> new <a href="login.php">login</a> | <a href="register.php">register</a> </p>
      </div>
   </div> -->

   <!-- <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo">Bookly.</a>

         <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="shop.php">shop</a>
            <a href="contact.php">contact</a>
            <a href="orders.php">orders</a>
         </nav>

         
      </div>
   </div>

</header> -->

<nav class="navbar navbar-expand-lg navbar-light bg-transparent fs-1 position-absolute" style="z-index:1">
  <div class="container-fluid p-5 vw-100 position-relative">
    <a class="navbar-brand fs-1 text-white fw-bold position-absolute start-0" href="#">Techy</a>
    <div class="position-absolute start-50 top-50 translate-middle" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item mx-4">
          <a class="nav-link text-white" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item mx-4">
          <a class="nav-link text-white" href="#">About</a>
        </li>
        <li class="nav-item mx-4">
          <a class="nav-link text-white" href="#">Shop</a>
        </li>
        <li class="nav-item mx-4">
          <a class="nav-link text-white" href="#">Contact</a>
        </li>
        <li class="nav-item mx-4">
          <a class="nav-link text-white" href="#">Orders</a>
        </li>
      </ul>
    </div>
    <div class="position-absolute end-0">
      <div class="icons d-flex align-items-center">
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="search_page.php" class="fas fa-search mx-3"></a>
         <div class="dropdown mx-3">
            <button class="" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
               <div id="user-btn" class="fas fa-user"></div>
            </button>
            <div class="dropdown-menu fs-3" aria-labelledby="dropdownMenuButton1">
               <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
               <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
               <a href="logout.php" class="delete-btn">logout</a>
            </div>
         </div>
         <?php
            $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            $cart_rows_number = mysqli_num_rows($select_cart_number); 
         ?>
         <a href="cart.php" class="mx-3"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
      </div>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>