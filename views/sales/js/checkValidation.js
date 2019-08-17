// here we check the input fields
$(function () {
    $(':submit').on('click', function(e) {
        var fail = false;

        if ($("#personalnumber").val() == '') {
            $("#personalnumber").addClass("required");
            fail = true;
        } else {
            $("#personalnumber").removeClass("required");
        }
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
        if ($("#category").val() == '') {
            $("#category").addClass("required");
            fail = true;
        } else {
            $("#category").removeClass("required");
        }
        if ($("#absence").val() == '') {
            $("#absence").addClass("required");
            fail = true;
        } else {
            $("#absence").removeClass("required");
        }
        if ($("#login").val() == '') {
            $("#login").addClass("required");
            fail = true;
        } else {
            $("#login").removeClass("required");
        }
        if (!$(this).hasClass('edit') ||
            ($(this).hasClass('edit') && $('#password').val() != ''))
        {
            if ($("#password").val() == '') {
                $("#password").addClass("required");
                fail = true;
            } else {
                $("#password").removeClass("required");
            }
        }
        if ($("#role").val() == '') {
            $("#role").addClass("required");
            fail = true;
        } else {
            $("#role").removeClass("required");
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