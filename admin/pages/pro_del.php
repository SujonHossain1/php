<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  			$result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
  			$query = 'DELETE FROM product WHERE PRODUCT_ID = ' . $_GET['id'];
            $query1= '';

            $message = "One delete request for product.";

            $query_send = "INSERT INTO permission VALUES(null,'{$query}','{$query1}','{$message}')";
            $result = mysqli_query($db, $query_send) or die(mysqli_error($db));

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

			if (!isset($_GET['do']) || $_GET['do'] != 1) {
						
    			$query = 'DELETE FROM product WHERE PRODUCT_ID = ' . $_GET['id'];
    			$result = mysqli_query($db, $query) or die(mysqli_error($db));				
            ?>
    			<script type="text/javascript">alert("Product Successfully Deleted.");window.location = "product.php";</script>					
            <?php
    			//break;
        
	}
		}

							
?>	




