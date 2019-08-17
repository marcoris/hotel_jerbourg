// here we check the input fields
$(function () {
    $(':submit').on('click', function(e) {
        var fail = false;

        if ($("#number").val() == '') {
            $("#number").addClass("required");
            fail = true;
        } else {
            $("#number").removeClass("required");
        }
        if ($("#date_of_commissioning").val() == '') {
            $("#date_of_commissioning").addClass("required");
            fail = true;
        } else {
            $("#date_of_commissioning").removeClass("required");
        }
        if ($("#date_of_last_revision").val() == '') {
            $("#date_of_last_revision").addClass("required");
            fail = true;
        } else {
            $("#date_of_last_revision").removeClass("required");
        }
        if ($("#date_of_next_revision").val() == '') {
            $("#date_of_next_revision").addClass("required");
            fail = true;
        } else {
            $("#date_of_next_revision").removeClass("required");
        }
        if ($("#seating").val() == '') {
            $("#seating").addClass("required");
            fail = true;
        } else {
            $("#seating").removeClass("required");
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