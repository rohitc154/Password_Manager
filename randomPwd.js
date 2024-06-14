let tOfChar;
let noChar;
function getChar() {
    noChar = document.querySelector('#noOfCharacter').value;
    // return noChar;
    console.log(noChar);
}
let pwd;
function typeChar() {
    var dropdown = document.getElementById("typeOfChar");
    var selectedValue = dropdown.options[dropdown.selectedIndex].value;
    if (selectedValue == "numeric") {
        pwd = generateRandomNumber(noChar);
        // console.log(pwd);
        document.querySelector("#genpwwd").innerHTML = pwd;

    } else if (selectedValue == "alphanumeric") {
        pwd = generateRandomAlphanumeric(noChar);
        // console.log(pwd);
        document.querySelector("#genpwwd").innerHTML = pwd;

    }
    else {
        pwd = generateRandomAlphanumericSpecial(noChar);
        // console.log(pwd);
        document.querySelector("#genpwwd").innerHTML = pwd;

    }
}

// function generate() {
//     console.log("Generate called!");
//     document.querySelector("#genpwwd").innerHTML = pwd;
// }

// Generating Number Random Character

function generateRandomNumber(val) {
    let randomNumber = '';
    const characters = '0123456789';
    const charactersLength = characters.length;

    for (let i = 0; i < val; i++) {
        randomNumber += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return randomNumber;
}

// Generating Alphanumeric Random Character

function generateRandomAlphanumeric(val) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const charactersLength = characters.length;

    for (let i = 0; i < val; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

// Generating Alphanumeric and Special Random Character

function generateRandomAlphanumericSpecial(val) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$*&^%';
    const charactersLength = characters.length;

    for (let i = 0; i < val; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

// // Example usage:
// const randomAlphanumeric = generateRandomAlphanumericSpecial();
// const randomAlphanumeric = generateRandomAlphanumeriSpecial();
// console.log(randomAlphanumeric);
