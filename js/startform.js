$(document).ready(function() {
    $GoToPage = function ($pageNumber) {

            $('.form_page').fadeOut(250);
            $('.form_page').eq($pageNumber).delay(250).fadeIn(250);

    };

    $GoToPage(0);

    $('#versturen').click(function () {
        $GoToPage(1);
        $opleiding = "Media developer";
        if ($("input[name*='uw_naam']").val() != "" && $("input[name*='uw_email']").val() != "" && $("input[name*='email_mentor']").val() != "") {
            $.post('/php/mailSendToMentor.php', {
                email_mentor: $("input[name*='email_mentor']").val(),
                uw_email: $("input[name*='uw_email']").val(),
                naam: $("input[name*='uw_naam']").val(),
                opleiding: $opleiding
            });
        }
    });









});