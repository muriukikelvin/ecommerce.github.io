<?php
include ('../fpdf/fpdf.php');
include("includes/db.php"); 
session_start();
class PDF extends FPDF
{
// Page header
function Header()
{
   
    $this->Image('../images/logo.png',90,2,30);
    $this->SetFont('Times','B',15);
    $this->Cell(200,18,'Zaraa Farm Produce Marketers',2,60,'C');
    $this-> SetFont('Times','I',12);
    $this-> Cell(0,0,'We connect buyers and sellers',0,0,'C');
    $this-> Ln(9);
    // Line break
    $this-> SetFont('Times','B',15);
    $this-> Cell(0,0,' My Orders',0,0,'C');
    $this-> Ln(13);
}
    

  function headerTable(){
    $this-> SetFont('Times','B',12);
    $this-> Cell(10,10,'S.N',1,0,'C');
    $this-> Cell(34,10,'Product Title',1,0,'C');
    $this-> Cell(17,10,'Quantity',1,0,'C');
     $this-> Cell(19,10,'Price(Ksh)',1,0,'C');
    $this-> Cell(37,10,'Customer Name',1,0,'C');
    $this-> Cell(20,10,'Invoice No.',1,0,'C');
    $this-> Cell(40,10,'Order Date',1,0,'C');
    $this->Ln();
    }

  function viewTable($con){
        $this->SetFont('Times','',12);
        $id = $_SESSION['user_id'];
       $get_order = "SELECT * FROM orders where farmer_id='$id'";
    $run_order = mysqli_query($con, $get_order);
    $i = 0;
      while  ($row_order = mysqli_fetch_array($run_order)){
        $order_id = $row_order ['order_id'];
        $cus_id = $row_order ['customer_id'];
        $farm_id = $row_order ['farmer_id'];
        $pro_id = $row_order  ['product_id'];
        $qty = $row_order ['qty'];
        $total = $row_order ['total_amount']; 
        $invoice_no = $row_order ['invoice_no'];
        $order_date = $row_order ['date_order'];
        
        $i++ ; 

        $get_pro = "SELECT * FROM products WHERE product_id ='$pro_id'";
        $run_pro = mysqli_query ($con, $get_pro);
        $row_pro = mysqli_fetch_array ($run_pro);
        $pro_image = $row_pro['product_image'];
        $pro_title = $row_pro ['product_title'];
        $pro_price = $row_pro ['product_price'];

        $get_cus = "SELECT * FROM customers WHERE customer_id ='$cus_id'";
        $run_cus = mysqli_query ($con, $get_cus);
        $row_cus = mysqli_fetch_array ($run_cus);
        $cus_name = $row_cus['customer_name'];
        $cus_contact = $row_cus['customer_contact'];

        $get_farmer = "SELECT * FROM users WHERE user_id ='$farm_id'";
        $run_farm = mysqli_query ($con, $get_farmer);
        $row_users = mysqli_fetch_array ($run_farm);
        $farm_name = $row_users['username'];
        $farm_id = $row_users ['national'];
        $farm_contact = $row_users['contact'];

         $totallPrice = $qty *  $pro_price;
    
         $this-> SetFont('Times','B',12);
            $this-> Cell(10,10,$i,1,0,'C');
            $this-> Cell(34,10,$pro_title,1,0,'L');
            $this-> Cell(17,10,$qty,1,0,'L');
            $this-> Cell(19,10, $totallPrice,1,0,'L');
            $this-> Cell(37,10, $cus_name,1,0,'L');
            $this-> Cell(20,10,$invoice_no,1,0,'L');
            $this-> Cell(40,10,$order_date,1,0,'L');
            $this->Ln();
        
  }
}

function Footer(){
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Times','',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->headerTable();
$pdf-> viewTable($con);
$pdf->SetFont('Times','',12);

$pdf->Output();
?>