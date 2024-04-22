<?php
    include('connect.php');
    $sSQL= 'SET CHARACTER SET utf8'; 
    mysqli_query($con,$sSQL);
    $query = "SELECT C.Fname , C.Sname , A.Date_App , A.ida , A.status , S.Name , S.Price FROM client C , service S , appoinment A WHERE A.idc = C.idc AND A.ids = S.ids ORDER BY A.Date_App DESC";
    $res = mysqli_query($con,$query);
    $data = mysqli_fetch_all($res,MYSQLI_ASSOC);
    mysqli_free_result($res);
    mysqli_close($con);
    echo json_encode($data);
?>