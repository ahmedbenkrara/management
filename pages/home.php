<?php 
    session_start();
    if(isset($_SESSION['id'])){
        header('location:dashboard.php');
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nana Beauty</title>
    <link rel="stylesheet" href="../style/home.css">
    <link rel="shortcut icon" href="../images/n.png" type="image/x-icon">
</head>
<body>
    <header class="header">
        <h1>Nana</h1>
    </header>
    <img class="background" src="../images/background.jpg" alt="">
    <div class="form">
        <div class="title">
            <img src="../images/logo.png" alt="">
            <h1>Nana Beauty</h1>
        </div>
        <input type="password" name="code" id="code" placeholder="code...">
        <Button class="Go">Go</Button>
    </div>
    <script src="../jquery/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function(){
            $('.Go').click(function(){
                var password = $('#code')
                if(password.val() == ''){
                    alert('لم تدخل اي رمز سري')
                }else{
                    $.ajax({
                        url:'login.php',
                        method:'POST',
                        dataType:'JSON',
                        data:{
                            pass:password.val()
                        },success:function(res){
                            if(res == 'false'){
                                alert('كلمة سر خاطئة')
                            }else if(res == 'true'){
                                window.location = "dashboard.php";
                            }
                        }
                    })
                }
            })

            $(document).keypress(function(e){
                if(e.which == 13){
                    $('.Go').click()
                }
            })
        })
    </script>
</body>
</html>