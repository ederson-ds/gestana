window.onload = function () {
    if ($(window).width() <= 992) {
        $(".sidebar").css("display", "none");
        $(".content").css("margin-left", "0px");
        $("#checkbox-menu").prop("checked", true);
    }

    $(".hamburguer").on("click", function () {
        if ($(".hamburguer span:nth-child(1)").css("top") == "0px") {
            $(".sidebar").css("display", "none");
            $(".content").css("margin-left", "0px");
        } else {
            $(".sidebar").css("display", "block");
            $(".content").css("margin-left", "240px");
        }
    });

    // Sidebar menu
    $(".sidebar-menu > .treeview > a").on("click", function () {
        $treeView = $(this).parent();
        $treeView.toggleClass("active");
        $treeviewMenu = $treeView.find(".treeview-menu");
        $treeviewMenu.slideToggle();
        if ($treeView.hasClass("active")) {
            $(this).find("i").removeClass("fa-angle-left");
            $(this).find("i").addClass("fa-angle-down");
        } else {
            $(this).find("i").removeClass("fa-angle-down");
            $(this).find("i").addClass("fa-angle-left");
        }
    });
};
