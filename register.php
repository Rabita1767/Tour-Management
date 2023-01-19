<?php
include 'connection1.php';
error_reporting(0);
if(isset($_POST["signup"]))
{
  $full_name=mysqli_real_escape_string($con,$_POST["signup_full_name"]);
  $email=mysqli_real_escape_string($con,$_POST["signup_email"]);
  $Contact_number=mysqli_real_escape_string($con,$_POST["signup_Contact_number"]);
  $password=mysqli_real_escape_string($con,md5($_POST["signup_password"]));
  $cpassword=mysqli_real_escape_string($con,md5($_POST["signup_cpassword"]));
  $check_email=mysqli_num_rows(mysqli_query($con,"SELECT email FROM user WHERE email='$email'"));
  if($password!==$cpassword){
    ?>
    <script>
      alert("Password doesnt match");
    </script>
    <?php
  }
  elseif($check_email>0){
    ?>
    <script>
      alert("Email Already Exist");
    </script>
    <?php

  }
  else{
    $sql="INSERT INTO `user`(`full_name`, `email`, `password`, `Contact_number`) VALUES ('$full_name','$email','$password','$Contact_number')";
    $result=mysqli_query($con,$sql);
    if($result){
      $_POST["signup_full_name"]="";
      $_POST["signup_email"]="";
      $_POST["signup_Contact_number"]="";
      $_POST["signup_password"]="";
      $_POST["signup_cpassword"]="";
      ?>
    <script>
      alert("User Registration Successful");
    </script>
    <?php

    }
    else{
      ?>
    <script>
      alert("Something Went Wrong");
    </script>
    <?php
    }
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
      <h3>Register Here</h3>
      <div class="register-form">
        <form action="" class="login-email" method="post">
        <div class="form-group">
          
          <input type="text" placeholder="Full Name" class="form-control" name="signup_full_name" value="<?php echo $_POST["signup_full_name"] ;?>" required>

        </div>
        <div class="form-group">
          <input type="email" placeholder="Email Address" class="form-control" name="signup_email" value="<?php echo $_POST["signup_email"] ;?>" required>

        </div>
        <div class="form-group">
          <input type="tel" placeholder="Contact Number" class="form-control" name="signup_Contact_number" value="<?php echo $_POST["signup_Contact_number"] ;?>" required>

        </div>
        <div class="form-group">
          <input type="password" placeholder="Password" class="form-control" name="signup_password" value="<?php echo $_POST["signup_password"]; ?>" required>

        </div>
        <div class="form-group">
          <input type="password" placeholder="Confirm Password" class="form-control" name="signup_cpassword" value="<?php echo $_POST["signup_cpassword"]; ?>" required>

        </div>
        <div class="input-group">
  <button type="submit" name="signup" class="btn btn-primary">Register</button></div>

  <p class="login-register-text">Have an account?<a href="userlogin.php">Login Here</a></p>
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