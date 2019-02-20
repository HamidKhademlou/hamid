var person;
var data;
$.ajax({
    type: "GET",
    url: "https://api.myjson.com/bins/15b3zc",
    success: function (response) {
        person = response;
        // $("#person").html(response);
        $.ajax({
            type: "GET",
            url: "https://api.myjson.com/bins/12ziq0",
            success: function (response) {
                data = response;
                // $("#data").html(response);
                function merger(data, address) {
                    var merged = {};
                    var z = 0;
                    for (var x in data)
                        for (var y in address)
                            if (data[x].uid == address[y].uid) {
                                merged[z] = Object.assign(data[x], address[y]);
                                z++;
                            }
                    return merged;
                }
                result=merger(person,data);
                console.log(result);
                $("#table").append("<table class=\"table\"><thead class=\"thead-dark\"><tr><th scope=\"col\">Row</th><th scope=\"col\">uid</th><th scope=\"col\">Firstname</th><th scope=\"col\">Lastname</th><th scope=\"col\">City</th><th scope=\"col\">Postal Code</th><th scope=\"col\">Phone Number</th><th scope=\"col\">Position</th></tr></thead>");
                var i = 0;
                $.each(result, function (indexInArray, valueOfElement) {
                    i++
                    $(".table").append("<tr>");
                    $(".table").append("<td>" + i + "</td>");
                    $(".table").append("<td>" + valueOfElement.uid + "</td>");
                    $(".table").append("<td>" + valueOfElement.firstName + "</td>");
                    $(".table").append("<td>" + valueOfElement.lastName + "</td>");
                    $(".table").append("<td>" + valueOfElement.city + "</td>");
                    $(".table").append("<td>" + valueOfElement.phoneNumber + "</td>");
                    $(".table").append("<td>" + valueOfElement.position + "</td>");
                    $(".table").append("<td>" + valueOfElement.postalCode + "</td>");
                    $(".table").append("</tr>");
                });
                $("#table").append("</table>");

            }
        });
    }
});


// function loadDoc() {
//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function() {
//       if (this.readyState == 4 && this.status == 200) {
//        document.getElementById("demo").innerHTML = this.responseText;
//       }
//     };
//     xhttp.open("GET", "https://api.myjson.com/bins/q69s8", true);
//     xhttp.send();
//   }