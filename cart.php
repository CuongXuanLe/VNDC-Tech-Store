<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $cart_quantity = $_POST['cart_quantity'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
   $message[] = 'Cart quantity updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
   header('location:cart.php');
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Cart</title>

      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

      <!-- Bootstrap CDN -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

      <!-- custom admin css file link  -->
      <link rel="stylesheet" href="css/styleWeb.css">

   </head>
   <body>
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      
   <?php include 'header.php'; ?>

   <section class="heading">
      <div style="
      background-color: rgba(0, 0, 0, 0.3);
      height: 90vh;
      background-image: url('https://images.unsplash.com/photo-1578258789061-354f25c13631');
      background-repeat: no-repeat;
      
      background-size: cover;
      background-position: center center;">
         <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-center font-weight-bold font-rubik">
               <p class="text-uppercase text-white" style="font-size: 3.5rem;">shopping cart</p>
            </div>
         </div>
      <div>
   </section>

   <section class="shopping-cart">
      <h1 class="text-center font-rubik py-5 font-weight-bold text-uppercase">Items in cart</h1>
      <div class="container d-flex flex-wrap justify-content-center align-items-center mb-5">
         <div class="row d-flex justify-content-center">
         <?php
            $grand_total = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select_cart) > 0){
               while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
         ?>
         <div class="card col-lg-3 d-flex justify-content-center p-4 font-rubik border rounded border-dark shadow mb-4 mx-3">
            <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times position-absolute" style="top:7px; right:7px" onclick="return confirm('delete this from cart?');"></a>
            <div class="my-auto">
               <img class="image d-block w-100" src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="product">
            </div>
            <div class="row d-flex px-3" style="justify-content: space-between">
               <div class="font-weight-bold text-capitalize my-1"  style="font-size:1.6rem"><?php echo $fetch_cart['nameWithOption']; ?></div>
               <div class="font-weight-bold font-size-20 text-white text-danger my-1"><span class="text-dark pr-2">Price:</span><?php echo $fetch_cart['price']; ?> VND</div>
            </div>
            <form action="" method="post" class="">
               <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
               <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>" class="px-2 py-2 border rounded border-dark col-12 mb-3">
               <input type="submit" name="update_cart" value="update" class="btn btn-warning col-12 font-rubik text-capitalize text-dark">
            </form>
            <div class="font-weight-bold font-size-20 text-capitalize border border-dark py-2 rounded text-center mt-4">total : <span class="text-danger"><?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?> VND</span> </div>
         </div>
         <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<p class="card border border-dark text-center m-auto font-rubik font-size-20 text-capitalize text-danger p-3">your cart is empty</p>';
         }
         ?>
         </div>
      </div>

      <div class="container py-5">
         <div class="col-lg-5 px-3 py-3 m-auto my-4 font-rubik position-static shadow">
            <p class="text-centertext-capitalize font-rubik text-center"style="font-size: 2rem" >Total: <span class="text-danger"><?php echo $grand_total; ?> VND</span></p>
            <div class="d-flex justify-content-center">
               <a href="checkout.php" class="btn btn-success w-100 mx-2 px-5 text-capitalize d-flex justify-content-center align-items-center <?php echo ($grand_total > 1)?'':'disabled'; ?>">checkout</a>
            </div>
         </div>
      </div>

   </section>

   
   <?php include 'footer.php'; ?>

   </body>
</html>