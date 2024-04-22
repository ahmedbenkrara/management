$(function () {
    let container = $('#pagination')
    var show = $('#num')
   
    $.ajax({
        url:'getclients.php',
        method:'POST',
        dataType:'JSON',
        success:function(data){

            var datas = JSON.parse(JSON.stringify(data))

            var N = parseInt(show.val())

const paginate = function(e){
if(e.length == 0){
    var row = `<tr>
      <td colspan="7">لم بتم العتور على اية نتائج</td>
      </tr>
      `
      $("#tbody").html(row);

}else{
container.pagination({
dataSource: e
,
pageSize: N,
autoHidePrevious: true,
autoHideNext: true
,callback: function (data, pagination) {
 
var dataHtml=``;
data.forEach((item,index)=>{
    
     var row = `<tr>
      <td style="font-weight:bold; ">${(index+1)}</td>
      <td>${item.Fname}</td>
      <td>${item.Sname}</td>
      <td>${item.Phone}</td>
      <td>${item.Adress}</td>
      <td>${item.Date_inscription}</td>
      <td><a id="${item.idc}" class="delete">حذف</a> <a href="clientEdit.php?id=${item.idc}" class="edit">تعديل</a></td>
      </tr>
      `
      dataHtml += row         
})
    $("#tbody").html(dataHtml);
}
})
}
}
//////////////////////////refresh after search
var result = datas;
$('#ref').click(function(){
paginate(datas)
result = datas
})

paginate(datas)

///////////////////////change
show.change(function(){
N = parseInt(show.val())
if(result == datas){
    paginate(datas)
}else{
    paginate(result)
}
})

function findByFullName(f,s){
result = datas.filter(item => item.Fname == f && item.Sname == s)
paginate(result)
}

function findByDate(d){
result = datas.filter(item => item.Date_inscription == d)
paginate(result)
}

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

var hide = false

function hidedate(){
if($('#fname').val() != "" || $('#sname').val() != ""){
    $('#date').hide()
    $('#date').parent().prev().hide()
    hide = true
}else{
    $('#date').show()
    $('#date').parent().prev().show()
    hide = false
}
}

$('#fname').on('input',function(){
hidedate()
})

$('#sname').on('input',function(){
hidedate()
})

/////////////////////enter pressed///////////////////////////
$(document).keypress((e)=>{
if(e.which == 13){
    $('.save').click()
}
})
/////////////////////////////////////////////////////////////

$('.save').click(function(){
if(hide){
    if(validateName($('#fname'))){
        if(validateName($('#sname'))){
            findByFullName($('#fname').val(),$('#sname').val())
            $('#fname').val("")
            $('#sname').val("")
            $("#date").show()
            $('#date').parent().prev().show()
            hide = false
        }
    }
}else{
    if($('#date').val() != null && $('#date').val() != ''){
        var date = new Date($('#date').val());
        var M = date.getMonth()+1
        var D = date.getDate()
        var Y = date.getFullYear()
        if(M < 10) M = "0"+M
        if(D < 10) D = "0"+D
        var last = Y+"-"+M+"-"+D
        findByDate(last)
        $('#date').val("")
    }
}
})

$('.delete').click(function(){
    var answer = confirm('هل أنت متأكد أنك تريد حذف هذا الزبون ؟')
    if(answer){
        $.ajax({
            url:'Dclient.php',
            method:'POST',
            dataType:'JSON',
            data:{
                idc:$(this).prop('id')
            },success:function(response){
                if(response == 'true'){
                    alert('تمت عملية الحذف بنجاح')
                    location.reload()
                }else{
                    alert('هنالك خطا ما في عملية الحذف')
                }
            }
        })
    }
})

}})
})