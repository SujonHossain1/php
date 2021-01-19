<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE,employee.FIRST_NAME,employee.LAST_NAME FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID JOIN employee on u.EMPLOYEE_ID= employee.EMPLOYEE_ID WHERE ID='.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
            $name = $row['FIRST_NAME'].' '.$row['LAST_NAME'];
                   
  if ($Aa=='User'){
  			    $id = $_POST['id'];
			      $paidamount = $_POST['paidamount'];
            $due = $_POST['due'];


            $query = 'UPDATE transaction t,transaction_details td set t.CASH="'.$paidamount.'",t.employee="'.$name.'",td.EMPLOYEE="'.$name.'" WHERE t.TRANS_D_ID=td.TRANS_D_ID and t.TRANS_D_ID="'.$id.'"';
            $query1= 'UPDATE due set due_amount="'.$due.'"
            WHERE TRANS_D_ID="'.$id.'";';

            $message = "One update request for due by ".$name;

            $query_send = "INSERT INTO permission VALUES(null,'{$query}','{$query1}','{$message}')";
            $result = mysqli_query($db, $query_send) or die(mysqli_error($db));

            $query_mail = "SELECT employee.EMAIL FROM employee WHERE employee.JOB_ID=1";
            $result = mysqli_query($db,$query_mail) or die(mysqli_fetch_assoc($db));
            while ($row = mysqli_fetch_assoc($result)) {
               mail($row['EMAIL'],"Approval Request",$message);
            }

            echo '<script type="text/javascript">
                      //then it will be redirected
                      alert("Request is submitted to admin.");
                      window.location = "due.php";
                  </script>';

?>
  
<?php
  }           
}
			if($Aa!='User'){

			$id = $_POST['id'];
			$paidamount = $_POST['paidamount'];
      $due = $_POST['due'];


      $query = 'UPDATE transaction t,transaction_details td set t.CASH="'.$paidamount.'",t.employee="'.$name.'",td.EMPLOYEE="'.$name.'" WHERE t.TRANS_D_ID=td.TRANS_D_ID and t.TRANS_D_ID="'.$id.'"';

            
		
			$result = mysqli_query($db, $query) or die(mysqli_error($db));
			$sql = 'UPDATE due set due_amount="'.$due.'"
            WHERE TRANS_D_ID="'.$id.'";';
			$result = mysqli_query($db, $sql) or die(mysqli_error($db));
		}

							
?>	
	<script type="text/javascript">
			alert("You've Update Transaction Successfully.");
			window.location = "due.php";
		</script>