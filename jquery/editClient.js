$(document).ready(function(){
    var fname = $('#fname')
    var sname = $('#sname')
    var date = $('#date')
    var phone = $('#phone')
    var adress = $('#adress')
    var send = $('.save')

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
        var test = /^[+]*[0-9]{8,20}$/
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

    var link = window.location.href.split('=');
    var id = link[1]

    send.click(function(){
        if(validateName(fname) && validateName(sname) && validatephone(phone) && validateadr(adress)){
            $.ajax({
                url:'upclient.php',
                method:'POST',
                dataType:'JSON',
                data:{
                    idc:id,
                    fname:fname.val(),
                    sname:sname.val(),
                    phone:phone.val(),
                    adress:adress.val()
                },success:function(response){
                    if(response == "true"){
                        alert('تم التعديل بنجاح')
                    }
                }
            })
        }
    })

})