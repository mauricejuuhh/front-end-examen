$(document).ready(function() {

    $('.menu-button').click(function () {
        $clickedNavElement = $('.menu-button').index(this);
        $GoToPage($clickedNavElement);
    });

    $navClickable = 1;
    $GoToPage = function ($pageNumber) {

        if ($currentPage != $pageNumber && $navClickable == 1) {
            $navClickable = 0;

            $('.form_page').fadeOut(250);
            $('.form_page').eq($pageNumber).delay(250).fadeIn(250);

            $('.menu-button').css("background-color", "");
            $('.menu-button').eq($pageNumber).css("background-color", "#ececec");
            $goToPageTimeOut = setTimeout(function () {
                $navClickable = 1;
            }, 500);
        }

        $currentPage = $pageNumber;

    };

    $currentPage = 1;
    $GoToPage(0);


    $('#next').click(function () {
        $newpage = $currentPage + 1;
        if ($newpage <= $currentPage && $navClickable == 1){
            $GoToPage($newpage);
        }
    });

    $('#previous').click(function () {
        $clickedNavElement = $('.menu-button').index(this);
        $GoToPage($clickedNavElement);
    });



});