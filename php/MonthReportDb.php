<?php

    // database connection
    include('dbconn.php');

    if(!$conn){
        echo "Something went wrong!!" .mysqli_error();
    }
    else{

        for($m = 1; $m < 13; $m++) {

            $sql = "SELECT MONTH(o.date), sum(r.totalPrice) 
                    FROM orders o INNER JOIN order_service r 
                    ON r.ordersId = o.id 
                    WHERE MONTH(o.date) = $m";

            $result = mysqli_query($conn, $sql);
            $chart_data = "";
            while($row = mysqli_fetch_array($result)){
                  $month[] = $row['MONTH(o.date)'];
                  $sales[] = $row['sum(r.totalPrice)'];
            }
          
        }
        
    }

?>