<?php

require_once __DIR__.'/vandor/autoload.php';

include('connect.php');
if(isset($_GET["date"])){
    $sSQL= 'SET CHARACTER SET utf8'; 
    mysqli_query($con,$sSQL);
    $date = $_GET["date"];
    $query = "SELECT C.Fname , C.Sname , A.Date_App , A.ida , A.status , S.Name , S.Price FROM client C , service S , appoinment A WHERE A.idc = C.idc AND A.ids = S.ids AND A.Date_App = '$date' ";
    $res = mysqli_query($con,$query);
    $data = mysqli_fetch_all($res,MYSQLI_ASSOC);

    $title = "<h2 align='right'>$date : المواعيد يوم</h2>";
}else if(isset($_GET["date1"])){
    $sSQL= 'SET CHARACTER SET utf8'; 
    mysqli_query($con,$sSQL);
    $date1 = $_GET["date1"];
    $date2 = $_GET["date2"];
    $query = "SELECT C.Fname , C.Sname , A.Date_App , A.ida , A.status , S.Name , S.Price FROM client C , service S , appoinment A WHERE A.idc = C.idc AND A.ids = S.ids AND A.Date_App BETWEEN '$date1' AND '$date2' ORDER BY A.Date_App DESC ";
    $res = mysqli_query($con,$query);
    $data = mysqli_fetch_all($res,MYSQLI_ASSOC);

    $title = "<h2 align='right'>المواعيد ما بين $date1 و $date2</h2>";
}

$mpdf = new \Mpdf\Mpdf(['mode'=>'utf-8']);
$mpdf->autoScriptToLang = true;
$mpdf->autoLangToFont = true;

$stylesheet = file_get_contents('../style/Clients.css');
$style = file_get_contents('../style/dashboard.css');
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);


$html = "
<img src='../images/n.png' width='50'/> <span style='font-size:20px; font-weight:bold;'>Nana Beauty</span><br><br>
<span>$title</span>
<br><br>
<table class='table'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>النسب</th>
                            <th>الخدمة</th>
                            <th>الثمن</th>
                            <th>التاريخ</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody id='tbody'>
                    
";

for($i=0;$i<count($data);$i++){
    $html .="
         <tr>
            <td>".($i+1)."</td>
            <td>".$data[$i]['Fname']."</td>
            <td>".$data[$i]['Sname']."</td>
            <td>".$data[$i]['Name']."</td>
            <td>".$data[$i]['Price']."</td>
            <td>".$data[$i]['Date_App']."</td>
            <td>".$data[$i]['status']."</td>
         </tr>
    ";
}

$html .= "
       </tbody>
       </table>
";

$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output("Nana beauty.pdf","I");

mysqli_free_result($res);
mysqli_close($con);
?>