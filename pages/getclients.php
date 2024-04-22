<?php 
    include('connect.php');
    $sSQL= 'SET CHARACTER SET utf8'; 
    mysqli_query($con,$sSQL);
    $query = "SELECT * FROM client ORDER BY Date_inscription DESC";
    $fetch = mysqli_query($con,$query);
    $data = mysqli_fetch_all($fetch,MYSQLI_ASSOC);
    mysqli_free_result($fetch);
    mysqli_close($con);
    echo json_encode($data);
?>