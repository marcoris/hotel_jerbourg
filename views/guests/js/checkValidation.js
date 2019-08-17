// here we check the input fields
$(function () {
    $(':submit').on('click', function(e) {
        var fail = false;

        if ($("#station_name").val() == '') {
            $("#station_name").addClass("required");
            fail = true;
        } else {
            $("#station_name").removeClass("required");
        }
        if ($("#station_time").val() == '') {
            $("#station_time").addClass("required");
            fail = true;
        } else {
            $("#station_time").removeClass("required");
        }
        if ($("#station_sequence").val() == '') {
            $("#station_sequence").addClass("required");
            fail = true;
        } else {
            $("#station_sequence").removeClass("required");
        }
        if ($("#station_status").val() == '') {
            $("#station_status").addClass("required");
            fail = true;
        } else {
            $("#station_status").removeClass("required");
        }

        if (fail) {
            e.preventDefault();
        }
    });

    $(".delete").on('click', function(e){
        if (!confirm('Wirklich löschen?')) {
            e.preventDefault();
        }
    });
});