// here we check the input fields
$(function () {
    $(':submit').on('click', function(e) {
        var fail = false;

        // if guest is not set
        if ($("#guest").val() == '') {
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
        } else {
            $("#salutation").removeClass("required");
            $("#firstname").removeClass("required");
            $("#lastname").removeClass("required");
            $("#birthday").removeClass("required");
            $("#identity").removeClass("required");
        }

        // check second guest if there was something inserted
        if ($("#guest2").val() == '' && $("#firstname2").val() != '') {
            if ($("#salutation2").val() == '') {
                $("#salutation2").addClass("required");
                fail = true;
            } else {
                $("#salutation2").removeClass("required");
            }
            if ($("#firstname2").val() == '') {
                $("#firstname2").addClass("required");
                fail = true;
            } else {
                $("#firstname2").removeClass("required");
            }
            if ($("#lastname2").val() == '') {
                $("#lastname2").addClass("required");
                fail = true;
            } else {
                $("#lastname2").removeClass("required");
            }
            if ($("#birthday2").val() == '') {
                $("#birthday2").addClass("required");
                fail = true;
            } else {
                $("#birthday2").removeClass("required");
            }
            if ($("#identity2").val() == '') {
                $("#identity2").addClass("required");
                fail = true;
            } else {
                $("#identity2").removeClass("required");
            }
        }

        // other required fields
        if ($("#room").val() == '') {
            $("#room").addClass("required");
            fail = true;
        } else {
            $("#room").removeClass("required");
        }
        if ($("#arrive").val() == '') {
            $("#arrive").addClass("required");
            fail = true;
        } else {
            $("#arrive").removeClass("required");
        }
        if ($("#depart").val() == '') {
            $("#depart").addClass("required");
            fail = true;
        } else {
            $("#depart").removeClass("required");
        }

        // if fail is true prevent from form submit
        if (fail) {
            e.preventDefault();
        }
    });

    // delete confirmation
    $(".delete").on('click', function(e){
        if (!confirm('Wirklich löschen?')) {
            e.preventDefault();
        }
    });

    // formatts the datepicker
    $("#birthday, #arrive, #depart, #birthday2").datepicker({
        dateFormat: 'dd.mm.yy',
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        firstDay: 1
    });
});