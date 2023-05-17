let nameError = document.getElementById("name-error");
let surnameError = document.getElementById("surname-error");
let emailError = document.getElementById("email-error");
let passwordError = document.getElementById("password-error");
let passwordConfirmError = document.getElementById("password-error");
let nameActivityError = document.getElementById("name-activity-error");
let addressError = document.getElementById("address-error");
let telephoneError = document.getElementById("telephone-error");
let pIvaError = document.getElementById("p_iva-error");

var regNew = new RegExp(/^([^0-9]*)$/);
var regContainsNumber = new RegExp(/\d/);
var regSpecialCharacter = new RegExp(/^\!\@\#\$\%\^\&\*\)\(+\=\._-]+$/);

function validateForm() {
    // Validate Per Il NOME
    let name = document.getElementById("name").value;
    let nameBorder = document.getElementById("name");

    if (name.length == 0) {
        nameBorder.style.borderColor = "red";
        nameError.innerHTML = 'Il nome è obbligatorio <i class="bi bi-exclamation-circle"></i>';
        return false;
    }

    if (!regNew.test(name) && !regContainsNumber.test(name)) {
        nameBorder.style.borderColor = "red";
        nameError.innerHTML = 'Il nome non può contenere numeri <i class="bi bi-exclamation-circle"></i>';
        return false;
    }

    if (name.length >= 255) {
        nameBorder.style.borderColor = "red";
        nameError.innerHTML = 'Il nome non può superare i 255 caratteri <i class="bi bi-exclamation-circle"></i>';
        return false;
    }

    if (!regSpecialCharacter.test(name)) {
        nameBorder.style.borderColor = "red";
        nameError.innerHTML = 'Il nome non può contenere caratteri speciali <i class="bi bi-exclamation-circle"></i>';
        return false;
    }

    // Validate per il COGNOME
    let surname = document.getElementById("surname").value;
    let surnameBorder = document.getElementById("surname");

    if (surname.length == 0) {
        surnameBorder.style.borderColor = "red";
        surnameError.innerHTML = 'Il cognome è obbligatorio <i class="bi bi-exclamation-circle"></i>';
        return false;
    }

    if (!regNew.test(surname) && !regContainsNumber.test(surname)) {
        surnameBorder.style.borderColor = "red";
        surnameError.innerHTML = 'Il cognome non può contenere numeri <i class="bi bi-exclamation-circle"></i>';
        return false;
    }

    if (surname.length >= 255) {
        surnameBorder.style.borderColor = "red";
        surnameError.innerHTML = 'Il cognome non può superare i 255 caratteri <i class="bi bi-exclamation-circle"></i>';
        return false;
    }

    if (!regSpecialCharacter.test(surname)) {
        surnameBorder.style.borderColor = "red";
        surnameError.innerHTML = 'Il cognome non può contenere caratteri speciali <i class="bi bi-exclamation-circle"></i>';
        return false;
    }

}
