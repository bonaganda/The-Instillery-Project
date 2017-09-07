$(document).ready(function(){
    $("#login-submit").click(function(){
        username=$("#username").val();
        password=$("#password").val();

        $.ajax({
            type: "POST",
            url: "php/login.php",
            data: "name="+username+"&pwd="+password,
            success: function(value){
                alert(value);
                if (value === 'OK') {
                    window.location="userProfile.php";
                }
                else if(value=='OK NOT'){
                    window.location="userProfile.php";
                }
            }
        });
        return false;
    });
});