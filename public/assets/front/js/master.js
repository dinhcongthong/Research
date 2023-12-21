$(function () {
    toastrSetting();
})
function toastrSetting() {
    toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "10000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}

function changeStatus(url, ele) {
    $('#status_modal').modal('show');
    $('#btn_ok').off('click').on('click', function (e) {
        e.preventDefault();
        postChangeStatus(url, ele)
    })
}

function postChangeStatus(url, ele) {
    $.ajax({
        method: 'POST',
        url,
        data: {
            statusId: ele.val()
        },
        beforeSend: function () {
            rootLoader.show();
        },
    })
        .done(function (res) {
            if (res.success) {
                toastr.success('Cập nhật trạng thái thành công')
            }
        })
        .fail((xhr, status, errors) => console.log(xhr, status, errors))
        .always(() => rootLoader.hide())

}

function previewImage() {
    $('.file-upload-default').change(function () {
        const file = this.files[0];
        // Start check file extension valid.
        let fileName = $(this).val();
        let allowedExtensions = ['jpg', 'jpeg', 'png'];
        let parts = fileName.split('.');
        // Lấy phần tử cuối cùng trong mảng là đuôi file
        let extension = parts[parts.length - 1];
        if (!allowedExtensions.includes(extension)) {
            alert('File upload không hợp lệ. Chỉ nhận những file .png, .jpg, .jpeg');
            $(this).val('');
            $('.file-upload-info').val('');
        }

        // End check file extension valid.
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $('.img-preview').attr('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
}

function money_format(data) {
    return new Intl.NumberFormat("vi-VN", { style: "currency", currency: "VND" }).format(data);
}
function changeStatusUser(url, ele) {
    $('#status_modal').modal('show');
    let newStatusId = ele.data('status') == 1 ? 2 : 1;
    $('#btn_ok').off('click').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url,
            data: {
                statusId: newStatusId
            },
            beforeSend: function () {
                rootLoader.show();
            },
        })
            .done(function (res) {
                if (res.success) {
                    ele.find('i').removeClass();
                    if (newStatusId == 1) {
                        ele.find('i').addClass('text-primary bx bx-pause');
                    } else {
                        ele.find('i').addClass('text-danger bx bx-play');
                    }
                    ele.data('status', newStatusId);
                    toastr.success('Cập nhật trạng thái thành công')
                }
            })
            .fail((xhr, status, errors) => console.log(xhr, status, errors))
            .always(() => rootLoader.hide())
    })
}