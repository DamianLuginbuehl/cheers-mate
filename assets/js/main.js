let loadPagination = function() {
    $(".postcard.page-1").addClass("visible");
    $(".pagination-button.page-1").addClass("active");
}

let loadCategories = function() {
    $(".category-list-all > li > a").addClass("category-transparent")
}

let changePage = function(page) {
    $(".postcard").removeClass("visible");
    $(".pagination-button").removeClass("active");
    $(".pagination-button.page-"+page).addClass("active");
    $(".postcard.page-"+page).addClass("visible");
}