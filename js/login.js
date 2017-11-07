$(document).ready(function(){
    $("#login-submit").click(function(){
        username=$("#username").val();
        password=$("#password").val();

        $.ajax({
            type: "POST",
            url: "login.php",
            data: "name="+username+"&pwd="+password,
            success: function(value){
                if (value != 'NO') {

                    $('#textlog').hide();
                    $("#show").show();
                    $('#show').html(value);
                    $('#modalContain').show();
                }
                else if(value=='NO'){
                    $("#incorrect").modal('show');
                }
            }
        });
        return false;
    });
});
