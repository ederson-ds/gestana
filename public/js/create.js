window.onload = function () {

    var data = JSON.parse($("#data").val());

    $('input').each(function () {
        if ($(this).attr("name")) {
            var input = $("#" + $(this).attr("name"));
            var error = data[$(this).attr("name") + "_error"];
            if (error) {
                input.addClass("invalid");
                $(input).parent().append(`
                    <div class="invalid-feedback" style="display: block;">
                    ` + error + `
                    </div>`);
            }
        }
    });

};
