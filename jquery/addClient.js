$(document).ready(function(){
    var fname = $('#fname')
    var sname = $('#sname')
    var date = $('#date')
    var phone = $('#phone')
    var adress = $('#adress')
    var send = $('.save')

    var d = new Date();


    var day = d.getDate();
    var month = d.getMonth() + 1;
    var year = d.getFullYear();
    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;
    var today = year + "-" + month + "-" + day;
    

    date.val(today)

    function validateName(e){
        var target = e.parent().prev().prev()
        if(e.val() == "" || e.val().length <= 2){
            target.text('*')
            target.css({'color':'red'})
            e.attr('title','الاسم الذي ادخلتة غير صالح')
            return false
        }else{
            target.text('')
            e.attr('title','')
            return true
        }
    }

    function validatephone(e){
        var test = /^[+]?[0-9]{8,20}$/
        var target = e.parent().prev().prev()
        if(!test.test(e.val()) || phone.val() == ""){
            target.text('*')
            target.css({'color':'red'})
            e.attr('title','رقم هاتف غير صالح')
            return false
        }else{
            target.text('')
            e.attr('title','')
            return true
        }
    }

    function validateadr(e){
        var target = e.parent().prev().prev()
        if(e.val().length <= 5){
            target.text('*')
            target.css({'color':'red'})
            e.attr('title','العنوان الذي ادخلته غير صالح')
            return false
        }else{
            target.text('')
            e.attr('title','')
            return true
        }
    }

    send.click(function(){
        if(validateName(fname) && validateName(sname) && validatephone(phone) && validateadr(adress)){
            $.ajax({
                url:'sendClient.php',
                method:'POST',
                dataType:'JSON',
                data:{
                    fname:fname.val(),
                    sname:sname.val(),
                    date:today,
                    phone:phone.val(),
                    adress:adress.val()
                },success:function(response){
                    if(response == true){
                        alert('تمت الاضافة بنجاح')
                    }
                }
            })
        }
    })

})