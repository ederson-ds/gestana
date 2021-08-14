window.onload = function () {
    /* Toggle menu */
    $(".toggle").on("click", function () {
        let toggle = document.querySelector(".toggle");
        let navigation = document.querySelector(".navigation");
        let main = document.querySelector(".main");
        toggle.classList.toggle("active");
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    });

    /*Excluir*/
    $(".excluir").on("click", function () {
        var controllerName = $(this).attr("controllerName");
        $("#excluirSim").attr(
                "href",
                controllerName + "/excluir/" + $(this).attr("id")
                );
    });

    $("#buscar").on("click", function () {
        $(".form").append('<input type="hidden" name="offsetPages" value="3" />');
        $(".form").submit();
    });

    $("#refresh").on("click", function () {
        $(".form").append('<input type="hidden" name="registros" value="5" />');
        $(".form").append('<input type="hidden" name="buscar" value="" />');
        $(".form").append('<input type="hidden" name="offsetPages" value="3" />');
        $(".form").submit();
    });
    /*Table*/
    $("table > thead > tr > th").on("click", function () {
        if ($(this).text() == "Ações") {
            return;
        }
        var column = $(this).attr("column");
        $(".form").append(
                '<input type="hidden" name="orderBy" value="' + column + '" />'
                );
        column = $("table > thead > tr > th.active").attr("column");
        if (column) {
            $(".form").append(
                    '<input type="hidden" name="orderBy" value="" />'
                    );
        }
        $(".form").append('<input type="hidden" name="offsetPages" value="3" />');
        $(".form").submit();
    });

    $("#proximo").on("click", function () {
        var pagina = parseInt($(this).attr("pagina"));
        var offsetPages = parseInt($("#offsetPages").val());
        var numPaginas = $(this).attr("numPaginas");
        if (pagina == numPaginas)
            return;
        var column = $("table > thead > tr > th.active").attr("column");
        if (column) {
            $(".form").append(
                    '<input type="hidden" name="orderBy" value="' + column + '" />'
                    );
        }
        if (offsetPages == (pagina)) {
            $(".form").append(
                    '<input type="hidden" name="offsetPages" value="' + (offsetPages + 3) + '" />'
                    );
        }
        $(".form").append(
                '<input type="hidden" name="pagina" value="' + (pagina + 1) + '" />'
                );
        $(".form").submit();
    });

    $("#anterior").on("click", function () {
        var pagina = parseInt($(this).attr("pagina"));
        var offsetPages = parseInt($("#offsetPages").val());
        if (pagina == 1)
            return;
        var column = $("table > thead > tr > th.active").attr("column");
        if (column) {
            $(".form").append(
                    '<input type="hidden" name="orderBy" value="' + column + '" />'
                    );
        }
        if (offsetPages - 3 == (pagina - 1)) {
            $(".form").append(
                    '<input type="hidden" name="offsetPages" value="' + (offsetPages - 3) + '" />'
                    );
        }
        $(".form").append(
                '<input type="hidden" name="pagina" value="' + (pagina - 1) + '" />'
                );
        $(".form").submit();
    });

    $(".registros").on("change", function () {
        var column = $("table > thead > tr > th.active").attr("column");
        if (column) {
            $(".form").append(
                    '<input type="hidden" name="orderBy" value="' + column + '" />'
                    );
        }
        $(".form").append('<input type="hidden" name="offsetPages" value="3" />');
        $(".form").append('<input type="hidden" name="pagina" value="1" />');
        $(".form").submit();
    });

    $(".numPagina").on("click", function () {
        var pagina = $(this).attr("value");
        var column = $("table > thead > tr > th.active").attr("column");
        if (column) {
            $(".form").append(
                    '<input type="hidden" name="orderBy" value="' + column + '" />'
                    );
        }
        $(".form").append(
                '<input type="hidden" name="pagina" value="' + pagina + '" />'
                );
        $(".form").submit();
    });

    $(".offsetPageProximo").on("click", function () {
        var pagina = parseInt($(this).attr("value"));
        var column = $("table > thead > tr > th.active").attr("column");
        if (column) {
            $(".form").append(
                    '<input type="hidden" name="orderBy" value="' + column + '" />'
                    );
        }
        $(".form").append(
                '<input type="hidden" name="offsetPages" value="' + (pagina + 3) + '" />'
                );
        $(".form").append(
                '<input type="hidden" name="pagina" value="' + (pagina + 1) + '" />'
                );
        $(".form").submit();
    });

    $(".offsetPageAnterior").on("click", function () {
        var pagina = parseInt($(this).attr("value"));
        var offsetPages = parseInt($("#offsetPages").val());
        var column = $("table > thead > tr > th.active").attr("column");
        if (column) {
            $(".form").append(
                    '<input type="hidden" name="orderBy" value="' + column + '" />'
                    );
        }
        $(".form").append(
                '<input type="hidden" name="offsetPages" value="' + (offsetPages - 3) + '" />'
                );
        $(".form").append(
                '<input type="hidden" name="pagina" value="' + (offsetPages - 3) + '" />'
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
