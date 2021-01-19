<?php
include('../includes/connection.php');

			$zz = $_POST['id'];
			$a = $_POST['firstname'];
            $c = $_POST['gender'];
            $d = $_POST['email'];
            $e = $_POST['password'];
            $g = $_POST['phone'];
            $i = $_POST['type'];
           // $j = $_POST['province'];
           // $k = $_POST['city'];
		
	 			$query = 'UPDATE admin_info set admin_name="'.$a.'", gender="'.$c.'", admin_email="'.$d.'", admin_password = sha1("'.$e.'"),TYPE="'.$i.'"  WHERE
					admin_id ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));							
?>
				<script type="text/javascript">
	                alert("You've updated your account successfully.");
	                window.location = "user.php";
            	</script>