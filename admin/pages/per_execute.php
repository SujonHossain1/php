<?php
include('../includes/connection.php');
			$action = $_GET['action'];
			if($action=='edit')
			{
				$id = $_GET['id'];
				$query = "SELECT * FROM permission WHERE permission.id='{$id}';";
				$result = mysqli_query($db, $query) or die (mysqli_error($db));
				$row = mysqli_fetch_assoc($result);
				$msg = $row['query'];
				$msg1 = $row['query1'];
				mysqli_query($db, $msg) or die (mysqli_error($db));
				if(!empty($msg1)){
					mysqli_query($db, $msg1) or die (mysqli_error($db));
		}

				$query_delete = "DELETE FROM permission WHERE permission.id='{$id}';";
				$result = mysqli_query($db, $query_delete) or die (mysqli_error($db));
				echo '<script type="text/javascript">
			alert("You have granted the request.");
			window.location = "admin_permission.php";
		</script>';
			}
			else if($action=='delete')
			{
				$id = $_GET['id'];
				$query = "DELETE FROM permission WHERE permission.id='{$id}'";
				$result = mysqli_query($db, $query) or die (mysqli_error($db));
				echo '<script type="text/javascript">
			alert("You have Rejected the request.");
			window.location = "admin_permission.php";
		</script>';
			}
							
?>	