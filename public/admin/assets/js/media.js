

function getImage(identifier) {

    var imageUrl = $(identifier).data('image');

        if (mediaType == 'file') {


            $(".video_raw_url").val(imageUrl);
            var domain_name = $('#domain_name').val();
            var file_link = domain_name + '/public/' + imageUrl; // for developement
            $(".video_file_preview").val(imageUrl);
            $('.video_file_preview').removeClass('d-none');
            $(".video_file_preview").attr('src', file_link);
            mediaNotification('Selected');
        }

        if (mediaType == 'thumbnail') {


            $(".course_image").val(imageUrl);
            $(".course_thumb_url").val(imageUrl);
            var domain_name = $('#domain_name').val();
            var file_link = domain_name + '/public/' + imageUrl; // for developement
            $(".course_thumb_preview").val(imageUrl);
            $('.course_thumb_preview').removeClass('d-none');
            $(".course_thumb_preview").attr('src', file_link);
            mediaNotification('Selected');
        }

        if (mediaType == 'category') {
            $(".icon").val(imageUrl);
            $(".category_url").val(imageUrl);
            var domain_name = $('#domain_name').val();
            var file_link = domain_name + '/public/' + imageUrl; // for developement
            $(".category_preview").val(imageUrl);
            $('.category_preview').removeClass('d-none');
            $(".category_preview").attr('src', file_link);
            mediaNotification('Selected');
        }

        if (mediaType == 'slider') {
            $(".slider").val(imageUrl);
            $(".slider_url").val(imageUrl);
            var domain_name = $('#domain_name').val();
            var file_link = domain_name + '/public/' + imageUrl; // for developement
            $(".slider_preview").val(imageUrl);
            $('.slider_preview').removeClass('d-none');
            $(".slider_preview").attr('src', file_link);
            mediaNotification('Selected');
        }

        if (mediaType == 'package') {


            $(".package").val(imageUrl);
            $(".package_url").val(imageUrl);
            var domain_name = $('#domain_name').val();
            var file_link = domain_name + '/public/' + imageUrl; // for developement
            $(".package_preview").val(imageUrl);
            $('.package_preview').removeClass('d-none');
            $(".package_preview").attr('src', file_link);
            mediaNotification('Selected');
        }

        if (mediaType == 'source_code') {

            $(".source_code_url").val(imageUrl);
            var domain_name = $('#domain_name').val();
            var file_link = domain_name + '/public/' + imageUrl; // for developement
            $('.source_code_preview').removeClass('d-none');
            $(".source_code_preview").attr('src', file_link);
            mediaNotification('Selected');
        }
    try {

    } catch (error) {
        location.reload();
        mediaNotification('Somethin went wrong!');
    }

    closeNav();
}

function mediaNotification(result) {

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    toastr.success(result , "تم بنجاح " );


}

