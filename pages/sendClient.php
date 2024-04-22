<?php 
if(isset($_POST["fname"])){
    include('connect.php');

    $fname = $_POST["fname"];
    $sname = $_POST["sname"];
    $date = $_POST["date"];
    $phone = $_POST["phone"];
    $adress = $_POST["adress"];
    $query = "INSERT INTO Client(Fname,Sname,Phone,Adress,Date_inscription) VALUES(N'$fname',N'$sname',N'$phone',N'$adress',N'$date')";
    $res = mysqli_query($con,$query);
    echo json_encode($res);
    mysqli_close($con);
}

?>