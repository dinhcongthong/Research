const DOMAIN_URL = $('base').data('domain');

$(function () {

});

function imagePreview(ele) {
    const file = ele[0].files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function (event) {
            console.log(event.target.result);
            $('.img-preview').attr('src', event.target.result);
        }
        reader.readAsDataURL(file);
    }
}

function fileUploadAjax(ele) {
    let formData = new FormData();
    let file = ele[0].files[0];
    // check file.
    if (!file) {
        alertModal('File không được chọn!');
    }
    formData.append('file', file);
    $.ajax({
        type: "POST",
        url: DOMAIN_URL + '/media-uploads',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            ele.siblings('.img-preview').attr('src', response.media.url);
            // append media_id input.
            if ($('input[name="media_id"]').length > 0) {
                $('input[name="media_id"]').val(response.media.id);
            } else {
                ele.parents('form').append(`<input type="hidden" name="media_id" value="${response.media.id}">`)
            }
        }
    });
}

function alertModal(message) {
    $('#alert_modal #content').text(message);
    $('#alert_modal').show();
}