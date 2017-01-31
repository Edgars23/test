;(function ($) {


    $(document).ready(function () {

    //MachHeight
            $('.products_ev_title, .single_image').matchHeight();

//Product ajax
    function productAjax(use_current_wrapper) {
        var ajaxUrl = ajaxSettings.url;
            current_wrapper = use_current_wrapper;
        $.ajax({
            url: ajaxUrl,
            type: "POST",
            data: {
                'action': 'single-product-ajax',
            },
            dataType: 'JSON',
            cache: false,
            timeout: 10000,
            beforeSend: function () {
                $('.ajax-result').css('opacity', '0.2');
            },
            success: function (data) {
                 //console.log(data);
                if (data.length > 0) {
                    $('.ajax-result').css('opacity', '1');
                    current_wrapper.html(data);
                    if (current_wrapper.hasClass('active-ajax')) {
                        current_wrapper.slideDown();
                    } else {
                        current_wrapper.slideUp();
                    }
                }
            }
        });
        return false;
    }




//Product ajax


    //CAll ajax by click on btn
    $('.product_btn a').each(function () {
        $(this).click(function () {

            if ($(this).parent('.product_btn').hasClass('active')) {
                $('.ajax-result').removeClass('active-ajax');
                $(this).parent('.product_btn').removeClass('active');
            } else {
                $('.ajax-result').addClass('active-ajax');
                $(this).parent('.product_btn').addClass('active');
            }
            var use_current_wrapper = $('.ajax-result');

            productAjax(use_current_wrapper);
            return false;
        });
    });

        $(document).on("click", ".close-b", function () {
            if ($('.ajax-result').hasClass('active-ajax')) {
                $('.ajax-result').hide();
                $('.ajax-result').removeClass('active-ajax');
                $('.product_btn').removeClass('active');

            }
        });

});
    $(window).on('load', function() {

    });

}(jQuery));
