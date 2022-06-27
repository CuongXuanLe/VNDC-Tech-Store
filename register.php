<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Bootstrap CDN -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styleWeb.css">
   <!-- <link rel="stylesheet" href="css/style.css"> -->

</head>
<body>



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
   
<div id="register-form" class="form-container">
   <div class="row ">
      <div class="col h-75 p-0">
         <img src="images/login.png" alt="" class="img-fluid ">
      </div>
      <div class="col d-flex justify-content-center align-items-center">
         <form action="" method="post" class="card shadow-lg w-75 p-3 border border-dark">
            <h3 class="mx-auto pb-2 font-rubik font-weight-bold text-capitalize">register now</h3>
            <input type="text" name="name" placeholder="enter your name" required class="box mx-4 p-2 mb-3 border rounded border-dark">
            <input type="email" name="email" placeholder="enter your email" required class="box mx-4 p-2 mb-3 border rounded border-dark">
            <input type="password" name="password" placeholder="enter your password" required class="box mx-4 p-2 mb-3 border rounded border-dark">
            <input type="password" name="cpassword" placeholder="confirm your password" required class="box mx-4 p-2 mb-3 border rounded border-dark">
            <select name="user_type" class="box mx-4 p-2 border rounded border-dark text-capitalize">
               <option value="user" class="text-capitalize">user</option>
               <option value="admin" class="text-capitalize">admin</option>
            </select>
            <input type="submit" name="submit" value="register now" class="font-baloo btn btn-dark mx-auto my-3 color-white text-capitalize">
            <p class="mx-auto font-rale text-capitalize text-center">already have an account? <a href="login.php" class="text-decoration-none">login now</a></p>
         </form>
      </div>
   </div>
</div>

   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>