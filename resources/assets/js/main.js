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
                for(i in response.data)
                    $(document).find('#'+i).html(response.data[i])
            })
            .catch(error => {
                console.log("error", error);
            });
    })

    $(document).on('click','#cart-button',function(){
        var modal = $('.modal')
        modal.find('.modal-title').html('Корзина')
        modal.modal('show')
    })

    $(document).on('click','#addcomment',function(){
        
        var me = $(this)
        var url = me.attr('data-url')
        var modal = $('.modal')

        axios
            .get(url)
            .then(response => {
                modal.find('.modal-content').html(response.data.view)                
                modal.modal('show')
            })
            .catch(error => {
                console.log("error", error);
            })
    })

    function checkMail(data){
        if ( (data.length > 0 && (data.match(/.+?\@.+/g) || []).length !== 1) || (data.length==0))
            return 0
        else 
            return 1
    }

    function checkText(data,min,max){
        var length = data.length
        if(length>min && length<max)
            return 1
        else
            return 0
    }

    $(document).on('click','#send_comment',function(){
        var me = $(this) 
        var modal = $('.modal') 
        var comments_block = $('.comments') 

        var minName = $('meta[name="min-name"]').attr('content') 
        var maxName = $('meta[name="max-name"]').attr('content')

        var minTitle = $('meta[name="min-title"]').attr('content')
        var maxTitle = $('meta[name="max-title"]').attr('content')

        var minText = $('meta[name="min-text"]').attr('content')
        var maxText = $('meta[name="max-text"]').attr('content')

        var validMail = checkMail(modal.find('[name="useremail"]').val())
        var validName = checkText(modal.find('[name="username"]').val(),minName,maxName)
        var validTitle = checkText(modal.find('[name="title"]').val(),minTitle,maxTitle)
        var validText = checkText(modal.find('[name="text"]').val(),minText,maxText)

        var validStatus = validMail+validName+validText+validTitle

        if(validStatus==4)
        {
            axios
                .post(me.attr('data-url'),{
                        username:modal.find('[name="username"]').val(),
                        useremail:modal.find('[name="useremail"]').val(),
                        title:modal.find('[name="title"]').val(),
                        text:modal.find('[name="text"]').val()
                    }
                )
                .then(response=>{
                    console.log(response.data)
                    modal.find('.modal-content').html('') 
                    modal.modal('hide')
                    comments_block.append(response.data.view)
                })
                .catch(error=>{

                })
        }
    })
})
