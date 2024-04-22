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
            <div class="dashF">
                <img src="../images/create.png" alt="" id="dash">
                <p class="Mt">إضافة الزبناء</p>
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
            <p class="title">إضافة الزبناء</p>
        </div>
        <div class="main">
            <div class="add">
                <h1>إضافة زبون</h1>
                
                <table class="form">
                    <tr>
                        <td>
                        <div class="textbox">
                        <span class="err"></span><label>الاسم الثاني</label>
                                <div>
                                    <input type="text" name="" id="sname">
                                </div>
                            </div>
                        </td>
                        <td>
                        <div class="textbox">
                        <span class="err"></span><label>الاسم الاول</label>
                                <div>
                                    <input type="text" name="" id="fname" >
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="textbox">
                            <span class="err"></span><label>رقم الهاتف</label>
                                <div>
                                    <input type="text" name="" id="phone">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="textbox">
                            <span class="err"></span><label>التاريخ</label>
                                <div>
                                    <input type="date" name="" id="date">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="textbox">
                            <span class="err"></span><label>العنوان</label>
                                <div>
                                    <textarea name="" id="adress" resize="false"></textarea>
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
    <script src="../jquery/addClient.js"></script>
    <script src="../jquery/logout.js"></script>
</body>
</html>