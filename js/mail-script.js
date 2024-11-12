    // -------   Mail Send ajax

$(document).ready(function() {
    var form = $('#myForm');
    var submit = $('.submit-btn');
    var alert = $('.alert-msg');

    form.on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: 'mail.php',
            type: 'POST',
            dataType: 'html',
            data: form.serialize(),
            beforeSend: function() {
                alert.fadeOut();
                submit.html('Sending...');
            },
            success: function(data) {
                alert.html(data).fadeIn();
                form.trigger('reset');
                submit.attr("style", "display: none !important");
            },
            error: function(jqXHR,   
 textStatus, errorThrown) {
                console.error('Ajax request failed:', errorThrown);
                alert.html('An error occurred. Please try again later.').fadeIn();
                submit.html('Submit');
            }
        });
    });
});
