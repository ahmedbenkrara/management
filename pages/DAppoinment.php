<?php 

if(isset($_POST["ida"])){
    include('connect.php');

    $id = $_POST["ida"];
    $query = "DELETE FROM appoinment WHERE ida = $id";
    if(mysqli_query($con,$query)){
        echo json_encode('true');
    }else{
        echo json_encode('false');
    }
    mysqli_close($con);
}

?>