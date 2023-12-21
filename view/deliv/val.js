let nameInput = document.getElementById("name");
let numberInput = document.getElementById("number");
var letters = /^[A-Za-z]+$/;
var upperCaseLetters = /[A-Z]/g;
var lowerCaseLetters = /[a-z]/g;
var numbers = /[0-9]/g;
console.log(nameInput);

document.forms[0].onsubmit = function (e) {
    {

        if (!nameInput.value.match(letters) || nameInput.value.length < 3) {
            e.preventDefault();
            userValid = false;
            alert("The name must consist of letters only and its length must be greater than 2 letters");

        }
        else {
            userValid = true
        }
    }
    

   
    {
        if (numberInput.value.length <= 7 || numberInput.value.length >= 9) {
            e.preventDefault();
            numberValid = false;
            alert("The phone number must be 8 number ");
        }
        else {
            numberValid = true;
        }
    }


}