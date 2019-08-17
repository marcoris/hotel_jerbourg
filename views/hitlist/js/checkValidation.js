// here we check the input fields
$(function () {
    $(':submit').on('click', function(e) {
        var fail = false;

        if ($("#line_name").val() == '') {
            $("#line_name").addClass("required");
            fail = true;
        } else {
            $("#line_name").removeClass("required");
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