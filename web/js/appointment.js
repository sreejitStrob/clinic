
var appointment = {
    patientSelect : function (patientId) {
        $.ajax({
            type: "GET",
            url: baseUrl + 'appointment/patient-details',
            data: {
                'id': patientId
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