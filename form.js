$( document ).ready(function() {
    $( "#coment" ).submit(function( event ) {
        //alert( "Handler for .submit() called." );
        event.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                alert(result);

            },
        });
    });
});