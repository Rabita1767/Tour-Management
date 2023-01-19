<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title></title>
  
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;1,300&family=Lato&display=swap" rel="stylesheet">
</head>
<body>

 
    
    
<div class="filter">

</div>
    
<div class="main-div">
    <h2 class="title text-center">Members of Admin Panel</h2>
    <div class="center-div">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                       
                        <th>Gender</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Mobile</th>
                    </tr>
                </thead>
                <tbody>
                <?php
include 'connection.php';
$selectquery="select * from member";
$query=mysqli_query($con,$selectquery);
$nums=mysqli_num_rows($query);

while($res=mysqli_fetch_array($query))
{
   
    ?>
    <tr>
    <td><?php echo $res['ID']?></td>
    <td><?php echo $res['Name']?></td>
    <td><?php echo $res['Email']?></td>
    
    <td><?php echo $res['Gender']?></td>
    
    <td><?php echo $res['Address']?></td>
    <td><?php echo $res['City']?></td>
    <td><?php echo $res['Mobile']?></td>
</tr>


<?php
}
?>

                   
                </tbody>

            </table>
        </div>

    </div> 
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>