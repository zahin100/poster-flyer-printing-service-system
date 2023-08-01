<?php

    // database connection
    include('dbconn.php');

    if(!$conn){
        echo "Something went wrong!!" .mysqli_error();
    }
    else{
        
        for($y = 2021; $y < 2030; $y++) {

            $sql = "SELECT YEAR(o.date), sum(r.totalPrice) 
                    FROM orders o INNER JOIN order_service r 
                    ON r.ordersId = o.id 
                    WHERE YEAR(o.date) = $y";

            $result = mysqli_query($conn, $sql);
            $chart_data = "";
            while($row = mysqli_fetch_array($result)){
                  $year[] = $row['YEAR(o.date)'];
                  $sales[] = $row['sum(r.totalPrice)'];
            }
          
        }

    }

?>