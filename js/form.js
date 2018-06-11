$(document).ready(function() {

    //checked on wich button you clicked and go's to that page number
    $('.menu-button').click(function () {
        $clickedNavElement = $('.menu-button').index(this);
        $GoToPage($clickedNavElement);
    });

    //Go to spesific page function
    $GoToPage = function ($pageNumber) {

        if ($currentPage !== $pageNumber && $navClickable === 1) {
            $navClickable = 0;

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

        
        $currentPage = $pageNumber;
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

    // nav menu top avatar image
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



    // nav menu top name
    $('#Form_firstname').change(function () {
        $("#nav-name").fadeOut(function () {
            $(this).text($('#Form_firstname').val());
        }).fadeIn();
    });




});