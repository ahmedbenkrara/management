<?php 
    include('connect.php');
    $sSQL= 'SET CHARACTER SET utf8'; 
    mysqli_query($con,$sSQL);
    $query = "SELECT * FROM service;";
    $res = mysqli_query($con,$query);
    $data = mysqli_fetch_all($res,MYSQLI_ASSOC);
    mysqli_close($con);
    echo json_encode($data);
?>