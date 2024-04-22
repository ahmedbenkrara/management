<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('location:home.php');
    }else{
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        include('connect.php');
        $sSQL= 'SET CHARACTER SET utf8'; 
        mysqli_query($con,$sSQL);
        $query = "SELECT C.Fname , C.Sname , A.Date_App , A.status , S.Name , S.Price FROM client C , service S , appoinment A WHERE A.idc = C.idc AND A.ids = S.ids And A.ida = $id";
        $res = mysqli_query($con,$query);
        $data = mysqli_fetch_all($res,MYSQLI_ASSOC);
        mysqli_free_result($res);
        mysqli_close($con);
    }else{
        header('location:Appoinments.php');
    }
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
    <link rel="stylesheet" href="../style/appoinment.css">
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
            <div class="dashF" onclick="window.location='Appoinments.php'">
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
            <p class="title">تعديل المواعيد</p>
        </div>
        <div class="main">
            <div class="add" style="margin-top:50px; padding-bottom:20px;">
                <h1>تعديل موعد</h1>
                
                <table class="form" id="app">
                    <tr>
                        <td align="center">
                            
                            <div class="dropdown" id="drdown">
                                <p>: اسم الزبون</p>
                                <div class="dropdown-select" >
                                    <span id="clname"><?php echo $data[0]['Fname'].' '.$data[0]['Sname']; ?></span>
                                    <img src="../images/dropdown.png" alt="">
                                </div>
                                <ul class="dropdown-list">
                                    <li class="search-box"><input type="text" placeholder="اسم الزبون" v-model="find"></li>
                                    <li class="dropdown-list__item cle" v-for="i in filter" >{{i.Fname}}</li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            
                            <div class="dropdown" id="target">
                                <p>: اسم الخدمة</p>
                                <div class="dropdown-select">
                                    <span id="srname"><?php echo $data[0]['Name']; ?></span>
                                    <img src="../images/dropdown.png" alt="">
                                </div>
                                <ul class="dropdown-list">
                                    <li class="search-box"><input type="text" placeholder="اسم الخدمة" v-model="serv"></li>
                                    <li class="dropdown-list__item ser" v-for="i in filterS" >{{i.Name}}</li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            
                        <div class="dropdown" id="state">
                                <p>: الحالة</p>
                                <div class="dropdown-select">
                                    <span id="status"><?php echo $data[0]['status']; ?></span>
                                    <img src="../images/dropdown.png" alt="">
                                </div>
                                <ul class="dropdown-list">
                                    <li class="dropdown-list__item">مدفوع</li>
                                    <li class="dropdown-list__item">غير مدفوع</li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            
                            <div class="dropdown" id="dt">
                                <p>: التاريخ</p>
                                <input type="date" name="" value="<?php echo $data[0]['Date_App']; ?>" id="dateapp">
                            </div>

                        </td>
                    </tr>
                </table>
                <div class="save">
                    تعديل
                </div>
            </div>
        </div>
    </div>
    <script src="../jquery/jquery-3.5.1.js"></script>
    <script src="../jquery/dashboard_move.js"></script>
    <script src="../vue/vue.js"></script>
    <script src="../jquery/logout.js"></script>
    <script>

        $(document).ready(function(){
            if(!window.location.hash) {
                 window.location = window.location + '#loaded';
                 window.location.reload();
            }
            
            $('.cle').click(function(){
                var selected = $(this).text()
                $('#clname').text(selected) 
            })

            $('.ser').click(function(){
                var selected = $(this).text()
                $('#srname').text(selected) 
            })

            $('#drdown').hover(function(){
                $('#target').hide()
                $('#dt').hide()
                $('#state').hide()
            })

            $('#drdown').mouseleave(function(){
                $('#target').show()
                $('#dt').show()
                $('#state').show()
            })

            $('#target').hover(function(){
                $('#dt').hide()
                $('#state').hide()
            })

            $('#target').mouseleave(function(){
                $('#dt').show()
                $('#state').show()
            })

            $('#state').hover(function(){
                $('#dt').hide()
            })

            $('#state').mouseleave(function(){
                $('#dt').show()
            })

            $('#state li').click(function(){
                $('#state span').text($(this).text())
            })

            function getClient(client){
                var get = client.split(' ')[0]
                var get1 = client.split(' ')[1]
                var array = JSON.parse(localStorage.getItem("data"))
                var id = array.filter(i => i.Fname == get && i.Sname == get1)
                return id[0]['idc']
            }

            function getService(service){
                var array = JSON.parse(localStorage.getItem("services"))
                var id = array.filter(s => s.Name == service)
                return id[0]['ids']
            }

            var ida = <?php echo $id; ?>

           $('.save').click(function(){
                    $.ajax({
                        url:'upAppoinments.php',
                        method:'POST',
                        dataType:'JSON',
                        data:{
                            id:ida,
                            idclient:getClient($('#clname').text()),
                            idservice:getService($('#srname').text()),
                            status:$('#status').text(),
                            date:$('#dateapp').val()
                        },success:function(res){
                            if(res == "true"){
                                alert("تم التعديل بنجاح")
                            }else{
                                alert("هنالك خطا ما المرجو المحاولة لاحقا")
                            }
                        }
                    })
            })

            

        })

    </script>

<!-- vue.js -->
    <script>
        var vm = new Vue({
            el:'#app',
            data:{
                find:"",
                serv:""
            },
            methodes:{
            },
            computed:{
                filter:function(){
                    $.ajax({
                        url:'getclients.php',
                        method:'POST',
                        dataType:'JSON',
                        success:function(res){
                            localStorage.setItem("data", JSON.stringify(res));
                        }
                    })

                    var array = JSON.parse(localStorage.getItem("data"))

                    array.forEach((item)=>{
                        item.Fname += " " +item.Sname 
                    })
                    
                    return array.filter(item => item.Fname.match(this.find));
                },
                filterS:function(){
                    $.ajax({
                        url:'getService.php',
                        method:'POST',
                        dataType:'JSON',
                        success:function(res){
                            localStorage.setItem("services", JSON.stringify(res));
                        }
                    })  

                    var array = JSON.parse(localStorage.getItem("services"))
                    return array.filter(item => item.Name.match(this.serv))
                }
            }
        })
    </script>
</body>
</html>