
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
                let data = JSON.parse(response);
                if (data.status == 200) {
                   let age = data.data.age;
                   let name = data.data.name;

                    $("#appointment-patient_name").val(name);
                    $("#appointment-age").val(age);

                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {

            }
        });
    },
    consultationDetails: function (consultationId) {
        $.ajax({
            type: "GET",
            url: baseUrl + 'appointment/consultation-details',
            data: {
                'id': consultationId
            },
            success: function (response)
            {
                let data = JSON.parse(response);
                if (data.status == 200) {
                     let amount = data.data.amount;
                    $("#appointment-amount").val(amount);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {

            }
        });
    }
}