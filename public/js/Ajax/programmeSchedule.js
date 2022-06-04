$(document).ready(function(){
    $('select[name="programme"]').on('change',function(){
        var programmeId = $(this).val();
        if(programmeId){
            $.ajax({
                url: '/ajax/section/programme/'+programmeId+'/get-schedules',
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('select[name="programme_schedule"]').empty();
                    $('select[name="programme_schedule"]').append('<option value="">Select Programme Schedule</option>');
                    $.each(data, function(key, value){
                        $('select[name="programme_schedule"]').append('<option value="'+key+'">'+ value +'</option>');
                    });
               }
            });
        } else {
            $('select[name="programme_schedule"]').empty();
        }
    });
});