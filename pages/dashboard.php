<?php 
    session_start();
    include('connect.php');
        if(isset($_SESSION['id'])){
                $query1 = "SELECT COUNT(*) AS 'client' FROM client";
                $res1 = mysqli_query($con,$query1);
                $data1 = mysqli_fetch_all($res1,MYSQLI_ASSOC);
                mysqli_free_result($res1);
                $y = date("Y");
                $m = date("m");
                $date = $y."-".$m.'-01';
                $m1 = $m+1;
                $date1 = $y."-".$m1.'-01';
                $query2 = "SELECT COUNT(*) AS 'app' FROM appoinment WHERE Date_App >= '$date' AND Date_App < '$date1' AND status = N'مدفوع'";
                $res2 = mysqli_query($con,$query2);
                $data2 = mysqli_fetch_all($res2,MYSQLI_ASSOC);
                mysqli_free_result($res2);
                $query3 = "SELECT SUM(Price) as 'total' FROM appoinment a ,service s WHERE a.ids = s.ids AND Date_App >= '$date' AND Date_App < '$date1' AND a.status = N'مدفوع'";
                $res3 = mysqli_query($con,$query3);
                $data3 = mysqli_fetch_all($res3,MYSQLI_ASSOC);
                mysqli_free_result($res3);
                $query4 = "SELECT SUM(Price) as 'total' FROM appoinment a ,service s WHERE a.ids = s.ids AND a.status = N'مدفوع'";
                $res4 = mysqli_query($con,$query4);
                $data4 = mysqli_fetch_all($res4,MYSQLI_ASSOC);
                mysqli_free_result($res4);
                mysqli_close($con);
        }else{
            header('location:home.php');
        }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nana Beauty</title>
    <link rel="stylesheet" href="../style/dashboard.css">

    <link rel="shortcut icon" href="../images/n.png" type="image/x-icon">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <img src="../images/n.png" alt="">
            <p class="nana">Nana Beauty</p>
        </div>
        <div class="navigate">
            <div class="dashF">
                <img src="../images/service_80px.png" alt="" id="dash">
                <p class="Mt">لوحة القيادة</p>
            </div>
            <div class="dashS" onclick="window.location='addClient.php'">
                <img src="../images/createwhite.png" alt="" id="dash">
                <p class="Mts">إضافة الزبناء</p>
            </div>
            <div class="dashS" onclick="window.location='Clients.php'">
                <img src="../images/people_30px.png" alt="" id="dash">
                <p class="Mts">تحديث الزبناء</p>
            </div>
            <div class="dashS" onclick="window.location='addService.php'">
                <img src="../images/createwhite.png" alt="" id="dash">
                <p class="Mts">إضافة الخدمات</p>
            </div>
            <div class="dashS" onclick="window.location='serviceUpdate.php'">
                <img src="../images/servicewhite.png" alt="" id="dash">
                <p class="Mts">تحديث الخدمات</p>
            </div>
            <div class="dashS" onclick="window.location='addappoinment.php'">
                <img src="../images/createwhite.png" alt="" id="dash">
                <p class="Mts">إضافة المواعيد</p>
            </div>
            <div class="dashS" onclick="window.location='Appoinments.php'">
                <img src="../images/calendarwhite.png" alt="" id="dash">
                <p class="Mts">تحديث المواعيد</p>
            </div>
            <div class="dashS" onclick="window.location='statistic.php'">
                <img src="../images/chartwhite.png" alt="" id="dash">
                <p class="Mts">احصائيات</p>
            </div>
            <div class="dashS" id="logout">
                <img src="../images/logout.png" alt="" id="dash">
                <p class="Mts">تسجيل الخروج</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header">
            <img src="../images/menu.png" class="menu" alt="">
            <p class="title">لوحة القيادة</p>
        </div>
        <div class="main">
            <div class="row">
                <div class="card">
                    <p id="plp" class="num"><?php echo $data1[0]['client']; ?></p>
                    <img src="../images/people.png" alt="" class="icon">
                </div>
                <div class="card">
                    <p id="srv" class="num"><?php echo $data2[0]['app']; ?></p>
                    <img src="../images/pass.png" alt="" class="icon">
                </div>
                <div class="card">
                    <p id="money" class="num"><?php if($data3[0]['total'] != null){echo $data3[0]['total'];}else{echo "0";} ?></p>
                    <img src="../images/money.png" alt="" class="icon">
                </div>
            </div>
            <div class="mother"> 

                <canvas id="can"></canvas>
                
            </div>
        </div>
    </div>
    <script src="../jquery/jquery-3.5.1.js"></script>
    <script src="../jquery/dashboard_move.js"></script>
    <script src="../jquery/chart.js"></script>
    <script src="../jquery/logout.js"></script>
    <script>
        var dates = []
        var number = []
        var date = new Date()
                var M = date.getMonth()+1
                var D = date.getDate()
                var Y = date.getFullYear()
                var date1 = Y+'-'+M+'-1'
                var date2 = Y+'-'+(M+1)+'-1'

        $.ajax({
            url:'charttwo.php',
            method:'POST',
            dataType:'JSON',
            data:{
                date1:date1,
                date2:date2
            },success:function(data){
                data.forEach(function(item){
                    dates.push(item.Date_inscription)
                    number.push(item.Number)
                })
                
                var chartData = {
                    labels:dates,
                    datasets:[
                    {
                        label:'... الزبناء يوم',
                        backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                         'rgba(255, 99, 132, 1)',
                         'rgba(54, 162, 235, 1)',
                         'rgba(255, 206, 86, 1)',
                         'rgba(75, 192, 192, 1)',
                         'rgba(153, 102, 255, 1)',
                         'rgba(255, 159, 64, 1)'
                        ],
                        data:number
                    }
                    ]
                    }

                    var graph = new Chart($('#can'),{
                        type:'line',
                        data:chartData
                    })

            }
        })
    </script>
</body>
</html>