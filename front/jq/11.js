$(document).ready(function () {
    // 1
    $(".div1").hover(function () {
        $(this).css("background-color", "red")
    }, function () {
        $(this).css("background-color", "blue")
    });
    // 2
    $(".div2").on("click", function () {
        $(this).append(" click....")
    });
    // 3
    $(".fadein").click(function () {
        $(".div3").fadeIn();
    });
    $(".fadeout").click(function () {
        $(".div3").fadeOut();
    });
    // 4
    $(".b1div").slideUp(1);
    $(".b2div").slideUp(1);
    $(".b3div").slideUp(1);
    $(".b1").click(function () {
        $(".b1div").slideDown();
        $(".b2div").slideUp();
        $(".b3div").slideUp();
    });
    $(".b2").click(function () {
        $(".b1div").slideUp();
        $(".b2div").slideDown();
        $(".b3div").slideUp();
    });
    $(".b3").click(function () {
        $(".b1div").slideUp();
        $(".b2div").slideUp();
        $(".b3div").slideDown();
    });
    // 5
    $(".btnprogress").click(function () {
        var x = $(".progress-bar").width();
        var y = x + $("body").width() / 10;
        $(".progress-bar").width(y);
    });
    // 6
    $(".dpage").slideUp(1);
    $(".dlink").slideUp(1);
    $(".p").hover(function () {
        $(".dpage").slideDown();
    }, function () {
        $(".dpage").slideUp();
    });
    $(".l").hover(function () {
        $(".dlink").slideDown();
    }, function () {
        $(".dlink").slideUp();
    });

    // $("#demo").html("hello world");

    // $("div").find("span").css({
    //     "color": "red",
    //     "border": "2px solid red"
    // });

    // $("div").not(".green,#blueones").css("border-color", "red");



    // $(".p").on({
    //     mouseenter: (function () {
    //             $(this).css("background-color", "red");
    //         },
    //         mouseleave: (function () {
    //                 $(this).css("background-color", "blue");
    //             }
    //         });








});