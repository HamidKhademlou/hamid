var age = 20;
var name = "Ramin";
var boolean = true;
var myArray = [25, "ahmad", age, [1, 2], boolean];
// console.log(myArray)
// alert(name);
//************************************

/* 
comments
....
*/
age = age + 5;
age += 5;
// console.log(age)
console.log(5 + 9 + "5")
age = 20;
//*******************************************************
if (age > 35) {
    console.log(age);
} else if (age === 30) {
    console.log("name");
} else {
    console.log(myArray)
}
if (5 !== "5") {
    console.log(typeof age)
}
//***************************************************
for (var i = 1; i < 10; i += 2) {
    console.log(i)
}
//*************************************************
function sum(firstName, lastName) {
    var fullName = firstName + lastName;
    return fullName
}
console.log(sum("ali", "Ahmadi"))
var fullNameAndAge = sum("Ali", "ahmadi") + " " + age;
console.log(fullNameAndAge);
console.log(sum(10, 15));
//********************************************
var myDate = new Date;
console.log(myDate.getMonth())
// ==================================
var parameter = 1;
switch (parameter) {
    case 0:
        parameter = "case 0";
        console.log(parameter)
        break;
    case 1:
        parameter = 1;
        console.log("case 1")
        break;
    case 2:
        parameter = 2;
        console.log("case 2")
        break;
    case 3:
        parameter = 3;
        console.log("case 3")
        break;
    default:
        console.log("case default")
}
//****************************************************
var myString = "hello world!";
var sliced = myString.slice(1, 4);
console.log(sliced)

var myArray = [25, "ahmad", age, [1, 2], boolean];
myArray.push("salam")
console.log(myArray)

var poped = myArray.pop();
console.log(poped)

var spliced = myArray.splice(1, 3)
console.log(myArray)
console.log(spliced);

var firstNum = prompt("enter your number")
console.log(typeof Number(firstNum))

var myObject = {
    firstName: "Ramin",
    lastName: "Afhami",
    myfunc: function (input, a) {
        this.firstName = input;
        this.lastName = a;
    },
    getFullName: function name() {
        return this.firstName + this.lastName;
    }
}

var a = "salam";
myObject.myfunc(firstNum, a);
console.log(myObject)