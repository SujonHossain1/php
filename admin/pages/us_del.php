<?php
include'../includes/connection.php';

	if (!isset($_GET['do']) || $_GET['do'] != 1) {
    			$query = 'DELETE FROM admin_info WHERE admin_id = ' . $_GET['id'];
    			$result = mysqli_query($db, $query) or die(mysqli_error($db));				
            ?>
    			<script type="text/javascript">alert("User Successfully Deleted.");window.location = "user.php";</script>					
            <?php
    			//break;
	}
?>