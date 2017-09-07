$(document).ready(function(){
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({
        type: "POST",
        url: "php/userprofile.php",
        data: "",
        dataType: 'json',
        success: function(value){
            var fullname = value[2];
            //--------------------------------------------------------------------
            // 3) Update html content
            //--------------------------------------------------------------------
            // $('#textlog').removeAttr('data-toggle');
            // $('#toggle').removeAttr('data-toggle');
            $('#textlog').hide();
            $('#show').html(fullname);
            $('#logout').show().html("LOGOUT");
        }
    });
});