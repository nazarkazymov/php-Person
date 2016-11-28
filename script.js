


$('document').ready(function() {
    // init chosen-select plugin for select elements
    $(".chosen-select").chosen();
    
    /* validation */
    $("#register-form").validate({
        rules:
        {
            user_name: {
                required: true,
                minlength: 3
            },

            user_email: {
                required: true,
                email: true
            },

            region_1_sel: {
                required: true,
                
            },
            region_2_sel: {
                required: true,
                
            },
            region_3_sel: {
                required: true,
                
            }
        },
        messages:
        {
            user_name: "Введіть ПІБ",
            user_email: "Введіть електронну пошту",
            region_1_sel: "Виберіть область",
            region_2_sel: "Виберіть район",
            region_3_sel: "Виберіть населений пункт"
            
        },
        submitHandler: createPerson
    });
    
    // Init first level region dropdown list  
    $(document).ready(function () {
        $('#region_dv_2').hide();
        $('#region_dv_3').hide();
        var formData = {param: "1_Level_Regions"};
        $.ajax({
            url: "getRegions.php",
            data: formData,
            dataType: 'json',
            success: function(result,status) {
                $('#region_ch_1')
                .find('option')
                .remove()
                .end()
                .append("<option value=''></option>");
                $.each(result, function(key, value) {
                    $('#region_ch_1')
                    .append('<option value=' + value['ter_id'] + '>' + value['ter_name'] + '</option>');

                });

                $('#region_ch_1').trigger("chosen:updated");
            }

        });
    });
    // Init second level region dropdown list
    $("#region_ch_1").chosen().change(function(){
        $('#region_dv_2').hide();
        $('#region_dv_3').hide();

        var ter_pid = $('#region_ch_1').val();
        var formData = {param: "2_Level_Regions", ter_pid: ter_pid};     
        $.ajax({
            url: "getRegions.php",
            data: formData,
            dataType: "json",

            success: function(result,status) {

                $('#region_dv_2').show();
                $('#region_ch_2')
                .find('option')
                .remove()
                .end()
                .append("<option value=''></option>");
                $('#region_ch_3')
                .find('option')
                .remove()
                .end()
                .append("<option value=''></option>");
                $.each(result, function(key, value) {
                    $('#region_ch_2')
                    .append('<option value=' + value['ter_id'] + '>' + value['ter_name'] + '</option>');
                });
                $('#region_ch_2').trigger("chosen:updated");
            }

        });

    });

    // Initialize third level region dropdown list
    $("#region_ch_2").chosen().change(function(){ 
        $('#region_dv_3').hide();
        var ter_pid = $('#region_ch_2').val();
        var formData = {param: "3_Level_Regions", ter_pid: ter_pid};   

        $.ajax({
            url: "getRegions.php",
            data: formData,
            dataType: "json",

            success: function(result,status) {
                
                $('#region_dv_3').show();
                $('#region_ch_3')
                .find('option')
                .remove()
                .end()
                .append("<option value=''></option>");

                $.each(result, function(key, value) {

                    $('#region_ch_3')
                    .append('<option value=' + value['ter_id'] + '>' + value['ter_name'] + '</option>');
                });
                $('#region_ch_3').trigger("chosen:updated");
            }

        });

    });
    /* form submit */
    function createPerson() {
        var postData = $("#register-form").serialize();
        $.ajax({
            url: "register.php",
            type: "POST", 
            data: postData,
        })
        .done(function(data) {
            
        })
        .fail(function(xhr, status, error) {
            console.log( "error" );
        });

    }


});


