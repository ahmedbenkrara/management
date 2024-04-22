<?php
       include('connect.php');
       if(isset($_POST["date1"])){
        $date1 = $_POST["date1"];
        $date2 = $_POST["date2"];
        $query5 = "SELECT COUNT(*) AS Number, Date_inscription FROM client WHERE Date_inscription >= '$date1' AND Date_inscription < '$date2'  GROUP BY Date_inscription ORDER BY Date_inscription ASC";
        $res5 = mysqli_query($con,$query5);
        $data5 = mysqli_fetch_all($res5,MYSQLI_ASSOC);
        mysqli_free_result($res5);
        echo json_encode($data5);
       }
       mysqli_close($con);
?>