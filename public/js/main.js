window.onload = function () {
    $("#proximo").on("click", function () {
        var pagina = parseInt($(this).attr("pagina"));
        var numPaginas = $(this).attr("numPaginas");
        if (pagina == numPaginas) return;
        console.log((pagina + 1));
        $(".form").append(
            '<input type="hidden" name="pagina" value="' + (pagina + 1) + '" />'
        );
        $(".form").submit();
    });

    $("#anterior").on("click", function () {
        var pagina = parseInt($(this).attr("pagina"));
        if (pagina == 1) return;
        $(".form").append(
            '<input type="hidden" name="pagina" value="' + (pagina - 1) + '" />'
        );
        $(".form").submit();
    });

    $(".registros").on("change", function () {
        $(".form").append('<input type="hidden" name="pagina" value="1" />');
        $(".form").submit();
    });

    $(".numPagina").on("click", function () {
        var pagina = $(this).val();
        $(".form").append(
            '<input type="hidden" name="pagina" value="' + pagina + '" />'
        );
        $(".form").submit();
    });

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
