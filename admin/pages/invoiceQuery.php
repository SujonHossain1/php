<?php

	 $query = "SELECT * FROM customer C,transaction T,transaction_details TD WHERE C.CUST_ID=T.CUST_ID  and TD.TRANS_D_ID=T.TRANS_D_ID and TD.TRANS_D_ID = '011643719' GROUP BY TD.TRANS_D_ID";
  $result = mysqli_query($db, $query) or die (mysqli_error($db));



?>