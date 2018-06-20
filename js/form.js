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
            $('.sidenav').sidenav('draggable', false);
        } else {
            instance.close();
            $('.sidenav').css('transform', 'translateX(-110%)');
            $('.sidenav').sidenav('draggable', true);
        }

    });


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
    $('#Form_firstname').change(function () {
        $("#nav-name").fadeOut(function () {
            $(this).text($('#Form_firstname').val());
        }).fadeIn();
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
        } else {
            $('#toggle_box2').slideUp();
        }

    });

});