<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 

                $query = 'SELECT * from admin_info WHERE admin_id = '.$_SESSION['MEMBER_ID'];
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
if ($Aa=='User'){
           
             ?>    <!-- <<script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "pos.php";
                  </script> -->
             <?php   }
                         
           
}   
            ?>  


<?php  

//index.php

include("bar_database_connection.php");

$query = "SELECT year(date) as year FROM orders_info GROUP BY year(date) DESC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

/*Catagory*/
$query = "SELECT * FROM categories";

$statement = $connect->prepare($query);

$statement->execute();

$catagory_result = $statement->fetchAll();
/*Catagory*/

/*SubCatagory*/
$query = "SELECT * FROM sub_category";

$statement = $connect->prepare($query);

$statement->execute();

$subcatagory_result = $statement->fetchAll();
/*SubCatagory*/

?>  

<!DOCTYPE html>  
<html>  
    <head>  
        <title></title>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
    </head>  
    <body> 
        <br /><br />
        <div class="container">  
            <h2 align="center">Sells Chart</h2>  
            <br />  
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-9">
                            <h4 class="panel-title">Month Wise Sells Data</h4>
                        </div>
                        <!--Year-->
                        <div class="col-md-3">
                            <select name="year" class="form-control" id="year">
                                <option value="">Select Year</option>
                            <?php
                            foreach($result as $row)
                            {
                                echo '<option value="'.$row["year"].'">'.$row["year"].'</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <!--Catagory-->
                        <div class="col-md-3">
                            <select name="catagory" class="form-control" id="catagory">
                                <option value="">Select Catagory</option>
                            <?php
                            foreach($catagory_result as $crow)
                            {
                                echo '<option value="'.$crow["cat_id"].'">'.$crow["cat_title"].'</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <!--Catagory-->
                        <!--Sub Catagory-->
                        <div class="col-md-3">
                            <select name="subcatagory" class="form-control" id="subcatagory">
                                <option value="">Select Sub Catagory</option>
                            <?php
                            foreach($subcatagory_result as $srow)
                            {
                                echo '<option value="'.$srow["sub_cat_id"].'">'.$srow["sub_cat_name"].'</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <!--Sub Catagory-->
                    </div>
                </div>
                <div class="panel-body">
                    <div id="chart_area" style="width: 1000px; height: 620px;"></div>
                </div>
            </div>
        </div>  
    </body>  
</html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback();

function load_monthwise_data(year,catagory,subcatagory, title)
{
    var temp_title = title + ' '+year+' ';
    $.ajax({
        url:"bar_fetch.php",
        method:"POST",
        data:{year:year,
              subcatagory:subcatagory,
              catagory:catagory

        },
        dataType:"JSON",
        success:function(data)
        {
            drawMonthwiseChart(data, temp_title);
        }
    });
}

function load_catagorywise_data(cat, title)
{
    var temp_title = title + ' '+cat+'';
    $.ajax({
        url:"bar_fetch.php",
        method:"POST",
        data:{cat:cat},
        dataType:"JSON",
        success:function(data)
        {
            drawMonthwiseChart(data, temp_title);
        }
    });
}

function load_subcatagorywise_data(sub, title)
{
    var temp_title = title + ' '+sub+'';
    $.ajax({
        url:"bar_fetch.php",
        method:"POST",
        data:{sub:sub},
        dataType:"JSON",
        success:function(data)
        {
            drawMonthwiseChart(data, temp_title);
        }
    });
}

function drawMonthwiseChart(chart_data, chart_main_title)
{
    var jsonData = chart_data;
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Month');
    data.addColumn('number', 'Sells');
    data.addColumn('number', 'Profit');
    $.each(jsonData, function(i, jsonData){
        var month = jsonData.month;
        var sells = parseFloat($.trim(jsonData.sells));
        var profit = parseFloat($.trim(jsonData.profit));
        data.addRows([[month,sells,profit]]);
    });
    var options = {
        title:chart_main_title,
        hAxis: {
            title: "Months"
        },
        vAxis: {
            title: 'Profit & Sells'
        }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_area'));
    chart.draw(data, options);
}

</script>

<script>
    
$(document).ready(function(){

    $('#year').change(function(){
        var year = $(this).val();
        var catagory=$('#catagory').val();
        var subcatagory=$('#subcatagory').val();
        if(year != '' )
        {
            load_monthwise_data(year,catagory,subcatagory, 'Month Wise Profit Data For');
        }
    });
   /* $('#catagory').change(function(){
        var catagory = $(this).val();
        if(catagory != '' )
        {
            load_catagorywise_data(catagory, 'Month Wise Profit Data For');
        }
    });
    $('#subcatagory').change(function(){
        var subcatagory = $(this).val();
        if(subcatagory != '' )
        {
            load_subcatagorywise_data(subcatagory, 'Month Wise Profit Data For');
        }
    });*/

});

</script>

<?php
include'../includes/footer.php';
?>

