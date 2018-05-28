// Fields that need validation
var registerForm = document.getElementById('registerForm'),
    registerFirstName = registerForm.first_name,
    registerLastName = registerForm.last_name,
    registerUsername = registerForm.username,
    registerEmail = registerForm.email,
    registerPassword = registerForm.password,
    registerPasswordConfirm = registerForm.password_confirm;

// A validation run for first name triggered on blur
registerFirstName.addEventListener('blur', function() {
    
    var errorRegisterSpan = document.getElementById('firstNameRegister');
    
    registerFirstNameValidation = new Validation('όνομα', registerFirstName.value, {
        required: true,
        minLength: 5,
        maxLength: 30,
        regex: /^[A-Za-zΑ-Ωα-ωίϊΐΪόάέύϋΰΫήώΪ]+$/ // accepts only String Characters english and greek/^[A-Za-zΑ-Ωα-ωίϊΐόάέύϋΰήώ]+$/
    });
    
    errorRegisterSpan.innerHTML = registerFirstNameValidation.validate();
});

// A validation run for last name triggered on blur
registerLastName.addEventListener('blur', function() {
    
    var lastNameRegisterSpan = document.getElementById('lastNameRegister');
    
    registerLastNameValidation = new Validation('επώνυμο', registerLastName.value, {
        required: true,
        minLength: 5,
        maxLength: 30,
        regex: /^[A-Za-zΑ-Ωα-ωίϊΐΪόάέύϋΰΫήώΪ]+$/ // accepts only String Characters english and greek/^[A-Za-zΑ-Ωα-ωίϊΐόάέύϋΰήώ]+$/
    });
    
    lastNameRegisterSpan.innerHTML = registerLastNameValidation.validate();
});

// A validation run for  username triggered on blur
registerUsername.addEventListener('blur', function() {
    
    var usernameRegisterSpan = document.getElementById('usernameRegister');
    
    registerUsernameValidation = new Validation('όνομα χρήστη', registerUsername.value, {
        required: true,
        minLength: 5,
        maxLength: 30
    });
    
    usernameRegisterSpan.innerHTML = registerUsernameValidation.validate();
});

// A validation run for email triggered on blur
registerEmail.addEventListener('blur', function() {
    
    var emailRegisterSpan = document.getElementById('emailRegister');
    
    registerEmailValidation = new Validation('e-mail', registerEmail.value, {
        required: true,
        regex: /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/ // a regular expression that checks for a valid e-mail address
    });
    
    emailRegisterSpan.innerHTML = registerEmailValidation.validate();
});

// A validation run for email triggered on blur
registerPassword.addEventListener('blur', function() {
    
    var passwordRegisterSpan = document.getElementById('passwordRegister');
    var passwordRegisterStrengthSpan = document.getElementById('passwordRegisterStrength');
    
    registerPasswordValidation = new Validation('κωδικός πρόσβασης', registerPassword.value, {
        required: true,
        minLength: 5,
        maxLength: 30
    });
    
    passwordRegisterSpan.innerHTML = registerPasswordValidation.validate();

    passwordRegisterStrengthSpan.innerHTML = registerPasswordValidation.checkPasswordStrength();
});

// A validation run for email triggered on blur
registerPasswordConfirm.addEventListener('blur', function() {
    
    var passwordConfirmRegisterSpan = document.getElementById('passwordConfirmRegister');

    if(registerPasswordConfirm.value != registerPassword.value) {

        passwordConfirmRegisterSpan.innerHTML = 'Το πεδίο δεν ταιριάζει με τον κωδικό πρόσβασης.';
    }

});



