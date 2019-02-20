/*
 * Question 1
 */
console.log('\n# Question  1:');

function isPrime(number) {
    if (number < 2) {
        return false
    }
    if (number == 2) {
        return true;
    }
    for (let i = 2; i < (number / 2 + 1); i++) {
        if (number % i == 0) {
            return false;
        }
    }
    return true;
}

var number = 4
console.log("num:", number, "isPrime:", isPrime(number));


/*
 * Question 2
 */
console.log('\n# Question  2:');

function printPrimes(untilNumber) {
    for (let i = 1; i <= untilNumber; i++) {
        if (isPrime(i)) {
            console.log(i, "is a prime number");
        }
    }
}

var untilNumber = 20;
console.log("Printing prime numbers until: ", untilNumber);
printPrimes(untilNumber);


/*
 * Question 3
 */
console.log('\n# Question  3:');

function getCurrentMonthName() {
    let myDate = new Date;
    let monthNumber = myDate.getMonth();
    let monthName = '';
    switch (monthNumber) {
        case 1:
            monthName = 'January';
            break;
        case 2:
            monthName = 'February';
            break;
        case 3:
            monthName = 'March';
            break;
        case 4:
            monthName = 'April';
            break;
        case 5:
            monthName = 'May';
            break;
        case 6:
            monthName = 'June';
            break;
        case 7:
            monthName = 'July';
            break;
        case 8:
            monthName = 'August';
            break;
        case 9:
            monthName = 'September';
            break;
        case 10:
            monthName = 'October';
            break;
        case 11:
            monthName = 'November';
            break;
        case 12:
            monthName = 'December';
            break;
        default:
            monthName = 'Not Defined';
            break;
    }
    return monthName;
}

console.log('Current Month Name:', getCurrentMonthName());

/*
 * Question 4
 */
console.log('\n# Question  4:');

function findMiddle(str) {
    if (str.length < 3 || str.length % 2 == 0) {
        return 'Less than 3 chars or not odd length';
    }
    return str.substr((str.length - 1) / 2 - 1, 3);
}

var str = '123str456';
console.log("Input:", str, "Middle 3 chars: ", findMiddle(str));

/*
 * Question 5
 */
console.log('\n# Question  5:');

function capitalize(str) {
    return str
        .toLowerCase()
        .split(' ')
        .map(word => word.charAt(0).toUpperCase() + word.substr(1))
        .join(' ');
}

var str = 'neVer giVE up';
console.log("Input:", str, "capitalize: ", capitalize(str));


/*
 * Question 6
 */
console.log('\n# Question  6:');

var calculator = {
    num1: 2,
    num2: 3,
    read: function () {
        this.num1 = prompt("#6 Calcualtor, First Number: ", 2);
        this.num2 = prompt("#6 Calcualtor, Second Number: ", 3);
    },
    sum: function () {
        return Number(this.num1) + Number(this.num2);
    },
    mul: function () {
        return Number(this.num1) * Number(this.num2);
    }
}

// calculator.read();
console.log('Calculator Results', calculator.num1, 'and', calculator.num2,
    'sum:', calculator.sum(), 'mul:', calculator.mul());

/*
 * Question 7
 */
console.log('\n# Question  7:');

function similarFinder(first, second) {

    // var result = Array();
    var result = new Set();

    // Add similar elements to the result
    first.forEach(firstElement => {
        second.forEach(secondElement => {
            if (firstElement === secondElement) {
                result.add(firstElement); // Add to Set
                // result.push(firstElement); // Push to Array
            }
        });
    });

    return Array.from(result); // Convert Set to Array
    // Remove similar resutls
    // return result.filter( (element, index, array) => array.indexOf(element) === index );
}

var first = ["ali", "reza", 1, 1];
var second = ["ali", true, 1, 100];
var result = similarFinder(first, second);
console.log('first:', first, 'second:', second, '\nsimilarFinder:', result);
// ===> result = ["ali", 1];

/*
 * Question 8
 */
console.log('\n# Question  8:');

function checkStatus() {
    var a = prompt('#8 if to switch; a:', 0);
    switch (a) {
        case 0:
        case '0':
            alert(0);
            break;
        case 1:
        case '1':
            alert(1);
            break;
        case 2:
        case 3:
        case '2':
        case '3':
            alert('2,3');
            break;
        default:
            alert('output for this input is not defined');
            break;
    }
}

// checkStatus();

/*
 * Question 9
 */
console.log('\n# Question  9:');

function browserStatus(browser) {
    if (browser == 'Edge') {
        return ("You've got the Edge!");
    } else if (browser == 'Chrome' || browser == 'Firefox' || browser == 'Safari' || browser == 'Opera') {
        return ('Okay we support these browsers too');
    } else {
        return ('We hope that this page looks ok!');
    }
}

var browser = 'Firefox';
console.log("Input:", browser, "\nOut:", browserStatus(browser));


/*
 * Question 10
 */
console.log('\n# Question 10:');

var personData = {
    person1: {
        uid: 112233,
        city: "isfahan",
        postalCode: 2345672345,
        phoneNumber: "03111234234",
        position: "ui designer"
    },
    person2: {
        uid: 223344,
        city: "abhar",
        postalCode: 3345673232,
        phoneNumber: "04111334452",
        position: "analyzer"
    },
    person3: {
        uid: 334455,
        city: "rasht",
        ostalCode: 9945643232,
        phoneNumber: "01131394855",
        position: "ui designer"
    },
    person4: {
        uid: 445566,
        city: "mashad",
        postalCode: 5545689232,
        phoneNumber: "04121334415",
        position: "ui designer"
    },
    peson5: {
        uid: 556677,
        city: "semnan",
        postalCode: 774565392,
        phoneNumber: "09331334225",
        position: "analyzer"
    },
    person6: {
        uid: 667788,
        city: "shiraz",
        postalCode: 7845482232,
        phoneNumber: "07771333455",
        position: "php programmer"
    },
    person7: {
        uid: 778899,
        city: "zahedan",
        postalCode: 1145119212,
        phoneNumber: "01221399450",
        position: "ux designer"
    },
    person8: {
        uid: 889900,
        city: "qom",
        postalCode: 8845383233,
        phoneNumber: "08121320452",
        position: "node programmer"
    },
    person9: {
        uid: 990011,
        city: "ahvaz",
        postalCode: 2242689035,
        phoneNumber: "02211783452",
        position: "ux designer"
    },
    person10: {
        uid: 113344,
        city: "arak",
        postalCode: 1145129244,
        phoneNumber: "01221334665",
        position: "java programmer"
    }
}


var additionalPersonData = {
    person11: {
        uid: 223344,
        firstName: "amirhosein",
        lastName: "kazemi"
    },
    person12: {
        uid: 112233,
        firstName: "reza",
        lastName: "hosseini"
    },
    person13: {
        uid: 334455,
        firstName: "soheil",
        lastName: "hosein"
    },
    person14: {
        uid: 445566,
        firstName: "shahriar",
        lastName: "ahmadi gol"
    },
    person15: {
        uid: 556677,
        firstName: "ahamad",
        lastName: "rezai"
    },
    person16: {
        uid: 667788,
        firstName: "mohammadhadi",
        lastName: "soleimani"
    },
    person17: {
        uid: 778899,
        firstName: "mohsen",
        lastName: "zare"
    },
    person18: {
        uid: 889900,
        firstName: "mahdi",
        lastName: "mohseni nasab"
    },
    person19: {
        uid: 990011,
        firstName: "milad",
        lastName: "rabbani"
    },
    person20: {
        uid: 113344,
        firstName: "ali",
        lastName: "ahmadi"
    }
}

var result = Array();
for (const key in personData) {
    if (personData[key].hasOwnProperty('uid')) {
        result[personData[key].uid] = personData[key];
    }
}
for (const key in additionalPersonData) {
    if (additionalPersonData[key].hasOwnProperty('uid')) {
        const element = additionalPersonData[key];
        for (const propery in element) {
            result[additionalPersonData[key].uid][propery] = element[propery];
        }
    }
}

result.sort();
console.log(result);


/* ===> result = [
     {
      uid: 112233,
      firstName: "reza",
      lastName: "hosseini"
      city: "isfahan",
      postalCode: 2345672345,
      phoneNumber: "03111234234",
      position: "ui designer"
    },
    {
      uid: 223344,
      firstName: "amirhosein",
      lastName: "kazemi"
      city: "abhar",
      postalCode: 3345673232,
      phoneNumber: "04111334452",
      position: "analyzer"
    },
    .
    .
    . 
  ]

*/



/*
 * Question 11
 */
console.log('\n# Question 11:');

function sortByLength(array) {
    return array.sort((word1, word2) => word1.length - word2.length);
}

var input = ["ali", "ahmad", "reza", "mohamadreza", "farhad"];
console.log('input:', input);
var out = sortByLength(input);
// out = ["ali", "reza", "ahmad", "farhad", "mohamadreza"];
console.log('sortByLength', out);


/*
 * Question 12
 */
console.log('\n# Question 12:');

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min; //The maximum is exclusive and the minimum is inclusive
}


function randomCapitalize(str) {
    let randomNumber = getRandomInt(1, 11);
    // randomNumber = 3;
    console.log('Random Number:', randomNumber);
    let spaceCounter = 0;
    return str.toLowerCase()
        .split('')
        .map( (value, index) => {
            if (value == ' ') {
                spaceCounter++;
            }
            return ((index+1-spaceCounter)%randomNumber == 0) ? value.toUpperCase() : value;
        }).join('');
}

var str = "never give up and keep going";
// ===> neVer GivE up And KeeP goIn
console.log('str:', str, '\nrandomCapitalize:', randomCapitalize(str));