// here we check the input fields
$(function () {
    $(':submit').on('click', function(e) {
        var fail = false;

        if ($("#start_station").val() == '') {
            $("#start_station").addClass("required");
            fail = true;
        } else {
            $("#start_station").removeClass("required");
        }
        if ($("#end_station").val() == '') {
            $("#end_station").addClass("required");
            fail = true;
        } else {
            $("#end_station").removeClass("required");
        }

        if (fail) {
            e.preventDefault();
        }
    });
});