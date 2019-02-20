$("button").click(function (e) {
    var idClicked = e.target.id;
    var buttonid = idClicked.split("-");
    var afterchangetext = $('#dropdownMenuButton' + buttonid[1]).html();
    var dropdownMenuButton = "dropdownMenuButton" + buttonid[1];

    if (buttonid[0] == "delete") {
        $.ajax({
            url: 'http://localhost/hamid/mvc/admin/delete/?id=' + buttonid[1],
            success: function (data) {
                $('#tr-' + buttonid[1]).remove();
            },
            type: 'GET'
        });
    }
    if (buttonid[0] == "Admin") {
        $.ajax({
            url: 'http://localhost/hamid/mvc/admin/access/?id=' + buttonid[1] + '&&typeuser=' + buttonid[0],
            success: function (data) {
                $('#' + dropdownMenuButton).html("Admin");
                $('#' + idClicked).html(afterchangetext)
                $('#' + idClicked).attr("id", afterchangetext + "-" + buttonid[1]);
            },
            type: 'GET'
        });
    }
    if (buttonid[0] == "normal") {
        $.ajax({
            url: 'http://localhost/hamid/mvc/admin/access/?id=' + buttonid[1] + '&&typeuser=' + buttonid[0],
            success: function (data) {
                $('#' + dropdownMenuButton).html("normal");
                $('#' + idClicked).html(afterchangetext);
                $('#' + idClicked).attr("id", afterchangetext + "-" + buttonid[1]);
            },
            type: 'GET'
        });
    }
    if (buttonid[0] == "notactive") {
        $.ajax({
            url: 'http://localhost/hamid/mvc/admin/access/?id=' + buttonid[1] + '&&typeuser=' + buttonid[0],
            success: function (data) {
                $('#' + dropdownMenuButton).html("notactive");
                $('#' + idClicked).html(afterchangetext);
                $('#' + idClicked).attr("id", afterchangetext + "-" + buttonid[1]);
            },
            type: 'GET'
        });
    }
});

$(document).ajaxStart(function () {
    $(".loader").css("display", "block");
});

$(document).ajaxComplete(function () {
    $(".loader").css("display", "none");
});