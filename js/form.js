$(document).ready(function() {
    //Load materialize items
        $('select').formSelect();
        $('.datepicker').datepicker();


    //checked on wich button you clicked and go's to that page number
    $('.menu-button').click(function () {
        $clickedNavElement = $('.menu-button').index(this);
        $GoToPage($clickedNavElement);
    });

    //Go to spesific page function
    $GoToPage = function ($pageNumber) {

        if ($currentPage !== $pageNumber && $navClickable === 1) {
            $navClickable = 0;
            $currentPage = $pageNumber;

            $('.form_page').fadeOut(250);
            $('.form_page').eq($pageNumber).delay(250).fadeIn(250);

            $('.menu-button').css("background-color", "");
            $('.menu-button').eq($pageNumber).css("background-color", "#ececec");
            $goToPageTimeOut = setTimeout(function () {
                $navClickable = 1;
            }, 500);
        }

        
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


    };

    $navClickable = 1;
    $currentPage = null;
    $totalPages = $(".menu-button").length - 1;

    //Start page
    $GoToPage(1);


    
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
    $('#Form_firstname').change(function () {
        $("#nav-name").fadeOut(function () {
            $(this).text($('#Form_firstname').val());
        }).fadeIn();
    });




// "opleiding" form tab
    $vorige_leerweg_select = null;
    $('#leerweg_select').change(function () {
        $leerweg_select = $('#leerweg_select').val();

        if ($leerweg_select != null && $leerweg_select !== "" && $vorige_leerweg_select !== $leerweg_select) {
            $('.leerweg_input_page').fadeOut(250);
            $('.leerweg_input_page').eq($leerweg_select).delay(250).fadeIn(250);
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


});