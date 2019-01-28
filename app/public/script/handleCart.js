$(document).ready(function(){
    $.post(
        'shop/app/public/ajax/cartHandler.php',
        {
            nb: 1
        },
        //callback
        function(data){
            $(".cart").html(data);
        }
    );
});
