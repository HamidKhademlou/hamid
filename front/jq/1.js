$(document).ready(function () {
    // $("#demo").html("hello world");
    // $("div").not(".green,#blueones").css("border-color", "red");
    // $("div").find("span").css({
    //     "color": "red",
    //     "border": "2px solid red"
    // });

    // $(".ho").hover(function () {
    //     $(this).css("background-color", "red")
    // }, function () {
    //     $(this).css("background-color", "blue")
    // });
    // $(".p").on({
    //     mouseenter: (function () {
    //             $(this).css("background-color", "red");
    //         },
    //         mouseleave: (function () {
    //                 $(this).css("background-color", "blue");
    //             }
    //         });
    // $(".ho").on("click",function () {
    //         $(this).append(" oooof.")
    //     });
    $(".fadein").click(function () {
        $(".ho").fadeIn();
    });
    $(".fadeout").click(function () {
        $(".ho").fadeOut();
    });

    $(".btnprogress").click(function () {
        var x = $(".progress-bar").width();
        var y = x + $("body").width() / 10;
        $(".progress-bar").width(y);
    });


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

});