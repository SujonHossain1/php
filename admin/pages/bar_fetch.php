<?php

//fetch.php

include('bar_database_connection.php');

/*SUB_CatagoryWise*/
$year = $_POST['year'];
$catagory = $_POST['catagory'];
$subcatagory = $_POST['subcatagory'];
if(!empty($year) && empty($catagory) && empty($subcatagory))
{
  $query = "SELECT monthname.month_name as month ,sum(orders_info.product_total) as sells FROM orders_info,monthname  WHERE monthname.month_id=month(date) and month(date) = 1 and year(date)='{$year}'
UNION
SELECT monthname.month_name as month ,sum(orders_info.product_total) as sells FROM orders_info,monthname  WHERE monthname.month_id=month(date) and month(date) = 2 and year(date)='{$year}'
UNION
SELECT monthname.month_name as month ,sum(orders_info.product_total) as sells FROM orders_info,monthname  WHERE monthname.month_id=month(date) and month(date) = 3 and year(date)='{$year}'
UNION
SELECT monthname.month_name as month ,sum(orders_info.product_total) as sells FROM orders_info,monthname  WHERE monthname.month_id=month(date) and month(date) = 4 and year(date)='{$year}'
UNION
SELECT monthname.month_name as month ,sum(orders_info.product_total) as sells FROM orders_info,monthname  WHERE monthname.month_id=month(date) and month(date) = 5 and year(date)='{$year}'
UNION
SELECT monthname.month_name as month ,sum(orders_info.product_total) as sells FROM orders_info,monthname  WHERE monthname.month_id=month(date) and month(date) = 6 and year(date)='{$year}'
UNION
SELECT monthname.month_name as month ,sum(orders_info.product_total) as sells FROM orders_info,monthname  WHERE monthname.month_id=month(date) and month(date) = 7 and year(date)='{$year}'
UNION
SELECT monthname.month_name as month ,sum(orders_info.product_total) as sells FROM orders_info,monthname  WHERE monthname.month_id=month(date) and month(date) = 8 and year(date)='{$year}'
UNION
SELECT monthname.month_name as month ,sum(orders_info.product_total) as sells FROM orders_info,monthname  WHERE monthname.month_id=month(date) and month(date) = 9 and year(date)='{$year}'
UNION
SELECT monthname.month_name as month ,sum(orders_info.product_total) as sells FROM orders_info,monthname  WHERE monthname.month_id=month(date) and month(date) = 10 and year(date)='{$year}'
UNION
SELECT monthname.month_name as month ,sum(orders_info.product_total) as sells FROM orders_info,monthname  WHERE monthname.month_id=month(date) and month(date) = 11 and year(date)='{$year}'
UNION
SELECT monthname.month_name as month ,sum(orders_info.product_total) as sells FROM orders_info,monthname  WHERE monthname.month_id=month(date) and month(date) = 12 and year(date)='{$year}'";

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'month'   => $row["month"],
   'sells'  => floatval($row["sells"]),
   'profit'  => floatval(0)
  );
 }
 echo json_encode($output);

}


/*else if(!empty($year) && !empty($catagory) && !empty($subcatagory))
{
  $query = "SELECT monthname.month_name as month ,sum((transaction_details.PRICE*transaction_details.QTY) - (product.NETPRICE*transaction_details.QTY)) as profit, sum((transaction_details.PRICE*transaction_details.QTY)) as sells FROM monthname,transaction_details,product,transaction  WHERE monthname.month_id=month(transaction.DATE) and transaction_details.PRODUCTS = product.NAME and transaction_details.sub_cat_id = product.SUB_CATEGORY_ID and transaction_details.TRANS_D_ID=transaction.TRANS_D_ID and month(transaction.DATE) = 1 and year(transaction.DATE)= '{$year}' and transaction_details.sub_cat_id='{$subcatagory}'
UNION
SELECT monthname.month_name as month ,sum((transaction_details.PRICE*transaction_details.QTY) - (product.NETPRICE*transaction_details.QTY)) as profit, sum((transaction_details.PRICE*transaction_details.QTY)) as sells FROM monthname,transaction_details,product,transaction  WHERE monthname.month_id=month(transaction.DATE) and transaction_details.PRODUCTS = product.NAME and transaction_details.sub_cat_id = product.SUB_CATEGORY_ID and transaction_details.TRANS_D_ID=transaction.TRANS_D_ID and month(transaction.DATE) = 2 and year(transaction.DATE)= '{$year}' and transaction_details.sub_cat_id='{$subcatagory}'
UNION
SELECT monthname.month_name as month ,sum((transaction_details.PRICE*transaction_details.QTY) - (product.NETPRICE*transaction_details.QTY)) as profit, sum((transaction_details.PRICE*transaction_details.QTY)) as sells FROM monthname,transaction_details,product,transaction  WHERE monthname.month_id=month(transaction.DATE) and transaction_details.PRODUCTS = product.NAME and transaction_details.sub_cat_id = product.SUB_CATEGORY_ID and transaction_details.TRANS_D_ID=transaction.TRANS_D_ID and month(transaction.DATE) = 3 and year(transaction.DATE)= '{$year}' and transaction_details.sub_cat_id='{$subcatagory}'
UNION
SELECT monthname.month_name as month ,sum((transaction_details.PRICE*transaction_details.QTY) - (product.NETPRICE*transaction_details.QTY)) as profit, sum((transaction_details.PRICE*transaction_details.QTY)) as sells FROM monthname,transaction_details,product,transaction  WHERE monthname.month_id=month(transaction.DATE) and transaction_details.PRODUCTS = product.NAME and transaction_details.sub_cat_id = product.SUB_CATEGORY_ID and transaction_details.TRANS_D_ID=transaction.TRANS_D_ID and month(transaction.DATE) = 4 and year(transaction.DATE)= '{$year}' and transaction_details.sub_cat_id='{$subcatagory}'
UNION
SELECT monthname.month_name as month ,sum((transaction_details.PRICE*transaction_details.QTY) - (product.NETPRICE*transaction_details.QTY)) as profit, sum((transaction_details.PRICE*transaction_details.QTY)) as sells FROM monthname,transaction_details,product,transaction  WHERE monthname.month_id=month(transaction.DATE) and transaction_details.PRODUCTS = product.NAME and transaction_details.sub_cat_id = product.SUB_CATEGORY_ID and transaction_details.TRANS_D_ID=transaction.TRANS_D_ID and month(transaction.DATE) = 5 and year(transaction.DATE)= '{$year}' and transaction_details.sub_cat_id='{$subcatagory}'
UNION
SELECT monthname.month_name as month ,sum((transaction_details.PRICE*transaction_details.QTY) - (product.NETPRICE*transaction_details.QTY)) as profit, sum((transaction_details.PRICE*transaction_details.QTY)) as sells FROM monthname,transaction_details,product,transaction  WHERE monthname.month_id=month(transaction.DATE) and transaction_details.PRODUCTS = product.NAME and transaction_details.sub_cat_id = product.SUB_CATEGORY_ID and transaction_details.TRANS_D_ID=transaction.TRANS_D_ID and month(transaction.DATE) = 6 and year(transaction.DATE)= '{$year}' and transaction_details.sub_cat_id='{$subcatagory}'
UNION
SELECT monthname.month_name as month ,sum((transaction_details.PRICE*transaction_details.QTY) - (product.NETPRICE*transaction_details.QTY)) as profit, sum((transaction_details.PRICE*transaction_details.QTY)) as sells FROM monthname,transaction_details,product,transaction  WHERE monthname.month_id=month(transaction.DATE) and transaction_details.PRODUCTS = product.NAME and transaction_details.sub_cat_id = product.SUB_CATEGORY_ID and transaction_details.TRANS_D_ID=transaction.TRANS_D_ID and month(transaction.DATE) = 7 and year(transaction.DATE)= '{$year}' and transaction_details.sub_cat_id='{$subcatagory}'
UNION
SELECT monthname.month_name as month ,sum((transaction_details.PRICE*transaction_details.QTY) - (product.NETPRICE*transaction_details.QTY)) as profit, sum((transaction_details.PRICE*transaction_details.QTY)) as sells FROM monthname,transaction_details,product,transaction  WHERE monthname.month_id=month(transaction.DATE) and transaction_details.PRODUCTS = product.NAME and transaction_details.sub_cat_id = product.SUB_CATEGORY_ID and transaction_details.TRANS_D_ID=transaction.TRANS_D_ID and month(transaction.DATE) = 8 and year(transaction.DATE)= '{$year}' and transaction_details.sub_cat_id='{$subcatagory}'
UNION
SELECT monthname.month_name as month ,sum((transaction_details.PRICE*transaction_details.QTY) - (product.NETPRICE*transaction_details.QTY)) as profit, sum((transaction_details.PRICE*transaction_details.QTY)) as sells FROM monthname,transaction_details,product,transaction  WHERE monthname.month_id=month(transaction.DATE) and transaction_details.PRODUCTS = product.NAME and transaction_details.sub_cat_id = product.SUB_CATEGORY_ID and transaction_details.TRANS_D_ID=transaction.TRANS_D_ID and month(transaction.DATE) = 9 and year(transaction.DATE)= '{$year}' and transaction_details.sub_cat_id='{$subcatagory}'
UNION
SELECT monthname.month_name as month ,sum((transaction_details.PRICE*transaction_details.QTY) - (product.NETPRICE*transaction_details.QTY)) as profit, sum((transaction_details.PRICE*transaction_details.QTY)) as sells FROM monthname,transaction_details,product,transaction  WHERE monthname.month_id=month(transaction.DATE) and transaction_details.PRODUCTS = product.NAME and transaction_details.sub_cat_id = product.SUB_CATEGORY_ID and transaction_details.TRANS_D_ID=transaction.TRANS_D_ID and month(transaction.DATE) = 10 and year(transaction.DATE)= '{$year}' and transaction_details.sub_cat_id='{$subcatagory}'
UNION
SELECT monthname.month_name as month ,sum((transaction_details.PRICE*transaction_details.QTY) - (product.NETPRICE*transaction_details.QTY)) as profit, sum((transaction_details.PRICE*transaction_details.QTY)) as sells FROM monthname,transaction_details,product,transaction  WHERE monthname.month_id=month(transaction.DATE) and transaction_details.PRODUCTS = product.NAME and transaction_details.sub_cat_id = product.SUB_CATEGORY_ID and transaction_details.TRANS_D_ID=transaction.TRANS_D_ID and month(transaction.DATE) = 11 and year(transaction.DATE)= '{$year}' and transaction_details.sub_cat_id='{$subcatagory}'
UNION
SELECT monthname.month_name as month ,sum((transaction_details.PRICE*transaction_details.QTY) - (product.NETPRICE*transaction_details.QTY)) as profit, sum((transaction_details.PRICE*transaction_details.QTY)) as sells FROM monthname,transaction_details,product,transaction  WHERE monthname.month_id=month(transaction.DATE) and transaction_details.PRODUCTS = product.NAME and transaction_details.sub_cat_id = product.SUB_CATEGORY_ID and transaction_details.TRANS_D_ID=transaction.TRANS_D_ID and month(transaction.DATE) = 12 and year(transaction.DATE)= '{$year}' and transaction_details.sub_cat_id='{$subcatagory}'";

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'month'   => $row["month"],
   'sells'  => floatval($row["sells"]),
   'profit'  => floatval(0)
  );
 }
 echo json_encode($output);
}*/

else if(!empty($year) && empty($catagory) && !empty($subcatagory))
{
  $query = "SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='1' and order_products.product_id=products.product_id and products.product_sub_cat='{$subcatagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='2' and order_products.product_id=products.product_id and products.product_sub_cat='{$subcatagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='3' and order_products.product_id=products.product_id and products.product_sub_cat='{$subcatagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='4' and order_products.product_id=products.product_id and products.product_sub_cat='{$subcatagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='5' and order_products.product_id=products.product_id and products.product_sub_cat='{$subcatagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='6' and order_products.product_id=products.product_id and products.product_sub_cat='{$subcatagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='7' and order_products.product_id=products.product_id and products.product_sub_cat='{$subcatagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='8' and order_products.product_id=products.product_id and products.product_sub_cat='{$subcatagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='9' and order_products.product_id=products.product_id and products.product_sub_cat='{$subcatagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='10' and order_products.product_id=products.product_id and products.product_sub_cat='{$subcatagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='11' and order_products.product_id=products.product_id and products.product_sub_cat='{$subcatagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='12' and order_products.product_id=products.product_id and products.product_sub_cat='{$subcatagory}' and YEAR(date_)= '{$year}'";

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'month'   => $row["month"],
   'sells'  => floatval($row["sells"]),
   'profit'  => floatval(0)
  );
 }
 echo json_encode($output);
}


else if(!empty($year) && !empty($catagory) && empty($subcatagory)){

  $query = "SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='1' and order_products.product_id=products.product_id and products.product_cat='{$catagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='2' and order_products.product_id=products.product_id and products.product_cat='{$catagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='3' and order_products.product_id=products.product_id and products.product_cat='{$catagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='4' and order_products.product_id=products.product_id and products.product_cat='{$catagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='5' and order_products.product_id=products.product_id and products.product_cat='{$catagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='6' and order_products.product_id=products.product_id and products.product_cat='{$catagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='7' and order_products.product_id=products.product_id and products.product_cat='{$catagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='8' and order_products.product_id=products.product_id and products.product_cat='{$catagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='9' and order_products.product_id=products.product_id and products.product_cat='{$catagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='10' and order_products.product_id=products.product_id and products.product_cat='{$catagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='11' and order_products.product_id=products.product_id and products.product_cat='{$catagory}' and YEAR(date_)= '{$year}'
UNION
SELECT monthname.month_name as month,sum(order_products.amt) as sells from order_products,products,monthname WHERE monthname.month_id = month(date_) and monthname.month_id='12' and order_products.product_id=products.product_id and products.product_cat='{$catagory}' and YEAR(date_)= '{$year}'";

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'month'   => $row["month"],
   'sells'  => floatval($row["sells"]),
   'profit'  => floatval(0)
  );
 }
 echo json_encode($output);

}

?>