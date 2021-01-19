<?php
include'../includes/connection.php';

			$zz = $_POST['id'];
			$fname = $_POST['firstname'];
            $phone = $_POST['phone'];
            $area = $_POST['jobs'];
           // $prov = $_POST['province'];
           // $cit = $_POST['city'];
		
	 			$query = 'UPDATE delivery_man e set name="'.$fname.'",
					phone_number="'.$phone.'", area ="'.$area.'" WHERE
					id ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("You've Update Delivery Man Details Successfully.");
			window.location = "employee.php";
		</script>