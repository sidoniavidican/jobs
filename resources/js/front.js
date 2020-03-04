$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.notify-user').click(function() {
        var category = $('#category_id').val();
        var city = $('#city_id').val();
        $.ajax({
            url: '/notify',
            type: 'POST',
            data : {'category_id':category, 'city_id':city},
            success: function(response) {    
                $.notify({title:'', message: response.message},{type:response.type});
            }
        });
    });

    $('.apply').click(function() {
        var job = $(this).val();
        var element = $(this);
        $.ajax({
            url: '/applications',
            type: 'POST',
            data : {'job_id':job},
            success: function(response) {    
                $.notify({title:'', message: response.message},{type:response.type});
           
                if(response.type=='success') {
                    element.html('Applied');
                }
                if(response.type!='warning') {
                    element.prop('disabled', true);
                }
            }
        });
    });
   
    $(".dropzone").dropzone({
        maxFiles: 1,
        success: function (file, data) {
            $.notify({title:'', message: 'You have uploaded a CV succesfully, if you want to update the CV just upload again the new CV'},{type:'success'});
           $('.dz-preview').remove();
        }
    });

    $('.dropzone-disabled').click(function() {
        $.notify({title:'', message: 'You have to be loged in'},{type:'danger'});
        $(this).prop('disabled', true);
    });

    $('.toggle-filters').click(function() {
        if($('.toggle-filters > i').hasClass('fa-arrows-alt')) {
            $('.toggle-filters > i').removeClass('fa-arrows-alt');
            $('.toggle-filters > i').addClass('fa-compress-arrows-alt');
            $('.filters').show();
        } else {
            $('.toggle-filters > i').removeClass('fa-compress-arrows-alt');
            $('.toggle-filters > i').addClass('fa-arrows-alt');
            $('.filters').hide();
        }
    });
});


 