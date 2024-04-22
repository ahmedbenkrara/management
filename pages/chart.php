<?php 
    if(isset($_POST["date1"])){
        $date1 = $_POST["date1"];
        $date2 = $_POST["date2"];

        include('connect.php');
        $query = "SELECT SUM(Price) AS 'Money',Date_App FROM appoinment a, service s WHERE a.ids = s.ids AND Date_App >= '$date1' AND Date_App < '$date2' AND status = N'مدفوع'   GROUP BY Date_App ORDER By Date_App ASC";
        $fetch = mysqli_query($con,$query);
        $data = mysqli_fetch_all($fetch,MYSQLI_ASSOC);
        mysqli_free_result($fetch);
        mysqli_close($con);
        echo json_encode($data);
    }
?>
