<?php

    if(isset($_POST["id"])){
        include('connect.php');
        $id = $_POST["id"];
        $price = $_POST["price"];

        $query = "UPDATE service SET Price = N'$price' WHERE ids = $id";
        if(mysqli_query($con,$query)){
            echo json_encode("true");
        }else{
            echo json_encode("false");
        }
        
    }

?>