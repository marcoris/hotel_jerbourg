// here we check the input fields
$(function () {
    $(':submit').on('click', function(e) {
        var fail = false;

        if ($("#salutation").val() == '') {
            $("#salutation").addClass("required");
            fail = true;
        } else {
            $("#salutation").removeClass("required");
        }
        if ($("#firstname").val() == '') {
            $("#firstname").addClass("required");
            fail = true;
        } else {
            $("#firstname").removeClass("required");
        }
        if ($("#lastname").val() == '') {
            $("#lastname").addClass("required");
            fail = true;
        } else {
            $("#lastname").removeClass("required");
        }
        if ($("#birthday").val() == '') {
            $("#birthday").addClass("required");
            fail = true;
        } else {
            $("#birthday").removeClass("required");
        }
        if ($("#identity").val() == '') {
            $("#identity").addClass("required");
            fail = true;
        } else {
            $("#identity").removeClass("required");
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

    // formatts the datepicker
    $("#birthday").datepicker({
        dateFormat: 'dd.mm.yy',
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        firstDay: 1
    });
});