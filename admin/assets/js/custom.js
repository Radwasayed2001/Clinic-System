$(document).ready(function(){
    $(document).on('click', '.delete-doctor-btn', function(e){
        e.preventDefault();
        var id = $(this).val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this doctor!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if(willDelete) {
            $.ajax({
                method: "POST",
                url:"code.php",
                data: {
                    'doctor_id':id,
                    'delete-doctor-btn':true
                },
                success: function(response){
                    if (response == 200) {
                        swal("Success!", "Doctor deleted successfully","success");
                        $('#doctors-table').load(location.href + " #doctors-table");
                    } else if (response == 500) {
                        swal("Error!", "Something went wrong", "error");

                    }
                }
            })}
          })
    
    });
    $(document).on('click', '.delete-major-btn', function(e){
        e.preventDefault();
        var id = $(this).val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this major!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if(willDelete) {
            $.ajax({
                method: "POST",
                url:"code.php",
                data: {
                    'major_id':id,
                    'delete-major-btn':true
                },
                success: function(response){
                    if (response == 200) {
                        swal("Success!", "Majors deleted successfully","success");
                        $('#majors-table').load(location.href + " #majors-table");
                    } else if (response == 500) {
                        swal("Error!", "Something went wrong", "error");

                    }
                }
            })}
          })
    
    })
    $(document).on('click', '.delete-booking-btn', function(e){
        e.preventDefault();
        var id = $(this).val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this booking!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if(willDelete) {
            $.ajax({
                method: "POST",
                url:"code.php",
                data: {
                    'booking_id':id,
                    'delete-booking-btn':true
                },
                success: function(response){
                    if (response == 200) {
                        swal("Success!", "Booking deleted successfully","success");
                        $('#bookings-table').load(location.href + " #bookings-table");
                    } else if (response == 500) {
                        swal("Error!", "Something went wrong", "error");

                    }
                }
            })}
          })
    
    })
    $(document).on('click', '.delete-contact-btn', function(e){
        e.preventDefault();
        var id = $(this).val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this contact!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if(willDelete) {
            $.ajax({
                method: "POST",
                url:"code.php",
                data: {
                    'contact_id':id,
                    'delete-contact-btn':true
                },
                success: function(response){
                    if (response == 200) {
                        swal("Success!", "Contact deleted successfully","success");
                        $('#contacts-table').load(location.href + " #contacts-table");
                    } else if (response == 500) {
                        swal("Error!", "Something went wrong", "error");

                    }
                }
            })}
          })
    
    })
})