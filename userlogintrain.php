<?php
include 'connection1.php';
session_start();
error_reporting(0);
if(isset($_POST["signin"]))
{
 
  $email=mysqli_real_escape_string($con,$_POST["email"]);
  
  $password=mysqli_real_escape_string($con,md5($_POST["password"]));
  
  $check_email=mysqli_query($con,"SELECT * FROM user WHERE email='$email' AND password='$password'");
 if(mysqli_num_rows($check_email)>0){
     $row=mysqli_fetch_assoc($check_email);
     $_SESSION["user_id"]=$row['id'];
     $_SESSION["user_name"]=$row['full_name'];
     $_SESSION["user_Contact_number"]=$row['Contact_number'];
     $_SESSION["user_email"]=$row['email'];
     header("Location:welcome.php");

 }
 else{
     ?>
     <script>
         alert("Login Details is incorrect");
     </script>
     <?php
 }
  
    
}
?>


<!DOCTYPE html>
<html>
<head>
  
  <title>website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;1,300&family=Lato&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 register-left">
      <img src="image/reg.png">

      </div>
      <div class="col-md-6 register-right">
      <h3>Login Here</h3>
      <div class="register-form">
        <form action="" class="login-email" method="post">
    
        <div class="form-group">
          <input type="email" placeholder="Email Address" name="email"  required>

        </div>
        
        <div class="form-group">
          <input type="password" placeholder="Password" name="password"  required>

        </div>
        
        <div class="input-group">
  <button type="submit" name="signin" class="btn btn-primary">Login</button></div>

  <p class="login-register-text">Have an account?<a href="register.php">Register Here</a></p>
</form>
<div class="alert alert-info" style="display: none;"></div>
</form>

      </div>
      </div>
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>