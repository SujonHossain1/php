<?php

	 $query = "SELECT * from customer c,transaction t,transaction_details t_d where c.CUST_ID = t.CUST_ID and t.TRANS_D_ID = t_d.TRANS_D_ID";
  $result = mysqli_query($db, $query) or die (mysqli_error($db));

?>