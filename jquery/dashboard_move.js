$(document).ready(function(){
    var menu = $('.menu');
    var nav = $('.nav');
    var con = $('.container');
    var i = false;
    var width = nav.width();
    var margin = nav.width();
    con.css({'marginLeft':margin});
    
    menu.click(function(){
        margin = nav.width();
        if(!i){
            nav.animate({width:0},500);
            con.animate({marginLeft:0},500);
            nav.hide();
            i = true;
            
        }else{
            nav.show();
            nav.animate({width:width},{duration:500,queue:false});
            con.animate({marginLeft:width},{duration:500,queue:false});
            i = false;
        }
        
    })

});