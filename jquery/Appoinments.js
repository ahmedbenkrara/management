$(document).ready(function(){
    if(location.search.indexOf('r') < 0){
        var hash = window.location.hash;
        var loc = window.location.href.replace(hash, '');
        loc += (loc.indexOf('?') < 0? '?' : '&') + 'r';
        setTimeout(function(){window.location.href = loc + hash;}, 100);
    }
    
    $.ajax({
        url:'getAppoinments.php',
        method:'POST',
        dataType:'JSON',
        success:function(data){
            localStorage.setItem("appoinments",JSON.stringify(data))
        }
    })

    var data = JSON.parse(localStorage.getItem("appoinments"))
    var page = false
    var Ndata = [];
    let container = $('#pagination')
    function fill(source){
        var a = ``

        source.forEach(function(i,index){
            a += `
                <tr>
                    <td>${(index+1)}</td>
                    <td>${i.Fname}</td>
                    <td>${i.Sname}</td>
                    <td>${i.Name}</td>
                    <td>${i.Price}</td>
                    <td>${i.Date_App}</td>
                    <td>${i.status}</td>
                    <td><a id="${i.ida}" class="delete">حذف</a> <a href="EditAppoinments.php?id=${i.ida}" class="edit">تعديل</a></td>
                </tr>
            `
        })

        $('#tbody').html(a)
    }

    function paginate(e){
        container.pagination({
            dataSource: e,
            pageSize: parseInt($('#num').val()),
            autoHidePrevious: true,
            autoHideNext: true
            ,callback: function (dt, pagination) {
                fill(dt)
            }
        })
    }

    paginate(data)

    $('#num').change(function(){
        if(!page){
            paginate(data)
        }else{
            paginate(Ndata)
        }
    })

    $(document).keypress((e)=>{
        if(e.which == 13){
            $('.save').click()
        }
    })

    function isEmpty(e){
        if(e.val() == '' || e.val() == null){
            return false
        }else{
            return true
        }
    }

    function validateDate(){
        if(isEmpty($('#from')) && !isEmpty($('#to'))){
            //search with one day
            filterOne($('#from').val())
        }else if(isEmpty($('#from')) && isEmpty($('#to'))){
            var from = new Date($('#from').val())
            var to = new Date($('#to').val())
            if(from > to){
                alert('تاريخ البدء اكبر من تاريخ الانتهاء')
            }else{
                //search with 2 dates
                filterTwo($('#from').val(),$('#to').val())
            }
        }else if(!isEmpty($('#from')) && !isEmpty($('#to'))){
            //error
            alert('لم بتم اختيار اي تاريخ')
        }
    }


    $('.save').click(function(){
        validateDate()
    })

    function filterOne(date){
        Ndata = []
        var d = new Date(date)
        data.forEach(function(item){
            var t = new Date(item.Date_App)
            if(d.getTime() == t.getTime()){
                Ndata.push(item)
            }
        })

        paginate(Ndata)
        page = true
    }


    function filterTwo(date1,date2){
        Ndata = []
        var d = new Date(date1)
        var to = new Date(date2)
        data.forEach(function(item){
            var t = new Date(item.Date_App)
            if(t.getTime() >= d && t.getTime() <= to){
                Ndata.push(item)
            }
        })

        paginate(Ndata)
        page = true
    }

    $('#ref').click(function(){
        paginate(data)
        page = false
    })
    
    $('.pdf').click(function(){
        if($('#from').val() == ''){
            var date = new Date();
            var M = date.getMonth()+1
            var D = date.getDate()
            var Y = date.getFullYear()
            if(M < 10) M = "0"+M
            if(D < 10) D = "0"+D
            var last = Y+"-"+M+"-"+D
            window.location.href = "pdf.php?date="+last
        }else if($('#from').val() != '' && $('#to').val() == ''){
            var date = new Date($('#from').val());
            var M = date.getMonth()+1
            var D = date.getDate()
            var Y = date.getFullYear()
            if(M < 10) M = "0"+M
            if(D < 10) D = "0"+D
            var last = Y+"-"+M+"-"+D
            window.location.href = "pdf.php?date="+last
        }else if($('#from').val() != '' && $('#to').val() != ''){
            var date = new Date($('#from').val());
            var date1 = new Date($('#to').val());
            var M = date.getMonth()+1
            var M1 = date1.getMonth()+1
            var D = date.getDate()
            var D1 = date1.getDate()
            var Y = date.getFullYear()
            var Y1 = date1.getFullYear()
            if(M < 10) M = "0"+M
            if(M1 < 10) M1 = "0"+M1
            if(D < 10) D = "0"+D
            if(D1 < 10) D1 = "0"+D1
            var last = Y+"-"+M+"-"+D
            var last1 = Y1+"-"+M1+"-"+D1
            window.location.href = "pdf.php?date1="+last+"&date2="+last1
        }
    })

    $('input[type=date]').dblclick(function(){
        $(this).val('')
    })

    $('.delete').click(function(){
        var answer = confirm('هل أنت متأكد أنك تريد حذف هذا الموعد ؟')
        if(answer){
            $.ajax({
                url:'DAppoinment.php',
                method:'POST',
                dataType:'JSON',
                data:{
                    ida:$(this).prop('id')
                },success:function(response){
                    if(response == 'true'){
                        alert('تمت عملية الحذف بنجاح')
                        window.location.href = "Appoinments.php"
                    }else{
                        alert('هنالك خطا ما في عملية الحذف')
                    }
                }
            })
        }
    })

})