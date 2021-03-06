$(document).ready(function() {

    //Load materialize items
        $('select').formSelect();
    $('.datepicker').datepicker({
        yearRange: 120,
    });

    $elem = $('.sidenav').sidenav();
    var instance = M.Sidenav.getInstance($elem);
    $( window ).resize(function() {

        if ($(window).width() >= 993) {
            $('.sidenav').css('transform', 'translateX(0)');

        } else {
            instance.close();
            $('.sidenav').css('transform', 'translateX(-110%)');

        }

    });

    $('.sidenav-trigger').click(function () {
        instance.open();
    });

    //checked on wich button you clicked and go's to that page number
    $('.menu-button').click(function () {
        $clickedNavElement = $('.menu-button').index(this);
        $GoToPage($clickedNavElement);
    });

    $("#leerweg_select").val($("#leerweg_select option:first").val());





    $finished = 0;


    //Go to spesific page function
    $GoToPage = function ($pageNumber) {

        if ($currentPage !== $pageNumber && $navClickable === 1 && $finished === 0) {
            $navClickable = 0;
            $currentPage = $pageNumber;

            $('.form_page').fadeOut(250);
            $('.form_page').eq($pageNumber).delay(250).fadeIn(250);

            $('.menu-button').css("background-color", "");
            $('.menu-button').eq($pageNumber).css("background-color", "#ececec");
            $goToPageTimeOut = setTimeout(function () {
                $navClickable = 1;
            }, 500);

            if ($pageNumber === 0 || $pageNumber <= 0) {
                $("#previous").addClass("disabled");
            } else {
                $("#previous").removeClass("disabled");
            }


            if ($pageNumber === $totalPages || $pageNumber >= $totalPages) {
                $("#next").addClass("disabled");
            } else {
                $("#next").removeClass("disabled");
            }
        }

    };

    $navClickable = 1;
    $currentPage = null;
    $totalPages = $(".menu-button").length - 1;

    //Start page
    $GoToPage(0);




//All code for NEXT click button

    //Next button function - Go's to the next page
    $('#next').click(function () {
        $newpage = $currentPage + 1;
        if ($newpage >= $currentPage && $navClickable === 1){
            $GoToPage($newpage);
        }
    });



//All code for PREVIOUS click button

    //Previous button function - Go's to the previous page
    $('#previous').click(function () {
        $newpage = $currentPage - 1;
        if ($newpage <= $currentPage && $navClickable === 1){
            $GoToPage($newpage);
        }
    });


// All code for nav menu

    // nav menu top avatar image & image upload
    $changeImage = function(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function (e) {
                $('.user-image').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    };

    $("#uploadImage").change(function(){
        $changeImage(this);
    });



    // nav menu top name: changes name when it is changed
    $('#form_firstname').change(function () {
        $("#nav-name").fadeOut(function () {

            if ($('#form_firstname').val() == "") {
                $(this).text("Mediacollege Amsterdam");
            } else {
                $(this).text($('#form_firstname').val());
            }
        }).fadeIn();
    });


//    Image upload
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.user-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });


// "opleiding" form tab
    $vorige_leerweg_select = null;
    $('#leerweg_select').change(function () {
        $leerweg_select = $('#leerweg_select').val();

        if ($vorige_leerweg_select !== $leerweg_select) {
            $('.leerweg_input_page').slideUp(250);

            if($leerweg_select !== "") {
                $('.leerweg_input_page').eq($leerweg_select).slideDown(250);
            }
        }
        $vorige_leerweg_select = $leerweg_select;

    });

    $('input[name="mvi_radio"]').change(function () {
        $mvi_radio_value = $('input[name="mvi_radio"]:checked').val();
        if ($mvi_radio_value === "1") {
            $('.mvi_radio-tab').slideDown();
        } else {
            $('.mvi_radio-tab').slideUp();
        }
    });




//    "bijzonderheden" form tab
    $('#toggle_box').change(function () {
        $toggle_box = $('#toggle_box').is(":checked");

        if ($toggle_box === true) {
            $('#toggle_box2').slideDown();
            $('#input_zorg1').addClass("activeInputField");
        } else {
            $('#toggle_box2').slideUp();
            $('#input_zorg1').removeClass("activeInputField");
        }

    });



    $('#leerweg_select').change(function () {
        $leerweg_select_val = $('#leerweg_select').val();
        $mvi_radio_value2 = $('input[name="mvi_radio"]:checked').val();

        $('.form_check_leerweg_input').removeClass("activeInputField");

        if ($leerweg_select_val === "0") {

            if ($mvi_radio_value2 === "1") {
                $('#mvi_explanation').addClass("activeInputField");
            } else {
                $('#mvi_explanation').removeClass("activeInputField");
            }
            $('#diploma_date').addClass("activeInputField");

        } else if ($leerweg_select_val === "1") {
            $(".leerweg_input_page").eq(1).find('.form_check_leerweg_input').addClass("activeInputField");
        }
    });


    $('input[name="mvi_radio"]').change(function () {
        $mvi_radio_value2 = $('input[name="mvi_radio"]:checked').val();
        if ($mvi_radio_value2 === "1") {
            $('#mvi_explanation').addClass("activeInputField");
        } else {
            $('#mvi_explanation').removeClass("activeInputField");
        }
    });






    $('#toggle_box').change(function () {
        $toggle_box_value2 = $('#toggle_box').is(":checked");
            if ($toggle_box_value2 === true) {
                $('#input_zorg1').addClass("activeInputField");
            } else {
                $('#input_zorg1').removeClass("activeInputField");
            }
    });


$('.activeInputField').change(function () {
    if ($(this).val() !== false && $(this).val() != null && $(this).val() !== "none" && $(this).val() !== "false" && $(this).val() !== "") {
        $(this).removeClass("invalid");
    }
});


$invalidHighlichtMenu = function($pageid) {
$('.menu-button').eq($pageid).addClass("invalid_highlighted");
$('.form_page_invalid').eq($pageid).slideDown();
};

$pageInvalid = function($pageid) {
    if ($pageToGo == null) {
        $pageToGo = $pageid;
        $GoToPage($pageToGo);
    }
};

$checkTheForm = function () {
    $feedbackSend = true;
    $('.form_page_invalid').slideUp();
    $pageToGo = null;
    $totalinputfields = $('.activeInputField').length;
    $totalform_pages = $('.form_page').length;
    $('.invalid').removeClass("invalid");
    $('.invalid_highlighted').removeClass("invalid_highlighted");
    $invalidCounter = null;
    $counterswichinput =0;


    for (var a = 0; a < $totalform_pages; a++) {
        $totalInputsInDiv = $('.form_page').eq(a).find('.activeInputField');
        $invalidField = 0;
        $totalInputsInDiv.each(function () {

            if ($(this).val() == false || $(this).val() == null || $(this).val() == "none" || $(this).val() == "false" || $(this).val() == "") {
                $invalidHighlichtMenu(a);
                $(".activeInputField").eq($counterswichinput).addClass("invalid");
                $pageInvalid(a);
                $feedbackSend = false;
            }
            $counterswichinput++;
        });

    }

    //opleiding tab
    if ($('#leerweg_select').val() == null) {
        $invalidHighlichtMenu(1);
        $pageInvalid(1);
        $feedbackSend = false;
    }


//    indruk op school tab
    if (!$("input[name='Consentratie_radio_button']:checked").val() ||
        !$("input[name='Werktempo_radio_button']:checked").val() ||
        !$("input[name='ZelfstandigWerken_radio_button']:checked").val() ||
        !$("input[name='Motivatie_radio_button']:checked").val() ||
        !$("input[name='Doorzettingsvermogen_radio_button']:checked").val() ||
        !$("input[name='Vaardigheden_radio_button']:checked").val() ||
        !$("input[name='SocialeVaardigheden_radio_button']:checked").val()) {
        $invalidHighlichtMenu(2);
        $pageInvalid(2);
        $feedbackSend = false;
    }

return $feedbackSend;
};

$switchToText = function(param) {
  if (param == 0) {
      return "nee";
  }  else if (param == 1) {
      return "ja";
  }
};


    var string = "";
    $makeaJson = function(name, value) {
        if (value == "") {
            value = "geen opgegeven";
        }
        string += "&" + encodeURI(name) +"=" + encodeURI(value);


    };

//form fully completed script
$('#sendbutton').click(function () {
    if ($checkTheForm()) {
        $('.form_page').fadeOut(250);
        $('.form_send_page').eq(0).delay(250).fadeIn(250);
        $('button').addClass("disabled");
        $('.btn-small').addClass("disabled");
        $finished = 1;

        string += "?" + encodeURI("Voornaam") +"=" + encodeURI($('#form_firstname').val());
        // $makeaJson("Voornaam", $('#form_firstname').val());
        $makeaJson("Geboorte datum", $('#birthdate_student').val());
        $makeaJson("Leerweg", $( "#leerweg_select option:selected" ).text());
        $makeaJson("Niveau", $('#select_niveau').val());
        $makeaJson("Sector", $('#select_sector').val());
        $makeaJson("MVI", $('input[name=mvi_radio]:checked').val());
        $makeaJson("MVI toelichting", $('#mvi_explanation').val());
        $makeaJson("Diploma", $('#select_diploma-vmbo').val());
        $makeaJson("Diploma datum", $('#diploma_date').val());
        $makeaJson("Diploma1", $('#select_diploma-havo-vwo').val());
        $makeaJson("Diploma datum1", $('#date-diploma-havo-vwo').val());
        $makeaJson("Overgangsbewijs jaar", $('#input_year1').val());
        $makeaJson("Naar jaar", $('#input_year2').val());
        $makeaJson("Lerweg1", $('#select_leerweg').val());
        $makeaJson("Opleidings niveau", $('#select_opleidingsniveau').val());
        $makeaJson("Consentratie", $('input[name=Consentratie_radio_button]:checked').val());
        $makeaJson("Werktempo", $('input[name=Werktempo_radio_button]:checked').val());
        $makeaJson("Zelfstandig werken", $('input[name=ZelfstandigWerken_radio_button]:checked').val());
        $makeaJson("Motivatie", $('input[name=Motivatie_radio_button]:checked').val());
        $makeaJson("Doorzettingsvermogen", $('input[name=Doorzettingsvermogen]:checked').val());
        $makeaJson("Vaardigheden", $('input[name=Vaardigheden_radio_button]:checked').val());
        $makeaJson("Sociale vaardigheden", $('input[name=SocialeVaardigheden_radio_button]:checked').val());
        $makeaJson("Indruk toelichting", $('#input_toelichting').val());
        $makeaJson("Speciaal onderwijs", $switchToText($('#check1').is(":checked")));
        $makeaJson("Dyslexie", $switchToText($('#check2').is(":checked")));
        $makeaJson("Dyscalculie", $switchToText($('#check3').is(":checked")));
        $makeaJson("Extern zorg", $switchToText($('#check4').is(":checked")));
        $makeaJson("Andere zorg", $switchToText($('#toggle_box').is(":checked")));
        $makeaJson("Andere zorg Toelichting", $('#input_zorg1').val());
        $makeaJson("naam mentor", $('#naam_mentor').val());
        $makeaJson("gender mentor", $('#gender_mentor').val());
        $makeaJson("functie mentor", $('#functie_mentor').val());
        $makeaJson("email mentor", $('#email_mentor').val());
        $makeaJson("naam school", $('#naam_School_mentor').val());
        $makeaJson("plaats mentor", $('#plaats_mentor').val());
        $makeaJson("telefoon mentor", $('#telefoon_mentor').val());
        $makeaJson("Telefoon contact gewenst", $('#telefonisch_contact_mentor').val());
        $makeaJson("uw_email", $uw_email);
        $makeaJson("send_email", "1");

        // string += "Telefoon contact gewenst:" + $('#telefonisch_contact_mentor').val();
        $.post('/php/sendFormFeedback.php' + string);
    }
});


});