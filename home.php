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
      $message[] = 'Already added to your cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image, nameWithOption) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image', '$product_nameWithOption')") or die('query failed');
      $message[] = 'Product added to your cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>VNDC Tech</title>

      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

      <!-- Bootstrap CDN -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      
      <!-- slick -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
      <!-- custom admin css file link  -->
      <link rel="stylesheet" href="css/styleWeb.css">


   </head>
   <body>
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
   <?php include 'header.php'; ?>

   <section class="header__tittle">

      <div class="mask" style="
         background-color: rgba(0, 0, 0, 0.3); 
         height: 80vh;
         background-image: url('https://user-images.githubusercontent.com/86118892/176749598-5c19e2f0-692b-4578-aa61-547b5e4c6f7f.png');
         background-repeat: no-repeat;
         background-size: cover;
         background-position: center center;">
         <div class="d-flex justify-content-start align-items-center h-100">
            <div class="text-white col-md-5 ml-4">
               <p class="text-weight-bold text-uppercase" style="font-size: 3rem; font-weight:700">welcome to VNDC tech store</p>
               <p class="text-light">Pleaseee give us good markkkkkkk!</p>
            </div>
         </div>
      </div>
   </section>

   <section class="carousel py-5">
      <h1 class="text-center font-rubik py-5 font-weight-bold text-uppercase">new release</h1>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
         </ol>
         <div class="carousel-inner ">
            <div class="carousel-item active">
               <img src="./images/ip1.jpg" class="d-block w-100" alt="banner_1">
               <div class="carousel-caption d-none d-md-block position-absolute">
                  <h5>Iphone 13 Pro Max</h5>
                  <p>A dramatically more powerful camera system. A display so responsive, every interaction feels new again. The worlds fastest smartphone chip. Exceptional durability. And a huge leap in battery life.</p>
               </div>
            </div>
            <div class="carousel-item">
               <img src="./images/ip2.jpg" class="d-block w-100" alt="banner_1">
               <div class="carousel-caption d-none d-md-block position-absolute">
                  <h5>Iphone 12</h5>
                  <p>Our Pro camera system gets its biggest upgrade ever. With next-level hardware that captures so much more detail. Superintelligent software for new photo and filmmaking techniques.</p>
               </div>
            </div>
            <div class="carousel-item">
               <img src="./images/ip3.jpg" class="d-block w-100" alt="banner_1">
               <div class="carousel-caption d-none d-md-block position-absolute text-dark">
                  <h5>Iphone 13 Pro Max</h5>
                  <p>A dramatically more powerful camera system. A display so responsive, every interaction feels new again. The worlds fastest smartphone chip. Exceptional durability. And a huge leap in battery life.</p>
               </div>
            </div>
            <div class="carousel-item">
               <img src="./images/ip4.jpg" class="d-block w-100" alt="banner_1">
               <div class="carousel-caption d-none d-md-block position-absolute">
                  <h5>Iphone 13 Pro Max</h5>
                  <p>A dramatically more powerful camera system. A display so responsive, every interaction feels new again. The worlds fastest smartphone chip. Exceptional durability. And a huge leap in battery life.</p>
               </div>
            </div>
            <div class="carousel-item">
               <img src="./images/ip5.jpg" class="d-block w-100" alt="banner_1">
               <div class="carousel-caption d-none d-md-block position-absolute">
                  <h5>Iphone 13 Pro Max</h5>
                  <p>A dramatically more powerful camera system. A display so responsive, every interaction feels new again. The worlds fastest smartphone chip. Exceptional durability. And a huge leap in battery life.</p>
               </div>
            </div>
            <div class="carousel-item">
               <img src="./images/ip6.jpg" class="d-block w-100" alt="banner_1">
               <div class="carousel-caption d-none d-md-block position-absolute">
                  <h5>Macbook Pro</h5>
                  <p>Our most powerful notebooks. Fast M1 processors, incredible graphics, and spectacular Retina displays. Now available in a 14-inch model.</p>
               </div>
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
   </section>

   <section class="products">

      <h1 class="text-center font-rubik py-5 font-weight-bold text-uppercase"> products</h1>

      <div class="container d-flex flex-wrap justify-content-center align-items-center mb-5">
         <div class="row d-flex justify-content-center">
            <?php  
               $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
               if(mysqli_num_rows($select_products) > 0){
                  while($fetch_products = mysqli_fetch_assoc($select_products)){
            ?>
            <form action="" method="post" class="card col-lg-3 p-4 font-rubik border border-dark shadow m-3">
               <div class=" my-auto">
                  <img class="image d-block w-100 " src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="product">
               </div> 
               <div class="row d-flex px-3 my-auto" style="justify-content: space-between">
                  <div class="font-weight-bold text-capitalize my-2" style="font-size: 1.5rem;"><?php echo $fetch_products['name']; ?></div>
                  <div class="font-weight-bold font-size-20 text-white my-auto text-danger "><?php echo $fetch_products['price']; ?><span class="pl-1">VND</span></div>
               </div>
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
                  <p class="my-auto mr-2 font-weight-bold">Color:</p>
                     <!-- Dropdown options -->
                     <select name="product_option" id="product_option" class="border rounded border-dark w-50 py-2 px-2">
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
      </div>

      <div class="load-more" style="margin-top: 2rem; text-align:center">
         <a href="shop.php" class="btn btn-secondary text-capitalize font-weight-bolder text-white shadow"><i class="fa-solid fa-cart-shopping"></i> Buy more</a>
      </div>

   </section>

   <section class="about">
      <div class="container card my-5 shadow">
         <div class="row g-0">
            <div class="col-md-6 p-0">
               <img src="./images/clay-banks-zH9kK6wNC20-unsplash.jpg" class="img-fluid rounded-start" alt="img." 
               style="
               background-repeat: no-repeat;
               background-size: cover;
               background-position: center center;"
               >
            </div>
            <div class="col-md-6 my-auto">
               <div class="card-body">
                  <h1 class="card-title text-center font-rubik pb-3 font-weight-bold text-uppercase">about us</h1>
                  <p class="card-text">
                  This is an e-commerce site used to sell technology or related products. VNDC Tech aims to improve user experience, easy to manage and user-friendly. We are constantly upgrading as well as expanding the quantity and quality of products currently sold on the shop
                  </p>
                  <a href="about.php" class="btn btn-secondary text-capitalize font-rubik">read more <i class="fa-solid fa-arrow-right"></i> </a>
               </div>
            </div>
         </div>
         </div>
   </section>

   <section class="home-connect container py-5 my-5 d-flex justify-content-center mx-auto shadow rounded" style="
         background-color: rgba(0, 0, 0, 0.3); 
         height: 30vh;

         background-image: url('https://images.unsplash.com/photo-1531297484001-80022131f5a1');
         background-repeat: no-repeat;
         background-size: cover;
         background-position: center center;" 
         >
      <div class="container my-auto">
         <h3 class="text-center text-capitalize font-weight-bold text-light">If you have any problems, please contact us</h3>
         <div class="d-flex-col text-center text-light">
            <p>Feedback to us</p>
            <a href="contact.php" class="btn btn-secondary text-capitalize font-rubik">Feedback us <i class="fa-solid fa-comment pl-1"></i></a>
         </div>
      </div>
   </section>
   
   <?php include 'footer.php'; ?>
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script src="js/index.js"></script>
   </body>
</html>