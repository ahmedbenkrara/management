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
            <div class="dashF">
                <img src="../images/create.png" alt="" id="dash">
                <p class="Mt">إضافة المواعيد</p>
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
            <p class="title">إضافة المواعيد</p>
        </div>
        <div class="main">
            <div class="add" style="margin-top:50px; padding-bottom:20px;">
                <h1>إضافة موعد</h1>
                
                <table class="form" id="app">
                    <tr>
                        <td align="center">
                            
                            <div class="dropdown" id="drdown">
                                <p>: اسم الزبون</p>
                                <div class="dropdown-select" >
                                    <span id="clname">اختر اسم الزبون</span>
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
                                    <span id="srname">اختر اسم الخدمة</span>
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
                            
                            <div class="dropdown" id="dt">
                                <p>: التاريخ</p>
                                <input type="date" name="" id="date">
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
            })

            $('#drdown').mouseleave(function(){
                $('#target').show()
                $('#dt').show()
            })

            $('#target').hover(function(){
                $('#dt').hide()
            })

            $('#target').mouseleave(function(){
                $('#dt').show()
            })

            
            var d = new Date();
            var day = d.getDate();
            var month = d.getMonth() + 1;
            var year = d.getFullYear();
            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;
            var today = year + "-" + month + "-" + day;
           
            $('#date').val(today)

            function validateDate(e){
                var d = new Date($('#date').val())
                var t = new Date(today)
                if(d < t){
                    e.css({'border':'2px solid red','background':'white','color':'black'})
                    e.prop('title','التاريخ الذي ادخلته غير صالح')
                    return false
                }else{
                    e.css({'border':'none','background':'#f60b60','color':'white'})
                    e.prop('title','')
                    return true
                }
            }

            function valLists(e){
                if(e.text() == "اختر اسم الزبون" || e.text() == "اختر اسم الخدمة"){
                    alert('المرجو عدم ترك اي خانة فارغة')
                    return false
                }else{
                    return true
                }
            }

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


           $('.save').click(function(){
                if(valLists($('#clname')) && valLists($('#srname')) && validateDate($('#date'))){
                    $.ajax({
                        url:'setAppoi.php',
                        method:'POST',
                        dataType:'JSON',
                        data:{
                            idclient:getClient($('#clname').text()),
                            idservice:getService($('#srname').text()),
                            date:$('#date').val()
                        },success:function(res){
                            if(res == "true"){
                                alert("تمت الاضافة بنجاح")
                            }else{
                                alert("هنالك خطا ما المرجو المحاولة لاحقا")
                            }
                        }
                    })
                }
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