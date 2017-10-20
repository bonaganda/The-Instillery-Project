$('document').ready(function()
{
    /* validation */
    $("#recoveryform").validate({
        rules:
            {
                Email: {
                    required: true,
                    email: true
                },
            },
        messages:
            {
                Email:{
                    required: "Provide an email",
                    email: "Enter a valid email"
                }
            },
        submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm()
    {
        var data = $("#recoveryform").serialize();

        $( '#recoveryform' ).each(function(){
            this.reset();
        });


        $.ajax({

            type : 'POST',
            url  : 'recover.php',
            data : data,
            success :  function(data)
            {
                if(data == 'password')
                {   
                    $("#message").show();
                    $("#message").html('Password recovery sent');
                }
                else if(data == 'email')
                {
                    $("#message").show();
                    $("#message").html('Email does not exist');
                }
                else
                {
                    $("#message").show();
                    $("#message").html('Connection Failure');
                }
            }
        });
        return false;
    }
    /* form submit */
});