$("button").click(function (e) {
    var idClicked = e.target.id;
    var buttonid = idClicked.split("-");
    // var afterchangetext = $('#dropdownMenuButton' + buttonid[1]).html();
    // var dropdownMenuButton = "dropdownMenuButton" + buttonid[1];

    if (buttonid[0] == "delete") {
        $.ajax({
            url: 'http://localhost/hamid/mvc2/admin/delete/?postid=' + buttonid[1],
            success: function (data) {
                $('#post-' + buttonid[1]).remove();
                $('#line-' + buttonid[1]).remove();
            },
            type: 'GET'
        });
    }
});