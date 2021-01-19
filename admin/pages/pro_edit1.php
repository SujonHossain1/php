<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
 $query = 'SELECT ID, t.TYPE,employee.FIRST_NAME,employee.LAST_NAME FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID JOIN employee on u.EMPLOYEE_ID= employee.EMPLOYEE_ID WHERE ID='.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
            $emp_name = $row['FIRST_NAME'].' '.$row['LAST_NAME'];
                   
if ($Aa=='User'){
	$pi = $_POST['id'];
	$pname = $_POST['prodname'];
	$pr = $_POST['price'];
	$cat = $_POST['category'];
	$sub = $_POST['subcatagory'];


    $query = 'UPDATE product set NAME="'.$pname.'",
					NETPRICE="'.$pr.'", CATEGORY_ID ="'.$cat.'",SUB_CATEGORY_ID = "'.$sub.'",employee="'.$emp_name.'" WHERE
					PRODUCT_ID ="'.$pi.'"';
    $query1= '';

    $message = "One update request for product by ".$emp_name;

    $query_send = "INSERT INTO permission VALUES(null,'{$query}','{$query1}','{$message}')";
    $result = mysqli_query($db, $query_send) or die(mysqli_error($db));

    $query_mail = "SELECT employee.EMAIL FROM employee WHERE employee.JOB_ID=1";
    $result = mysqli_query($db,$query_mail) or die(mysqli_fetch_assoc($db));
    while ($row = mydqli_fetch_assoc($result)) {
           mail($row['EMAIL'],"Approval Request",$message);
    }

            echo '<script type="text/javascript">
                      //then it will be redirected
                      alert("Request is submitted to admin.");
                      window.location = "product.php";
                  </script>';

?>
  
<?php
  }           
}
if($Aa!='User'){

$pi = $_POST['id'];
$pname = $_POST['prodname'];
$pr = $_POST['price'];
$cat = $_POST['category'];
$sub = $_POST['subcatagory'];
		
$query = 'UPDATE product set NAME="'.$pname.'",
					NETPRICE="'.$pr.'", CATEGORY_ID ="'.$cat.'",SUB_CATEGORY_ID = "'.$sub.'",employee="'.$emp_name.'" WHERE
					PRODUCT_ID ="'.$pi.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
					echo '<script type="text/javascript">
			alert("You have Updated the Product Successfully.");
			window.location = "product.php";
		</script>';
}							
?>	