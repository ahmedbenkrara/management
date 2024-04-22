<?php 
    session_start();
    if(!isset($_SESSION['id'])){
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
    <link rel="stylesheet" href="../style/Clients.css">
    <link rel="shortcut icon" href="../images/n.png" type="image/x-icon">
    <style>
        #mychart{
            width:90%;
            height:700px;
            margin-left:auto;
            margin-right:auto;
            margin-top:30px;
            background:white;
            display:block;
            padding:20px;
            border-radius:20px;
        }
    </style>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <img src="../images/n.png" alt="">
            <p class="nana">Nana Beauty</p>
        </div>
        <div class="navigate">
            <div class="dashS" onclick="window.location='dashboard.php'">
                <img src="../images/ser.png" alt="" id="dash">
                <p class="Mts">لوحة القيادة</p>
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
            <div class="dashF">
                <img src="../images/chart.png" alt="" id="dash">
                <p class="Mt">احصائيات</p>
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
            <p class="title">احصائيات</p>
        </div>
        <div class="main">
           <div class="clsearch" style="width:60%;">
                <table class="form">
                    <tr>
                        <td>
                        <div class="textbox">
                        <span class="err"></span><label>: اختر بداية الشهر</label>
                                <div>
                                    <input type="date" name="" id="from" >
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="save">
                    بحث
                </div>
                <div class="pdf" style="margin-top:20px;">
                    تحميل
                </div>
            </div>

            <canvas id="myChart"></canvas>
        </div>
    </div>
    <script src="../jquery/jquery-3.5.1.js"></script>
    <script src="../jquery/dashboard_move.js"></script>
    <script src="../jquery/chart.js"></script>
    <script src="../jquery/logout.js"></script>
    <script>
        $(document).ready(function(){
            var update = false
            $('.save').click(function(){
                
                var date = new Date($('#from').val())
                var M = date.getMonth()+1
                var D = date.getDate()
                var Y = date.getFullYear()
                var date1 = Y+'-'+M+'-'+D
                var date2 = Y+'-'+(M+1)+'-'+1
                
            //start click
            $.ajax({
                url:'chart.php',
                method:'POST',
                dataType:'JSON',
                async: true,
                data:{
                    date1:date1,
                    date2:date2
                },
                success:function(data){
                    $('#myChart').remove()
                    $('.main').append('<canvas id="myChart"></canvas>')
                    var dates = []
                    var money = []
                    data.forEach(function(item){
                        dates.push(item.Date_App)
                        money.push(item.Money)
                    })
                    var chartData = {
                    labels:dates,
                    datasets:[
                    {
                        label:'المدخول اليومي',
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
                        data:money
                    }
                    ]
                    }

                    graph = new Chart($('#myChart'),{
                        type:'bar',
                        data:chartData
                    })
                    
                }
            })
            
            //end click
            })

            $(document).keydown(function(e){
                if(e.which == 13){
                    $('.save').click()
                }
            })

            $('.pdf').click(function(){
                var image = ($('#myChart')[0]).toDataURL("image/png");
                const a = document.createElement('a')
                document.body.appendChild(a)
                a.href = ($('#myChart')[0]).toDataURL("image/png",0.1)
                a.download = "chart.png"
                a.click()
                document.body.removeChild(a)
            })

        })
    </script>
</body>
</html>