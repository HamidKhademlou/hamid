M.AutoInit();

function validateForm() {
    var username = ["ahmad", "reza", "ali"]
    var x = document.getElementById("username").value;
    var y = document.getElementById("password").value;
    var z = document.getElementById("confirm").value;
    if (x == "") {
        document.getElementById("usernamealert").innerHTML = "username must be filled out";
        document.getElementById("usernamealert").style.color = "red";
    } else if (username.includes(x)) {
        document.getElementById("usernamealert").innerHTML = "this username allredy exist"
        document.getElementById("usernamealert").style.color = "red";
    } else {
        document.getElementById("usernamealert").innerHTML = "ok"
        document.getElementById("usernamealert").style.color = "green";
    }

    if (y.length < 5) {
        document.getElementById("passwordalert").innerHTML = "must be at least 5 charachter!"
        document.getElementById("passwordalert").style.color = "red";
    } else {
        document.getElementById("passwordalert").innerHTML = "ok"
        document.getElementById("passwordalert").style.color = "green";
    }

    if (z !== y) {
        document.getElementById("confirmalert").innerHTML = "password and confirm password not match";
        document.getElementById("confirmalert").style.color = "red";
    }
    return false;

}
document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, options);
});
// document.addEventListener('DOMContentLoaded', function() {
//     var elems=document.querySelector('.tab-target');
//     document.getElementById('start-help').onclick= function(){
//     var elems = document.querySelectorAll('.tap-target');
//     var instances = M.TapTarget.init(elems, options);

//   });