$(document).ready(function() {
    $('#getPatients').click(function() {
        // Clear previous results if any
        console.clear();

        // Iterate over each patient row in the table
        $('#patientTable .patient-row').each(function() {
            // Get the patient ID from the data attribute
            var patientId = $(this).data('id');
            // Get the name from the second cell
            var patientName = $(this).find('td').eq(1).text();
            // Get the appointment date from the third cell
            var appointmentDate = $(this).find('td').eq(2).text();
            // Get the status from the fourth cell
            var status = $(this).find('td').eq(3).text();
            
            // Display the information in the console
            console.log('Patient ID: ' + patientId + ', Name: ' + patientName + ', Appointment Date: ' + appointmentDate + ', Status: ' + status);
        });
    });
});