  $(document).ready(function(){

   $(".tittle").click(function(){
    if($(this).nextAll(".divhidden").eq(0).is(":hidden")){

        $(this).nextAll(".divhidden").eq(0).slideDown(1000)
               
          }
    else{
        $(this).nextAll('.divhidden').eq(0).hide(500,function(){

                 $(this).fadeOut();
        });
    }
    });
    
});
 
