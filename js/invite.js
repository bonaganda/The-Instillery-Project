$('document').ready(function()
{
    /* validation */
    $("#invite").validate({
        rules:
            {
                comment: {
                    required: true,
                    minlength: 10
                },
            },
        messages:
            {
                comment:{
                    required: "Enter an invitation message",
                    minlength: "Please enters more than 10 characters"
                }
            },
        submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm()
    {
        var data = $("#invite").serialize();

        $( '#invite' ).each(function(){
            this.reset();
        });

        
        $.ajax({

            type : 'POST',
            url  : 'invite.php',
            data : data,
            success :  function(data)
            {
                if(data == 'success')
                {   
                    $("#invitemsg").show();
                    $("#invitemsg").html('Tournament Email Invitation Successfully Sent');
                }
                else
                {   $("#invitemsg").show();
                    $("#invitemsg").html('Connection Failure');
                }
            }
        });
        return false;
    }
    /* form submit */
});