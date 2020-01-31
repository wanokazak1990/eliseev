//FLYING TO THE CART
function ballToCart(obj,status=1){
    var ball = obj
    var cart = $(".cart-in-nav");
    var w = ball.width()+25;
    ball.clone()
    .css({
        //'width':w+'px',
        'position' : 'absolute',
        'z-index' : '9999',
        top: ball.offset().top,
        left:ball.offset().left
    })
    .appendTo("body")
    .animate({
            opacity: 0.05,
            left: cart.offset().left,
            top: cart.offset().top
        }, 1000, function() {  
            $(this).remove();
    });
}

$(document).ready(function(){
    $(document).on('click','.search-parts input[type="radio"]',function(){
        $('.search-parts #input-code').attr('placeholder','Введите '+$(this).attr('data-holder')).val('')
    });

    $(document).on('click','.search-parts #search-submit',function(){
        $('.search-parts').submit();
    });

    $(document).on('click','.to-cart',function(){
        ballToCart($(this))
        axios
            .post($(this).attr('data-url'))
            .then(response => {
                console.log("response", response);
            })
            .catch(error => {
                console.log("error", error);
            });
    })
})