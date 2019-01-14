$(document).ready(function() {
    $('.form-control.cp').on('keyup', function(e) {
        e.preventDefault();

        $('.form-control.ville option').remove();

        if ($(this).val().length === 5) {

            $.ajax({
                type: 'POST',
                url: 'http://localhost/oCcoursp6/public/index.php/ville/' + $(this).val(),

                success: function(data) {
                    $.each(data.ville, function (index, value) {
                        $('.form-control.ville').append($('<option>', {value: value, text: value}));

                    });

                }
            });

        } else  {
            $('.form-control.ville').val('');
        }

    });

});
