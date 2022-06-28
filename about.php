<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Bootstrap CDN -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   <!-- Owl-carousel CDN -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

   
   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/styleWeb.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<!-- header about -->

<div style="
   background-color: rgba(0, 0, 0, 0.5); 
   height: 50vh;
   background-image: url('https://images.unsplash.com/photo-1593062096033-9a26b09da705');
   background-repeat: no-repeat;
   background-size: cover;
   background-position: center center;">
   <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-center font-weight-bold font-rubik">
         <p class="text-uppercase text-white" style="font-size: 3.5rem;">about us</p>
         <h4 class="text-dark"><a href="home.php" class="text-decoration-none text-white text-uppercase" style="font-weight:600" >home /</a> about </h4>
      </div>
   </div>
<div> 



<section class="about">
   <div class="container p-0 d-flex my-5 align-items-center shadow">

      <div class=" col-5 bg-image d-flex justify-content-center align-items-center hover-overlay ripple rounded"
         style="
            background-image: url('https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/bts-header-giftcard-202206?wid=1120');
            height: 75vh;
            width: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            ">
      </div>

      <div class="p-5 col-7">
         <h2 class="text-center font-rubik pb-3 font-weight-bold text-uppercase">why choose us?</h2>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem unde nam nihil suscipit quibusdam, tenetur perferendis odit eveniet culpa, aliquam corporis laborum? Non, hic excepturi incidunt quos ab ipsam optio voluptatem possimus at minima voluptatibus vel atque pariatur harum natus facere. Dolorem eveniet repudiandae totam quis eligendi illum, nobis repellendus.</p>
         <a href="contact.php" class="btn btn-secondary text-capitalize font-rubik">contact us <i class="fa-solid fa-phone-flip ml-1"></i></a>
      </div>
   </div>
</section>

<section class="team">
   <div class="container-fluid py-4 mb-5 "> 
      <p class="text-uppercase text-dark text-center font-rubik" style="font-size: 3.5rem; font-weight:700">Meet the team</p>
      <div class="row p-0 d-flex flex-wrap my-5 justify-content-center align-items-center">
         <div class="col-2 text-center font-rubik mx-4">
            <img src="images/cuong.jpg" alt="member-1 picture" class="rounded-circle img-fluid mb-2" style="filter: grayscale(100%);">
            <p><span class="font-size-20">Cuong</span><br/>Front-End Developer</p>
         </div>
         <div class="col-2 text-center font-rubik mx-4">
            <img src="images/dan.jpg" alt="member-1 picture" class="rounded-circle img-fluid mb-2" style="filter: grayscale(100%);">
            <p><span class="font-size-20">Dan</span><br/>Back-End Developer</p>
         </div>
         <div class="col-2 text-center font-rubik mx-4">
            <img src="images/nhut.jpg" alt="member-1 picture" class="rounded-circle img-fluid mb-2" style="filter: grayscale(100%);">
            <p><span class="font-size-20">Nhut</span><br/>Back-End Developer</p>
         </div>
         <div class="col-2 text-center font-rubik mx-4">
            <img src="images/vu.jpg" alt="member-1 picture" class="rounded-circle img-fluid mb-2" style="filter: grayscale(100%);">
            <p><span class="font-size-20">Vu</span><br/>Front-End Developer</p>
         </div>
      </div>
   </div>
</section>

<?php include 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>