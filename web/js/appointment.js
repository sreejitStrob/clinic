
var appointment = {
    patientSelect : function (e) {
        $.ajax({
            type: "GET",
            url: baseUrl + 'area/get-states',
            data: {
                'country_id': 1,
            },
            success: function (response)
            {

            },
            error: function (jqXHR, textStatus, errorThrown)
            {

            }
        });
    }
}