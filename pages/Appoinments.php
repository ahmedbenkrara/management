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
            <div class="dashF">
                <img src="../images/calendar.png" alt="" id="dash">
                <p class="Mt">تحديث المواعيد</p>
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
            <p class="title">تحديث المواعيد</p>
        </div>
        <div class="main">
            <div class="clsearch">
                <table class="form">
                    <tr>
                        <td>
                        <div class="textbox">
                        <span class="err"></span><label>الى</label>
                                <div>
                                    <input type="date" name="" id="to" >
                                </div>
                            </div>
                        </td>
                        <td>
                        <div class="textbox">
                        <span class="err"></span><label>من</label>
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
                    pdf
                </div>
            </div>
            <div class="responsive">
                <div class="select">
                    <select name="" id="num">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <div id="ref">
                        <div>
                        تحديث
                        <img src="../images/reload.png" alt="">
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>النسب</th>
                            <th>الخدمة</th>
                            <th>الثمن</th>
                            <th>التاريخ</th>
                            <th>الحالة</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>
                <div id="pagination"></div>
            </div>
        </div>
    </div>
    <script src="../jquery/jquery-3.5.1.js"></script>
    <script src="../jquery/dashboard_move.js"></script>
    <script src="../jquery/pagination.js"></script>
    <script src="../jquery/Appoinments.js"></script>
    <script src="../jquery/logout.js"></script>
</body>
</html>