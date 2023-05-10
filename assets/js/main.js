let urlSearchParams = new URLSearchParams(window.location.search)

$(document).ready(function () {
    if ($('input.wpcf7-form-control.button-red').length >= 1) {
        $('input.wpcf7-form-control.button-red').attr('onClick', 'changeValidationOutput()')
    }

    if (urlSearchParams.has('showMenu')) {
        $('.burger-toggle').toggleClass('burger-toggle--open')
        $('header').toggleClass('nav--open')
    }

    if(urlSearchParams.has('devMode')) {
        $("body").prepend('<button onClick="location.reload(true)" class="dev-panel">reload</button>');
    }


    $("ul#menu-social-media-navigation li a").attr('target', '_blank');
    $("ul#menu-social-media-navigation li a").attr('rel', 'noopener noreferrer');
});

let loadPagination = function () {
    $(".postcard.page-1").addClass("visible");
    $(".pagination-button.page-1").addClass("active");

    if (urlSearchParams.has('showAll')) {
        $(".pagination-button").addClass("invisible");
        $(".postcard").addClass("visible");
    }
}

let loadCategories = function () {
    $(".category-list-all > li > a").addClass("category-transparent")
}

let changePage = function (page) {
    $(".postcard").removeClass("visible");
    $(".pagination-button").removeClass("active");
    $(".pagination-button.page-" + page).addClass("active");
    $(".postcard.page-" + page).addClass("visible");
}

let changeValidationOutput = function () {
    setTimeout(updateResponse, 500)
}

let updateResponse = function () {
    $('.wpcf7-response-output').removeClass('red')
    $('.wpcf7-response-output').removeClass('green')

    if ($('.sent').length >= 1) {
        $('.wpcf7-response-output').addClass('green')
    }

    if ($('.wpcf7-not-valid').length >= 1) {
        $('.wpcf7-response-output').addClass('red')
    }
}

let toggleMenu = function () {
    $('.burger-toggle').toggleClass('burger-toggle--open')
    $('header').toggleClass('nav--open')
}