/**
 * Created by Ramin on 9/25/17.
 */
console.log(document.getElementsByTagName("button")[0]);
document.getElementById("demo").style.color = "red";
document.getElementById("add").onclick = function add() {
    var result =
        Number(document.getElementsByTagName("input")[0].value) +
        Number(document.getElementsByTagName("input")[1].value);
    console.log(typeof document.getElementsByTagName("input")[0].value)
    document.getElementById("demo").innerHTML = result;
}
var node = document.createElement("P");
var textnode = document.createTextNode("Water");
node.appendChild(textnode);
document.getElementById("demo").appendChild(node);


// var array=[];
// function add(){
//     array.push(document.getElementById("input").value);
//     console.log(array);
// }

// function display(){
//     document.getElementById("demo").innerHTML = "";
//     for(var i=0;i<array.length;i++){
//         document.getElementById("demo").innerHTML += "Element " + i + " = " + array[i] +'<br>' ;

//     }
// }
// function reset(){
//     document.getElementById("demo").innerHTML = "" ;
//     array=[]

// }