<?php
session_start();
if(isset($_POST["pass"])){
    include('connect.php');
    $query = "SELECT * FROM admin WHERE Name_avatar = 'Naima'";
    $res = mysqli_query($con,$query);
    $data = mysqli_fetch_all($res,MYSQLI_ASSOC);
    mysqli_free_result($res);
    mysqli_close($con);
    $pass = $_POST["pass"];
    if($pass == $data[0]['Password']){
        $_SESSION['id'] = 'Naima';
        echo json_encode("true");
    }else{
        echo json_encode("false");
    }
}

?>