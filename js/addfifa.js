$('document').ready(function()
{
    jQuery.validator.addMethod("notEqual", function(value, element, param) {
      return this.optional(element) || value != $(param).val();
    }, "Please specify a different (non-default) value");

    /* validation */
    $("#fifaform").validate({
        rules:
            {
                player1: {
                    required: true,
                    minlength: 5,
                    maxlength: 5,
                    digits:true,
                    notEqual: "#player2"
                },
                player2: {
                    required: true,
                    minlength: 5,
                    maxlength: 5,
                    digits:true,
                    notEqual: "#player1"
                },
                p1score: {
                    required: true,
                    digits: true
                },
                p2score: {
                    required: true,
                    digits: true
                },
            },
        messages:
            {
                player1:{
                    required:"Player 1 Please Provide ID",
                    minlength: "ID should not be less than 5",
                    maxlength: "ID should not be greater than 5",
                    notEqual: "Player 1 should not be equal to player 2"
                },
                player2:{
                    required:"Player 2 Please Provide ID",
                    minlength: "ID should not be less than 5",
                    maxlength: "ID should not be greater than 5",
                    notEqual: "Player 2 should not be equal to player 1"
                },
                p1score:{
                    required: "Provide a score",
                    digits: "Need to be a number"
                },
                p2score:{
                    required: "Provide a score",
                    digits: "Need to be a number"
                },
            },
        submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm()
    {
        var data = $("#fifaform").serialize();

        $( '#fifaform' ).each(function(){
            this.reset();
        });


        $.ajax({

            type : 'POST',
            url  : 'addfifa.php',
            data : data,
            success :  function(data)
            {
                if(data == 'first')
                {
                    $("#game").modal('show');
                    $("#error").html('Player 1 does not exist!');
                }
                else if(data == 'second')
                {   
                    $("#game").modal('show');
                    $("#error").html('Player 2 does not exist!');
                }
                else if(data =='update')
                {
                    $("#game").modal('show');
                    $("#error").html('Game score added');
                }
                else
                {
                    $("#game").modal('show');
                    $("#error").html('Connection Failure!');
                }
            }
        });
        return false;
    }
    /* form submit */
});