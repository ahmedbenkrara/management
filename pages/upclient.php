<?php
if(isset($_POST["fname"])){
    $id = $_POST["idc"];
    $fname = $_POST["fname"];
    $sname = $_POST["sname"];
    $phone = $_POST["phone"];
    $adress = $_POST["adress"];
    include('connect.php');
    $query = "UPDATE Client SET Fname = N'$fname' , Sname = N'$sname' , Phone = N'$phone' , Adress = N'$adress' WHERE idc = $id";
    if(mysqli_query($con,$query)){
        echo json_encode("true");
    }else{
        echo json_encode("false");
    }
}
?>