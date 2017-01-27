$(document).ready(function(){
    $("#sendpulseSubscribeForm").on('submit', function(e){
        e.preventDefault();
        var $form = $(this);
        var handlerUrl = $form.attr('action');
        var email = $form.find('input[name=email]').val();
        var data = $form.serialize();

        if (!email) {
            alert('Empty fields');
            return false;
        }

        $.ajax({
            type: 'POST',
            data: data,
            url: handlerUrl,
            success: function(data) {
                if (data.result) {
                    alert('Successfully subscribed!');
                    $form[0].reset();
                }
            },
            error: function(data) {
                alert('Error: ' + JSON.stringify(data));
            }
        });
    });
});
