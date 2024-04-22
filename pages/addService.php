<?php 
    session_start();
    if(!isset($_SESSION['id'])){
        header('location:home.php');
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="UTF-8">
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
            <div class="dashS" onclick="window.location='dashboard.php'">
                <img src="../images/ser.png" alt="" id="dash">
                <p class="MtS">لوحة القيادة</p>
            </div>
            <div class="dashS" onclick="window.location='addClient.php'">
                <img src="../images/createwhite.png" alt="" id="dash">
                <p class="Mts">إضافة الزبناء</p>
            </div>
            <div class="dashS" onclick="window.location='Clients.php'">
                <img src="../images/people_30px.png" alt="" id="dash">
                <p class="Mts">تحديث الزبناء</p>
            </div>
            <div class="dashF">
                <img src="../images/create.png" alt="" id="dash">
                <p class="Mt">إضافة الخدمات</p>
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
            <p class="title">إضافة الخدمات</p>
        </div>
        <div class="main">
            <div class="add" style="margin-top:100px; padding-bottom:20px;">
                <h1>إضافة خدمة</h1>
                
                <table class="form">
                    <tr>
                        <td colspan='2'  align="center">
                        <div class="textbox" style="width:90%;">
                        <span class="err"></span><label> :اسم الخدمة</label>
                                <div>
                                    <input type="text" name="" id="name">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' align="center">
                            <div class="textbox" style="width:90%;">
                            <span class="err"></span><label>:ثمن الخدمة</label>
                                <div>
                                    <input type="number" name="" id="price">
                                </div>
                            </div>
                        </td>
                    </tr>
                
                </table>
                <div class="save">
                    تسجيل
                </div>
            </div>
        </div>
    </div>
    <script src="../jquery/jquery-3.5.1.js"></script>
    <script src="../jquery/dashboard_move.js"></script>
    <script src="../jquery/addserv.js"></script>
    <script src="../jquery/logout.js"></script>
</body>
</html>