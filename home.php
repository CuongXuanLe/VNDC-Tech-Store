<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];
   $product_option = $_POST['product_option'];
   $product_nameWithOption = $_POST['product_name'] . ' - ' . $product_option;

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image, nameWithOption) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image', '$product_nameWithOption')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Home</title>

      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

      <!-- Bootstrap CDN -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      
      <!-- custom admin css file link  -->
      <link rel="stylesheet" href="css/styleWeb.css">


   </head>
   <body>
      
   <?php include 'header.php'; ?>

   <section class="header__tittle">

      <div class="mask" style="
         background-color: rgba(0, 0, 0, 0.3); 
         height: 80vh;
         background-image: url('https://mdbootstrap.com/img/Photos/Others/images/77.jpg');
         background-repeat: no-repeat;
         background-size: cover;
         background-position: center center;">
         <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white text-center">
               <h1>Welcome to our Website !</h1>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, quod? Reiciendis ut porro iste totam.</p>
               <a href="about.php" class="btn btn-primary font-rubik">Discover more</a>
            </div>
         </div>
      </div>


   </section>

   <section class="products">

      <h1 class="text-center font-rubik py-5 font-weight-bold text-uppercase">latest products</h1>

      <div class="container d-flex flex-wrap justify-content-center mb-5">

         <?php  
            $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
               while($fetch_products = mysqli_fetch_assoc($select_products)){
         ?>
         <form action="" method="post" class="card d-flex justify-content-center w-25 p-4 font-rubik border rounded border-dark shadow m-2">
            <div class=" my-auto">
               <img class="image d-block w-100 " src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
            </div> 
            <div class="font-weight-bold font-size-20 text-capitalize"><?php echo $fetch_products['name']; ?></div>
            <div class="font-weight-bold font-size-20 text-white position-absolute btn btn-danger py-1" style="top:5px; left:5px">$<?php echo $fetch_products['price']; ?></div>
            <input type="number" min="1" name="product_quantity" value="1" class="px-2 py-2 border rounded border-dark mb-3">
            <?php
               $item_id = $fetch_products['id'];
               $select_products_opt = mysqli_query($conn, "SELECT * FROM `product_opts` WHERE product_id = '$item_id'") or die('query failed');
               while($fetch_options = mysqli_fetch_assoc($select_products_opt)){
                  $option1 = $fetch_options['option_one'];
                  $option2 = $fetch_options['option_two'];
                  $option3 = $fetch_options['option_three'];
               }
            ?>
            <div class="row d-flex flex-wrap justify-content-center">
               <p class="my-auto mr-4 font-weight-bold">Color:</p>
                  <!-- Dropdown options -->
                  <select name="product_option" id="product_option" class="px-3 py-2">
                     <option value="<?php echo $option1; ?>"><?php echo $option1; ?></option>
                     <option value="<?php echo $option2; ?>"><?php echo $option2; ?></option>
                     <option value="<?php echo $option3; ?>"><?php echo $option3; ?></option>
                  </select>
            </div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
            <input type="submit" value="add to cart" name="add_to_cart" class="btn btn-primary text-capitalize mt-3">
         </form>
         <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
         ?>
      </div>

      <div class="load-more" style="margin-top: 2rem; text-align:center">
         <a href="shop.php" class="btn btn-secondary text-capitalize font-weight-bolder text-white shadow">load more</a>
      </div>

   </section>

   <section class="about">

      <div class="container w-75 h-auto p-0 d-flex my-5 align-items-center shadow ripple rounded">

         <div class="bg-image d-flex justify-content-center align-items-center hover-overlay col-6"
            style="
               background-image: url('https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/bts-header-giftcard-202206?wid=1120');
               height: 80vh;
               width: 30vh;
               background-repeat: no-repeat;
               background-size: cover;
               background-position: center center;
               ">
         </div>

         <div class="p-5 col-5">
            <h2 class="text-center font-rubik pb-3 font-weight-bold text-uppercase">about us</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit quos enim minima ipsa dicta officia corporis ratione saepe sed adipisci?</p>
            <a href="about.php" class="btn btn-secondary text-capitalize font-rubik">read more <i class="fa-solid fa-arrow-right"></i> </a>
         </div>
      </div>
   </section>

   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner ">
         <div class="carousel-item active">
            <img src="./images/workspace.jpg" class="d-block w-100" alt="banner_1">
            <div class="carousel-caption d-none d-md-block position-absolute">
               <h5>First slide label</h5>
               <p>Some representative placeholder content for the first slide.</p>
            </div>
         </div>
         <div class="carousel-item">
            <img src="./images/store.jpg" class="d-block w-100" alt="banner_1">
         </div>
         <div class="carousel-item">
            <img src="./images/orders.jpg" class="d-block w-100" alt="banner_1">
         </div>
      </div>
      <button class="carousel-control-prev h-25 bg-transparent border-0 my-auto" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
      </button>
      <button class="carousel-control-next h-25 bg-transparent border-0 my-auto" type="button" data-target="#carouselExampleIndicators" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
      </button>
   </div>

   <section class="home-contact">
      <div class="container py-5">
         <h3 class="text-center text-capitalize font-weight-bold">have any questions?</h3>
         <div class="d-flex-col text-center">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque cumque exercitationem repellendus, amet ullam voluptatibus?</p>
            <a href="contact.php" class="btn btn-secondary text-capitalize font-rubik">contact us <i class="fa-solid fa-comment pl-1"></i></a>
         </div>
      </div>
   </section>

   <?php include 'footer.php'; ?>

   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

   </body>
</html>