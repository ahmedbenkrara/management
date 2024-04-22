<?php
    if(isset($_POST['id'])){
        include('connect.php');

        $ida = $_POST['id'];
        $idc = $_POST["idclient"];
        $ids = $_POST["idservice"];
        $status = $_POST["status"];
        $date = $_POST["date"];

        $query = "UPDATE appoinment SET idc = N'$idc',ids = N'$ids',status = N'$status',Date_App = N'$date' WHERE ida = $ida";
        if(mysqli_query($con,$query)){
            echo json_encode("true");
        }else{
            echo json_encode("false");
        }
    }
?>