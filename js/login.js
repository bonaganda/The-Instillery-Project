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
                    // alert(value);
                    // window.location="UserProfile.php";
                    $('#textlog').hide();
                    $("#show").show();
                    $('#show').html(value);
                }
                else if(value=='NO'){
                    $("#incorrect").modal('show');
                }
            }
        });
        return false;
    });
});