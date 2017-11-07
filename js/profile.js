$(document).ready(function(){
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({
            type: "POST",
            url: "userprofileprocess.php",
            async: false,
            data: "",
            dataType: 'json',
            success: function(value){

                var id = value[0];
                var email = value[1];
                var fname = value[2];
                var imageSource = value[3];
                var nba = value[4];
                var fifa = value[5];
                var pool = value[6];

                //--------------------------------------------------------------------
                // 3) Update html content
                //--------------------------------------------------------------------
                $('#imageUser').attr("src",imageSource); //Set output element html
                $('#email').html(email);
                $('#nbaScore').html(nba);
                $('#fullname').html(fname);
                $('#fifaScore').html(fifa);
                $('#poolScore').html(pool);
                $('#iduser').html(id);
                $('#modalContain').hide();
            }
        });
});
