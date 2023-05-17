jQuery('#register-form').validate({
    rules:
    {
        name: {
            required: true,
            maxlength: 255,
            lettersonly: true,
            specialcharacter: true,
        },
        surname: {
            required: true,
            maxlength: 255,
            lettersonly: true,
            specialcharacter: true,
        },
        email: {
            required: true,
            maxlength: 255,
            email: true
        },
        password: {
            required: true,
            rangelength: [8, 255]
        },
        password_confirmation: {
            required: true,
            rangelength: [8, 255],
            equalTo: "#password"
        },
        name_restaurant: {
            required: true,
            maxlength: 255,
        },
        address: {
            required: true,
            maxlength: 255,
        },
        telephone: {
            required: true,
            maxlength: 16,
            numbersonly: true,
        },
        p_iva: {
            required: true,
            digits: true,
            rangelength: [11, 11],
        },
    },
    messages:{
        name:{
            required: 'Il nome è obbligatorio <i class="bi bi-exclamation-circle"></i>',
            maxlength: 'Il nome non può superare i 255 caratteri <i class="bi bi-exclamation-circle"></i>',
            lettersonly: 'Il nome non può contenere numeri <i class="bi bi-exclamation-circle"></i>',
            specialcharacter: 'Il nome non può contenere caratteri speciali <i class="bi bi-exclamation-circle"></i>',
        },
        surname:{
            required: 'Il cognome è obbligatorio <i class="bi bi-exclamation-circle"></i>',
            maxlength: 'Il cognome non può superare i 255 caratteri <i class="bi bi-exclamation-circle"></i>',
            lettersonly: 'Il cognome non può contenere numeri <i class="bi bi-exclamation-circle"></i>',
            specialcharacter: 'Il cognome non può contenere caratteri speciali <i class="bi bi-exclamation-circle"></i>',
        },
        email:{
            required: 'L\'email è obbligatoria <i class="bi bi-exclamation-circle"></i>',
            maxlength: 'L\'email non può superare i 255 caratteri <i class="bi bi-exclamation-circle"></i>',
            email: 'Il formato della mail non è valido <i class="bi bi-exclamation-circle"></i>',
        },
        password:{
            required: 'La password è obbligatoria <i class="bi bi-exclamation-circle"></i>',
            rangelength: 'La password deve avere almeno 8 caratteri <i class="bi bi-exclamation-circle"></i>',
        },
        password_confirmation: {
            required: 'La password è obbligatoria <i class="bi bi-exclamation-circle"></i>',
            rangelength: 'La password deve avere almeno 8 caratteri <i class="bi bi-exclamation-circle"></i>',
            equalTo: 'Le password non corrispondono, STRONZO <i class="bi bi-exclamation-circle"></i>',
        },
        name_restaurant: {
            required: 'Il nome dell\'attività è obbligatorio <i class="bi bi-exclamation-circle"></i>',
            maxlength: 'Il nome dell\'attività non può superare i 255 caratteri <i class="bi bi-exclamation-circle"></i>',
        },
        address: {
            required: 'La via dell\'attività è obbligatoria <i class="bi bi-exclamation-circle"></i>',
            maxlength: 'Il via dell\'attività non può superare i 255 caratteri <i class="bi bi-exclamation-circle"></i>',
        },
        telephone: {
            required: 'Il numero di telefono è obbligatorio <i class="bi bi-exclamation-circle"></i>',
            maxlength: 'Il numero di telefono non può superare 16 cifre <i class="bi bi-exclamation-circle"></i>',
            numbersonly: 'Il numero di telefono non può contenere lettere <i class="bi bi-exclamation-circle"></i>',
        },
        p_iva: {
            required: 'La P.IVA è obbligatoria <i class="bi bi-exclamation-circle"></i>',
            digits: 'La P.IVA non può contenere lettere <i class="bi bi-exclamation-circle"></i>',
            rangelength: 'La P.IVA deve essere di 11 cifre <i class="bi bi-exclamation-circle"></i>',
        }
    },
    errorClass: "fw-bold text-danger tiny-text"
});

jQuery.validator.addMethod("lettersonly", function(value, element) {

    var regNew = new RegExp(/^([^0-9]*)$/);
    if(!regNew.test(value)){
        return false;
    } else {
        return true;
    }
}); 

jQuery.validator.addMethod("numbersonly", function(value, element) {

    var regNew = new RegExp(/^([^0-9]*)$/);
    if(regNew.test(value)){
        return false;
    } else {
        return true;
    }
}); 

jQuery.validator.addMethod("specialcharacter", function(value, element) {

    const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    let contain_special_char = specialChars.test(value);

    if (contain_special_char) {
        return false;
    } else {
        return true;
    }
});