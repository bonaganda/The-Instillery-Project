$(document).ready(function(){
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
                        
    $.ajax({
        type: "POST",
        url: "userprofileprocess.php",
        data: "",
        dataType: 'json',
        success: function(value){
                var fullname = value[2];
                 
                //--------------------------------------------------------------------
                // 3) Update html content
                //--------------------------------------------------------------------
                if(fullname != null){
                    $('#textlog').hide();
                    $("#show").show();
                    $('#show').html(fullname);
                   }else{
                     $('#show').hide(); 
                   }
        }
    });
});



