$(document).ready(function() {
    $('input#client_email').on('blur', function(e) {
        e.preventDefault();

        $('p#email_unique').text("").removeClass("alert alert-danger");

        if ($(this).val().length >= 5) {

            $.ajax({
                type: 'POST',
                url: 'http://localhost/oCcoursp6/public/index.php/email/' + $(this).val(),
                success: function(data) {
                    if (data === true) {
                        $('p#email_unique').text('Cette adresse email existe déjà !').addClass("alert alert-danger");
                        console.log(data);
                    } else {
                        console.log(data);
                    }
                }
            });

        } else {
            $('p#email_unique').text("").removeClass("alert alert-danger");
        }

    });

});
