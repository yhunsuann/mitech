$(document).ready(function() {
    $('#submit-button').click(function() {
        $(this).closest('form').submit();
    });

    $('.lang').click(function() {
        $(".lang").removeClass('active');
        $(this).addClass('active')
    });

    $('input:reset').click(function() {
        $(this).closest('form').find('input:text').attr('value', '');
    });

    $('.summernote').summernote({
        placeholder: "Enter Content",
        tabsize: 2,
        height: 100
    });

    $('.datepicker').datepicker({
        language: "es",
        autoclose: true,
        format: "yyyy-mm-dd"
    });

    $('.open-modal').click(function() {
        var id = $(this).data('id');
        let type = $(this).attr('m-type');
        url = '';
        if (id !== undefined) {
            var url = "/admin/" + type + "/delete/" + id;
        }
        $('#btn-delete-modal').attr("href", url);
    });

    $('.reset-button').click(function() {
        $('#form-employee input').val('');
        $('#form-employee select').val('');
        $('#selected-request').remove();
    })

    $('.datepicker-month').datepicker({
        format: "MM yyyy",
        viewMode: "months",
        minViewMode: "months",
    });

    $('#btn-delete-modal').on('click', function() {
        if ($(this).attr('href') == '') {
            $('#form-delete').submit();

            return false;
        }
    });
    var type_product = $('.type_product').val();
    $('.type_product').change(function() {
        type_product = $(this).val();
    });

    $('#add-measurement').click(function() {
        $container = $('#row-measurement');
        $html = "<div class='row row-info-measurement mt-2'>" +
            "<div class='col-3'>" +
            "<div class='mb-4'>" +
            "<label for='price' class='form-label text-black'>Giá<span class='strong-red'> *</span></label>" +
            "<input class='form-control' name='price[]'></input>" +
            "</div>" +
            "</div>" +
            "<div class='col-2'>" +
            "<div class='mb-4'>" +
            "<label for='thickness' class='form-label text-black thickness'>Độ dày<span class='strong-red'> *</span></label>" +
            "<input class='form-control' name='thickness[]'></input>" +
            "</div>" +
            "</div>" +
            "<div class='col-2 input_plaster'>" +
            "<div class='mb-4'>" +
            "<label for='thickness' class='form-label text-black'>Chiều dài<span class='strong-red'> *</span></label>" +
            "<input class='form-control' name='width[]'></input>" +
            "</div>" +
            "</div>" +
            "<div class='col-2 input_plaster'>" +
            "<div class='mb-4'>" +
            "<label for='thickness' class='form-label text-black'>Chiều cao<span class='strong-red'> *</span></label>" +
            "<input class='form-control' name='height[]'></input>" +
            "</div>" +
            "</div>" +
            "<div class='col-2'>" +
            "<div class='mb-4'>" +
            "<label for='thickness_unit' class='form-label text-black'>Đơn vị</label>" +
            "<select name='thickness_unit[]' class='form-select' id='status' style='width: 100%'>" +
            "<option value='mm'>mm</option>" +
            "<option value='kg'>kg</option>" +
            "</select>" +
            "</div>" +
            "</div>" +
            "<div class='col-1'>" +
            "<a class='btn-delete-measurement'>x</a>" +
            "</div>" +
            "</div>";
        $container.append($html);

        if (type_product == 13) {
            $('.input_plaster').hide();
            $('.thickness').html('Trọng lượng<span class="strong-red"> *</span>');
        } else {
            $('.input_plaster').show();
            $('.thickness').html('Độ dày <span class="strong-red"> *</span>');
        }

        $('.btn-delete-measurement').click(function() {
            $(this).closest('.row-info-measurement').remove();
        })
    })

    $('#add-edit-measurement').click(function() {
        $container = $('#row-measurement');
        $html = "<div class='row row-info-measurement mt-2'>" +
            "<div class='col-3'>" +
            "<div class='mb-4'>" +
            "<label for='price' class='form-label text-black'>Giá<span class='strong-red'> *</span></label>" +
            "<input class='form-control' name='new_price[]'></input>" +
            "</div>" +
            "</div>" +
            "<div class='col-2'>" +
            "<div class='mb-4'>" +
            "<label for='thickness' class='form-label text-black thickness'>Độ dày<span class='strong-red'> *</span></label>" +
            "<input class='form-control' name='new_thickness[]'></input>" +
            "</div>" +
            "</div>" +
            "<div class='col-2 input_plaster'>" +
            "<div class='mb-4'>" +
            "<label for='width' class='form-label text-black'>Chiều dài<span class='strong-red'> *</span></label>" +
            "<input class='form-control' name='new_width[]'></input>" +
            "</div>" +
            "</div>" +
            "<div class='col-2 input_plaster'>" +
            "<div class='mb-4'>" +
            "<label for='Height' class='form-label text-black'>Chiều cao<span class='strong-red'> *</span></label>" +
            "<input class='form-control' name='new_height[]'></input>" +
            "</div>" +
            "</div>" +
            "<div class='col-2 '>" +
            "<div class='mb-4'>" +
            "<label for='thickness_unit' class='form-label text-black'>Đơn vị</label>" +
            "<select name='new_thickness_unit[]' class='form-select' id='status' style='width: 100%'>" +
            "<option value='mm'>mm</option>" +
            "<option value='kg'>kg</option>" +
            "</select>" +
            "</div>" +
            "</div>" +
            "<div class='col-1'>" +
            "<a class='btn-delete-measurement'>x</a>" +
            "</div>" +
            "</div>";
        $container.append($html);

        if (type_product == 13) {
            $('.input_plaster').hide();
            $('.thickness').html('Trọng lượng<span class="strong-red"> *</span>');
        } else {
            $('.input_plaster').show();
            $('.thickness').html('Độ dày <span class="strong-red"> *</span>');
        }

        $('.btn-delete-measurement').click(function() {
            $(this).closest('.row-info-measurement').remove();
        })
    })


    if (type_product == 13) {
        $('.input_plaster').hide();
        $('.thickness').html('Trọng lượng<span class="strong-red"> *</span>');
    } else {
        $('.input_plaster').show();
        $('.thickness').html('Độ dày <span class="strong-red"> *</span>');
    }

    $('.type_product').change(function() {
        var value = $(this).val();
        if (value == 13) {
            $('.input_plaster').hide();
            $('.thickness').html('Trọng lượng<span class="strong-red"> *</span>');
        } else {
            $('.input_plaster').show();
            $('.thickness').html('Độ dày <span class="strong-red"> *</span>');
        }
    });

    $('.btn-delete-measurement').click(function() {
        $(this).closest('.row-info-measurement').remove();
    })

    // changeInput();

    getCurrentTime();
    setInterval(getCurrentTime, 1000);
});

// funcion
function getCurrentTime() {
    var currentTime = new Date();
    var formattedTime = currentTime.getDate() + "-" + (currentTime.getMonth() + 1) + "-" + currentTime.getFullYear() + " " + currentTime.getHours() + ":" + currentTime.getMinutes() + ":" + currentTime.getSeconds();
    $('#current-time').text(formattedTime);
}

$('body').on('click', ".upload__img-close", function(e) {
    var $key = $(this).data('key') !== undefined ? $(this).data('key') : ' ';
    var $html = "<input type='hidden' name='old_avatar[" + $key + "]' value='old_avatar'>";
    var container = $(this).closest('.row.image');
    container.append($html);
    $(this).parent().remove();
});

$('.upload__img-closes').click(function() {
    var file = $(this).closest('.col-3').find('input[name-image]').attr('name-image');
    for (var i = 0; i < allImages.length; i++) {
        if (allImages[i] === file) {
            allImages.splice(i, 1);
            break;
        }
    }
    var imagesList = $('.images-list');
    imagesList.attr('value', allImages);
    $(this).parent().remove();
});

ImgUpload();

var allImages = [];
var imagesList = $('.images-list');

if (imagesList.length > 0) {
    imagesList = imagesList[imagesList.length - 1];
    var imagesData = imagesList.getAttribute('value');
    allImages = JSON.parse(imagesData);
}

function ImgUpload() {
    var imgWrap = "";
    $(document).ready(function() {
        $('.upload__inputfile').on('change', function(e) {
            var files = e.target.files;
            $('#image-404').css("display", "none");
            var rowImage = $('#row-images')
            var maxLength = parseInt($(this).attr('data-max_length'));
            if (rowImage.children('.col-3').length >= maxLength) {
                // Đã đạt đến số lượng ảnh tối đa
                return;
            }
            for (var i = 0; i < files.length; i++) {
                var file = files[i];

                if (!file.type.match('image.*')) {
                    // Loại bỏ các tệp không phải ảnh
                    continue;
                }

                var reader = new FileReader();

                reader.onload = (function(f) {
                    return function(e) {
                        var html = '<div class="col-3 mt-2">' +
                            '<img src="' + e.target.result + '" class="" alt="' + f.name + '">' +
                            '<div class="upload__img-close"></div>' +
                            '</div>';
                        rowImage.append(html);
                    };
                })(file);
                reader.readAsDataURL(file);
            }
        });
    });
}

ImgUploadAvatar();

function ImgUploadAvatar() {
    var imgWrap = "";
    $(document).ready(function() {
        $('.upload__avartar').on('change', function(e) {
            var files = e.target.files;
            var rowImage = $(this).closest('.upload__box').prev('.row.image.mb-2');
            var maxLength = parseInt($(this).attr('data-max_length'));
            if (rowImage.children('.col-3').length >= maxLength) {
                // Đã đạt đến số lượng ảnh tối đa
                return;
            }
            for (var i = 0; i < files.length; i++) {
                var file = files[i];

                if (!file.type.match('image.*')) {
                    // Loại bỏ các tệp không phải ảnh
                    continue;
                }

                var reader = new FileReader();
                rowImage.empty();
                reader.onload = (function(f) {
                    return function(e) {
                        var html = '<div class="col-3 mt-2">' +
                            '<img src="' + e.target.result + '" class="" alt="' + f.name + '">' +
                            '<div class="upload__img-close"></div>' +
                            '</div>';
                        rowImage.append(html);
                    };
                })(file);
                reader.readAsDataURL(file);
            }
        });
    });
}