<?php

include 'connection.php';
$ids=$_GET['id'];
$showquery="select * from register_user_train where id={$ids}";
$showdata=mysqli_query($con,$showquery);
$arrdata=mysqli_fetch_array($showdata);
if(isset($_POST['save_data']))
{
    $idupdate=$_GET['id'];
    $name=$_POST['name'];
  $bloodgroup=$_POST['bloodgroup'];
  $Contact_number=$_POST['Contact_number'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $no_of_ticket=$_POST['no_of_ticket'];
  
 
  //$insertquery="INSERT INTO `client`( `name`, `email`, `Contact_number`, `gender`) VALUES ('$name','$email','$Contact_number','$gender')";
  $query="UPDATE `register_user_train` SET `id`='$idupdate',`name`='$name',`bloodgroup`='$bloodgroup',`Contact_number`='$Contact_number',`email`='$email',`address`='$address',`no_of_ticket`='$no_of_ticket' WHERE id=$idupdate ";
  $res=mysqli_query($con,$query);


  if($res)
  {
   
    header('location:trainclient.php');
    
    
  }
  else{
    ?>
    <script>
    alert("Something Went Wrong");
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
  <link rel="stylesheet" type="text/css" href="stylereg.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;1,300&family=Lato&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" >
</head>
<body>
<section id="nav-bar">
<nav class="navbar navbar-expand-lg navbar-light">
 
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="adminindex.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="hotellist.php">Hotel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="trainlist.php">Train</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="buslist.php" >Bus</a>
        </li>
      

        <li class="nav-item">
          <a class="nav-link" href="client.php" >Clients</a>
        </li>
        
        
      </ul>
    </div>
  
</nav>
</section>

<div class="container">
  <div class="row">
    <div class="col-md-6 register-left">
      <img src="image/reg.png">
    </div>
    <div class="col-md-6 register-right">
    <h3>Register Here</h3>
      <div class="register-form">
      <form action="" method="post">
      <div class="form-group">

<label for="name">Name</label>
<input type="text" name="name" class="form-control" id="name" value="<?php echo $arrdata['name']?>"aria-describedby="emailHelp" placeholder="Enter name">
</div>



<div class="form-group">
<label for="bloodgroup">Blood Group</label>
<input type="text" name="bloodgroup" class="form-control" id="bloodgroup" value="<?php echo $arrdata['bloodgroup']?>"placeholder="Blood Group">
</div>

<div class="form-group">
<label for="Contact_number">Contact Number</label>
<input type="text" pattern= "[0-9]{11}" maxlength="11" name="Contact_number"  value="<?php echo $arrdata['Contact_number']?>"class="form-control" id="Contact_number" placeholder="+88" >


</div>

<div class="form-group">
<label for="email">Email</label>
<input type="email" name="email" class="form-control" id="email"value="<?php echo $arrdata['email']?>" placeholder="Email">
</div>
<div class="form-group">
<label for="address">Address</label>
<input type="text" name="address" class="form-control" id="address" value="<?php echo $arrdata['address']?>"placeholder="Address">
</div>
<div class="form-group">
<label for="no_of_rooms">Number of Tickets to Book</label>
<input type="number" name="no_of_ticket" class="form-control" value="<?php echo $arrdata['no_of_ticket']?>"id="no_of_ticket" value="1" min="1" max="1">
</div>
      
  
  <div class="input-group">
  <button type="submit" name="save_data"class="btn btn-primary">Update</button></div>
</form>
<div class="alert alert-info" style="display: none;"></div>


      </div>


    </div>

  </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
 </head>
 
 

</body>

</html>
