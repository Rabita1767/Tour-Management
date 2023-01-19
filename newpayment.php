<?php
require 'connection.php';
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $sql="SELECT * from hotelnew WHERE id='$id'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
    $p_name=$row['p_name'];
    $location=$row['location'];
    $price=$row['price'];
    $image=$row['image'];
}
if($_POST){
    require('fpdf/fpdf.php');
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $nid=$_POST['nid'];
    $cardnumber=$_POST['cardnumber'];
    $title='Receipt';
    $pin=$_POST['pin'];
    $target_dir="image/";
    $target_file=$target_dir.basename($_FILES['pImage']['name']);
    move_uploaded_file($_FILES['pImage']["tmp_name"],$target_file);
    
    $title = 'Receipt';

    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf->SetTitle($title);
    $pdf->SetFont('Arial','B',15);
    $w = $pdf->GetStringWidth($title)+6;
    $pdf->SetX((210-$w)/2);
    $pdf->SetDrawColor(221,221,221,1);
    
    $pdf->SetTextColor(255,255,255,1);
    $pdf->SetLineWidth(1);
    $pdf->Cell($w, 9, $title, 1, 1, 'C', true);
    $pdf->Ln(10);

    $pdf->SetTextColor(0,0,0,1);
    $w = $pdf->GetStringWidth($email)+6;
    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'Name:', 1, 0, 'C');
    $pdf->Cell($w, 10, $fname, 1, 1, 'C');

    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'Email:', 1, 0, 'C');
    $pdf->Cell($w, 10, $email, 1, 1, 'C');
    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'Price:', 1, 0, 'C');
    $pdf->Cell($w, 10, $price, 1, 1, 'C');
    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'Number:', 1, 0, 'C');
    $pdf->Cell($w, 10, $phone, 1, 1, 'C');


    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'NID', 1, 0, 'C');
    $pdf->Cell($w, 10, $nid, 1, 1, 'C');
    $pdf->Output();
}
?>
<html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Add hotel Information</title>
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </head>
 <body class="bg-info">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-md-6 bg-light mt-5 rounded">
                 <h2 class="text-center p-2">Please Fill the above Information</h2>
             <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
             <div class="form-group">
                 <input type="text" name="fname" class="form-control" placeholder="Full Name" required>
             </div>
             <div class="form-group">
                 <input type="email" name="email" class="form-control" placeholder="Email" required>
             </div>
             <div class="form-group">
                 <input type="text" name="phone" class="form-control" placeholder="Contact Number" required>
             </div>
             <div class="form-group">
                 <input type="text" name="nid" class="form-control" placeholder="NID" required>
             </div>
             <div class="form-group">
                 <input type="text" name="cardnumber" class="form-control" placeholder="Card Number" required>
             </div>
             <div class="form-group">
                 <input type="password" name="pin" class="form-control" placeholder="Enter Pin" required>
             </div>
             
             <div class="form-group">
                 <div class="custom-file">
                     <input type="file" name="pImage" class="custom-file-input" id="customFile" required>
                     <label for="customFile" class="custom-file-label">Choose Image</label>
                 </div>
             </div>
             <div class="form-group">
                 <input type="submit" name="submit" class="btn btn-danger btn-block" value="Procced">
             </div>
             <div class="form-group">
                 
             </div>

            </form>
             
                </div>

         </div>
         
     </div>
     
 </body>
 </html>