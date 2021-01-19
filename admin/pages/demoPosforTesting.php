<?php
  //include autoloader

  require_once '../dompdf/autoload.inc.php';

  // reference the Dompdf namespace

  use Dompdf\Dompdf;

  //initialize dompdf class

  $document = new Dompdf();
  
?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>HTML to PDF</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

  <?php
  include'../includes/connection.php';
  include '../includes/invoiceQuery.php';


  $html = '';
  $html .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th>Invoice No.</th>
      <th>Date</th>
      <th>Total</th>
      <th>Amount Received</th>
      <th>Due</th>
    </tr>
  ';
  while ($row = mysqli_fetch_assoc($result)) {
    $due = $row["GRANDTOTAL"];
    echo $due;
    $due1 =$row["CASH"];
    echo $due1;
    $due = $due-$due1;
    $html .= '<tr>
                  <td>'.$row["TRANS_D_ID"].'</td>
                  <td>'.$row["DATE"].'</td>
                  <td>'.$row["GRANDTOTAL"].'</td>
                  <td>'.$row["CASH"].'</td>
                  <td>'.$due.'</td>
                </tr>';
        }
  $html .= '</table><br>';

  include '../includes/invoiceQuery.php';
  $html .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th>Service</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Amount</th>
    </tr>
  ';
  while ($row = mysqli_fetch_assoc($result)) {
    $total = $row["QTY"]*$row["PRICE"];
    $html .= '<tr>
                  <td>'.$row["PRODUCTS"].'</td>
                  <td>'.$row["PRICE"].'</td>
                  <td>'.$row["QTY"].'</td>
                  <td>'.$total.'</td>
                </tr>';
        }
  $html .= '</table>';



  
 /* $html = <<<DELIMITER
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Table</h2>
        <table class="table table-border">
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Semester</th>
          </tr>
          <tr>
            <td></td>
            <td>Sadek Nuru</td>
            <td>7th</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Taohid Al Farabi</td>
            <td>7th</td>
          </tr>
        </table>
      </div>
      <div class="col-md-6">
        <h2>Heading of the note</h2>
        <p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?</p>
        <p>What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?</p>
      </div>
      <img src="dig.jpg" alt="" style="margin-left:100px;" />
    </div>
  </div>
DELIMITER; */
    
?>  
  <?php
    ob_end_clean();

    $document->loadHtml($html);
    //$page = file_get_contents("test.html");
    //$document->loadHtml($page);
    // set page size and orientation
    $document->setPaper('A4','landscape');
    
    // render the HTML as PDF
    $document->render();
    
    // get output of generated pdf in browser
    //$document->stream();
    $document->stream("htmlpdf",array("Attachment"=>0));
  ?>
</body>
</html>