<?php

    // database connection
    include('dbconn.php');

    if(!$conn){
        echo "Something went wrong!!" .mysqli_error();
    }
    else{

        for ($x = 0; $x < 7; $x++) {

            $sql = "SELECT sum(r.totalPrice) 
                    FROM orders o INNER JOIN order_service r 
                    ON r.ordersId = o.id 
                    WHERE date(o.date) = DATE_ADD(date(curdate() - interval weekday(curdate()) day), INTERVAL $x DAY)";
            $result = mysqli_query($conn, $sql);
            $chart_data = "";
            while($row = mysqli_fetch_array($result)){
                $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
                //$day[] = $x+1;
                $sales[] = $row['sum(r.totalPrice)'];
            }
          
        }
        
    }

?>