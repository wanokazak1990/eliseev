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

function setCartIndikators(price,count)
{
    $('#total_price').html(price)
    $('#total_count').html(count)
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
                setCartIndikators(response.data.total_price, response.data.total_count)
            })
            .catch(error => {
                console.log("error", error);
            });
    })

    $(document).on('click','#cart-button',function(){
        var modal = $('.modal')
        var url = $(this).attr('data-url')
        axios
            .post(url)
            .then(response => {
                modal.find('.modal-body').html(response.data.view)
            })
            .catch(error => {
                console.log("error", error);
            });
        modal.find('.modal-title').html('Корзина')
        modal.modal('show')
    })

    $(document).on('click','.cart-append', function(){
        var modal = $('.modal')
        var container = $(this).closest('.row')
        var counter = container.find('.product-counter')
        var pricer = container.find('.product-pricer')
        axios
            .post($(this).attr('data-url'))
            .then(response => {
                if(response.data.product!==null)
                {
                    counter.html(response.data.product.productCount)
                    pricer.html(response.data.product.productPrice)
                }
                setCartIndikators(response.data.total_price, response.data.total_count)
            })
            .catch(error => {
                console.log("error", error);
            });
    })

    $(document).on('click','.cart-remove',function(){
        var modal = $('.modal')
        var container = $(this).closest('.row')
        var counter = container.find('.product-counter')
        var pricer = container.find('.product-pricer')
        axios
            .post($(this).attr('data-url'))
            .then(response => {
                if(response.data.product!==null)
                {
                    counter.html(response.data.product.productCount)
                    pricer.html(response.data.product.productPrice)
                }
                else
                {
                    container.remove()
                }
                setCartIndikators(response.data.total_price, response.data.total_count)
            })
            .catch(error => {
                console.log("error", error);
            });
    })
})
