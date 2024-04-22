<?php

    if(isset($_POST["idclient"])){
        include('connect.php');

        $idc = $_POST["idclient"];
        $ids = $_POST["idservice"];
        $date = $_POST["date"];

        $query = "INSERT INTO appoinment(idc,ids,status,Date_App) VALUES (N'$idc',N'$ids',N'غير مدفوع',N'$date')";
        if(mysqli_query($con,$query)){
            echo json_encode("true");
        }else{
            echo json_encode("false");
        }

    }

?>