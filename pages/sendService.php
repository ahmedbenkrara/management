<?php
    if(isset($_POST['name'])){
        include('connect.php');
        $name = $_POST['name'];
        $price = $_POST['price'];
        $query = "INSERT INTO service(Name,Price) VALUES(N'$name',N'$price');";
        if(mysqli_query($con,$query)){
            echo json_encode("true");
        }else{
            echo json_encode("false");
        }
        mysqli_close($con);
    }
?>