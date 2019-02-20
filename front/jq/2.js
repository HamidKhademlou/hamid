$(document).ready(function () {
    $("#login").click(function () {
        event.preventDefault()
        var username = ["ahmad", "reza", "ali"]
        var x = $("#username").val();
        var y = $("#password").val();
        var z = $("#confirm").val();
        if (x == "") {
            $("#usernamealert").html("username must be filled out");
            $("#usernamealert").css("color", "red");
        } else if (username.includes(x)) {
            $("#usernamealert").html("this username allredy exist");
            $("#usernamealert").css("color", "red");
        } else {
            $("#usernamealert").html("ok")
            $("#usernamealert").css("color", "green");
        }
        if (y == "") {
            $("#passwordalert").html("password must be filled out");
            $("#passwordalert").css("color", "red");
        }
        if (y.length < 5) {
            $("#passwordalert").html("must be at least 5 charachter!");
            $("#passwordalert").css("color", "red");
        } else {
            $("#passwordalert").html("ok");
            $("#passwordalert").css("color", "green");
            if (z == y) {
                $("#confirmalert").html("ok");
                $("#confirmalert").css("color", "green");
            } else {
                $("#confirmalert").html("password and confirm password not match");
                $("#confirmalert").css("color", "red");
            }
        }

        return false;
    })

});