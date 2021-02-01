$(document).ready(function () {



    var input = document.getElementById('input');
    input.addEventListener('input', function (evt) {
        this.setCustomValidity('');
    });
    input.addEventListener('invalid', function (evt) {
        // Required
        if (this.validity.valueMissing) {
            this.setCustomValidity('Seleccione almenos una imagen!');
        }
    });


   


    var readURL1 = function (input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload1").on('change', function () {
        readURL1(this);
    });

    var readURL2 = function (input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload2").on('change', function () {
        readURL2(this);
    });
    var readURL3 = function (input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar3').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload3").on('change', function () {
        readURL3(this);
    });
});