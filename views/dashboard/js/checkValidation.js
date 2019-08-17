// here we check the input fields
$(function () {
    $(':submit').on('click', function(e) {
        var fail = false;

        if ($("#date").val() == '') {
            $("#date").addClass("required");
            fail = true;
        } else {
            $("#date").removeClass("required");
        }
        if ($("#train_nr").val() == '') {
            $("#train_nr").addClass("required");
            fail = true;
        } else {
            $("#train_nr").removeClass("required");
        }
        if ($("#line").val() == '') {
            $("#line").addClass("required");
            fail = true;
        } else {
            $("#line").removeClass("required");
        }
        if ($("#lok").val() == '') {
            $("#lok").addClass("required");
            fail = true;
        } else {
            $("#lok").removeClass("required");
        }
        if ($("#kont").val() == '') {
            $("#kont").addClass("required");
            fail = true;
        } else {
            $("#kont").removeClass("required");
        }
        if ($("#locomotive").val() == '') {
            $("#locomotive").addClass("required");
            fail = true;
        } else {
            $("#locomotive").removeClass("required");
        }
        if ($("#waggons").val() == '') {
            $("#waggons").addClass("required");
            fail = true;
        } else {
            $("#waggons").removeClass("required");
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