<?php
session_start();


if($_POST){
    require('fpdf/fpdf.php');
    $name=$_SESSION['user_name'];
    $email= $_SESSION['user_email'];
    $phone=$_SESSION['user_Contact_number'];
    
    $nid=$_POST['nid'];
    $cardnumber=$_POST['cardnumber'];
    $title='Receipt';
    $pin=$_POST['pin'];
    
    
    $title = 'Receipt';
    
    
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
    $pdf->Cell($w, 10, $name, 1, 1, 'C');

    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'Email:', 1, 0, 'C');
    $pdf->Cell($w, 10, $email, 1, 1, 'C');
    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'Number:', 1, 0, 'C');
    $pdf->Cell($w, 10, $phone, 1, 1, 'C');


    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'NID', 1, 0, 'C');
    $pdf->Cell($w, 10, $nid, 1, 1, 'C');
    $pdf->Output();
}
?>