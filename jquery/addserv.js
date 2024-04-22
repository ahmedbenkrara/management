$(document).ready(function(){
    var name = $('#name')
    var price = $('#price')
    var send = $('.save')

    function valName(e){
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

    function valPrice(e){
        var target = e.parent().prev().prev()
        var test = /^[0-9]+([.][0-9]+)?$/
        if(!test.test(e.val())){
            target.text('*')
            target.css({'color':'red'})
            e.attr('title','الرقم الذي ادخلته غير صحيح')
            return false
        }else{
            target.text('')
            e.attr('title','')
            return true
        }
    }

    send.click(function(){
        if(valName(name) && (valPrice(price))){
            $.ajax({
                url:'sendService.php',
                method:'POST',
                dataType:'JSON',
                data:{
                    name:name.val(),
                    price:price.val()
                },success:function(response){
                    if(response == "true"){
                        alert('تمت الاضافة بنجاح')
                    }
                }
            })
        }
    })

})