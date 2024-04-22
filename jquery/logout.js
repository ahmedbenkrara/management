$(document).ready(function(){
    $('#logout').click(function(){
        $.ajax({
            url:'logout.php',
            method:'POST',
            dataType:'JSON',
            success:function(res){
                if(res == 'done'){
                    location.href = "dashboard.php";
                }
            }
        })
    })
})