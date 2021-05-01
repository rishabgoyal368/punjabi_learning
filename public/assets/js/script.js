(function() {
    "use strict";
    /*jslint browser: true*/
    /*global $, jQuery, alert*/
    // Defaultly Hiding sidebar Overlay
    $("#sidebar_overlay").hide();

    // Tooltip

    if ($('[data-toggle="tooltip"]').length > 0) {
        $('[data-toggle="tooltip"]').tooltip();
    }
    // Select 2

    if ($('.select').length > 0) {
        $('.select').select2({
            minimumResultsForSearch: -1,
            width: '100%'
        });
    }
    // Date Time Picker

    if ($('.datetimepicker').length > 0) {
        $('.datetimepicker').datetimepicker({
            format: 'DD/MM/YYYY',
            icons: {
                up: "fa fa-angle-up",
                down: "fa fa-angle-down",
                next: 'fa fa-angle-right',
                previous: 'fa fa-angle-left'
            }
        });
    }

    $(window).on('load', function() {
        $('#loader').delay(100).fadeOut('slow');
        $('#loader-wrapper').delay(500).fadeOut('slow');
        $('body').delay(500).css({ 'overflow': 'visible' });
    });

    //sidebar open and close
    $(document).on('click', '#open_navSidebar', function() {
        $('#offcanvas_menu').css('width', '250px');
        $("#sidebar_overlay").show();
        $('.inner-wrapper').css('overflow', 'hidden');
    });

    $(document).on('click', '#close_navSidebar', function() {
        $('#offcanvas_menu').css('width', '0px');
        $("#sidebar_overlay").hide();
        $('.inner-wrapper').css('overflow', 'scroll');
    });

    $(document).on('click', "#sidebar_overlay", function() {
        $('#offcanvas_menu').css('width', '0px');
        $("#sidebar_overlay").hide();
    });

    /*================================
    stickey sidebar
    ==================================*/

    if ($(window).width() > 767) {
        if ($('.theiaStickySidebar').length > 0) {
            $('.theiaStickySidebar').theiaStickySidebar({
                // Settings
                additionalMarginTop: 20
            });
        }
    }
}());

$(document).ready(function(e) {

    $('.loaderSubmit').click(function() {
        var form_id = $(this).data('id');
        if ($('#' + form_id).valid() == true) {
            $('#loader-wrapper').css('display', 'block')
        }
    });
    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 5000);

    $('body').click(function(e) {
        if ($(e.target).is($("#recentSearchDropFooter")) || $(e.target).is($(".input_press"))) {} else {
            $('.recentSearchDrop').css('display', 'none')
        }
    })

});
$(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#img_upload').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();
                // alert(ext); return false;

                if(ext == 'jpeg' || ext == 'jpg' || ext == 'png')
                {
                    input = document.getElementById('img_upload');

                    readURL(this);
                }
            } else{

                $(this).val('');
                alert('Please select an image of .jpeg, .jpg, .png file format.');
            }

        });

    });

    $(document).ready(function() {
        $('.faq').hide();
        $('.view_ans').on('click',function(){
            var ths =$(this);
            var text =$(this).text(); 
            if(text == 'Show Answer'){
                ths.text('Hide Answer');
                ths.closest('.faq_container').find('.faq').slideDown('slow');
            }else{
                ths.closest('.faq_container').find('.faq').slideUp('slow');
                ths.text('Show Answer');
            }
        })
    });
