var age = 20;
var name = "ramin";
var boolean = true;
var myarr = [25, "hamid", age, [1, 2], boolean];
// console.log(myarr);
// age=  age + 5;
age += 5;
// console.log(age);
// alert(name);
// if (age > 35) {
//     console.log(age);

// } else if (age === 30) {
//     console.log(name);
// } else {
//     console.log(myarr);
// }
// if (5 !== "5") {
//     console.log(typeof name);
// }
// -------------
for (let i = 0; i < 10; i += 2) {
    // console.log(i);
}
//---------------------------------
function sum(firstname, lastname) {
    var fullname = firstname + " " + lastname;
    return fullname;
}
// console.log(sum("ali","khademlou"));
var fullnameandage = sum("ali", "khadem") + " " + age;
// console.log(fullnameandage);
// console.log(5+9+ "5");
// console.log(sum(10,15));
// --------------------------------
function prime(number) {
    var i = 0;
    for (var j = 1; j <= number; j++) {
        var num1;
        num1 = number % j;
        if (num1 == 0) {
            i = i + 1;
        }
    }
    if (i == 2) {
        return (number);
    } else {
        return false;
    }

}

function printprime(n) {
    var parr = [];
    for (var i = 2; i <= n; i++) {
        if (prime(i) !== false) {
            parr.push(prime(i));
        }
    }
    return parr;
}
// console.log(printprime(20));

// ================
// var param;
// switch(param){
//     case 0:
//     param=0
//     console.log(param)
//     break;

//     case 1:
//     param=1
//     console.log("case 1")
//     break;
//     default:
//     console.log("case default")
// }
// ===================
// var myDate = new Date;
// var a = ["فروردین", "ord", 3, 5, 8, 7]
// var spliced = a.splice(1, 3);
// console.log(a)



// switch(myDate.getMonth()){
//     case 1:
//     console.log("far")
//     break
//     case 2:
//     console.log("")
//     break
//     case 3:
//     break
//     case 4:
//     break
//     case 5:
//     break
//     case 6:
//     break
//     case 7:
//     console.log(a[2])
//     break
//     case 8:
//     break
//     case 9:
//     break
//     case 10:
//     break
//     case 11:
//     break
//     case 12:
//     break
// }

var str
// function string(str) {
//     var n = str.length;
//     if (n % 2 == 0) {
//         return "زوج";
//     } else {
//         var m = (n - 3) / 2;
//         var reformed = str.slice(m,m+3);
//         return reformed;
//     }
// }
// console.log(string("asdfghghghs"))

// function stringA(str) {
//     var strarr = str.split(" ");
//     for (var i = 0; i < strarr.length; i++) {
//         var sliceword = strarr[i].slice(0, 1)
//         strarr[i] = strarr[i].slice(1)
//         strarr[i] = sliceword.toUpperCase() + strarr[i];
//     }
//     return strarr.join(" ")
// }
// console.log(stringA("ali khadem"));

// var firstnum= prompt("enter number");
// console.log(firstnum);  



// var a={
//     name:"hamid",
//     family:"khademlou",
//     getfullname:function(){
//         return this.name+ this.family;
//     }
// }
// console.log(a)

var math={
num1: parseInt(prompt("enter number 1")),
num2: parseInt(prompt("enter number 2")),
sum: function(){
    return this.num1+this.num2
},
mul: function(){
    return this.num1*this.num2
}
}
console.log(math.sum())
console.log(math.mul())
