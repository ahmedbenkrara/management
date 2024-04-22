$(document).ready(function(){
    var names = $('#names')
    var price = $('#price')
    var update = $('#update')
    var del = $('#delete')

    names.change(function(){
        var id = names.val()

        $.ajax({
            url:'price.php',
            method:'POST',
            dataType:'JSON',
            data:{
                id:id
            },success:function(response){
                if(response == false){
                    alert("تمت خطا ما المرجو المحاولة لاحقا")
                }else{
                    price.val(parseFloat(response.toString()))
                }
            }
        })

    })

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

    update.click(function(){
        var id = names.val()
        if(id == null){
            alert('لم بتم اختبار ايت خدمة بعد')
        }else{
            if(valPrice(price)){
                $.ajax({
                    url:'upPrice.php',
                    method:'POST',
                    dataType:'JSON',
                    data:{
                        id:id,
                        price:price.val()
                    },success:function(response){
                        if(response == "true"){
                            alert('تم التعديل بنجاح')
                        }else{
                            alert("تمت خطا ما المرجو المحاولة لاحقا")
                        }
                    }
                })
            }
        }
    })

    del.click(function(){
        var id = names.val()
        if(id == null){
            alert('لم بتم اختبار ايت خدمة بعد')
        }else{
            var answer = confirm('هل انت متاكد من حذف هذه الخدمة ?')
            if(answer){
                $.ajax({
                    url:'removes.php',
                    method:'POST',
                    dataType:'JSON',
                    data:{
                        id:id
                    },success:function(response){
                        if(response == "true"){
                            alert('تم الحذف بنجاح')
                            location.reload()
                        }else{
                            alert("تمت خطا ما المرجو المحاولة لاحقا")
                        }
                    }
                })
            }
        }
    })

})