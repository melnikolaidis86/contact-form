// Fields that need validation
var form = document.getElementById('form'),
    firstNameField = form.first_name,
    lastNameField = form.last_name,
    emailField = form.email,
    phoneField = form.phone,
    subjectField = form.subject,
    textAreaField = form.text_area;

// A validation run for first name triggered on blur
firstNameField.addEventListener('blur', function() {
    
    var errorSpan = document.getElementById('firstNameMessage');
    
    firstNameValidation = new Validation('όνομα', firstNameField.value, {
        required: true,
        minLength: 5,
        maxLength: 30,
        regex: /^[a-zA-Zα-ωΑ-Ω\s]*$/ // accepts only String Characters english and greek
    });
    
    errorSpan.innerHTML = firstNameValidation.validate();
});

// A validation run for last name triggered on blur
lastNameField.addEventListener('blur', function() {
    
    var errorSpan = document.getElementById('lastNameMessage');
    
    lastNameValidation = new Validation('επώνυμο', lastNameField.value, {
        required: true,
        minLength: 5,
        maxLength: 30,
        regex: /^[a-zA-Zα-ωΑ-Ω\s]*$/ // accepts only String Characters english and greek
    });
    
    errorSpan.innerHTML = lastNameValidation.validate();
});

// A validation run for email triggered on blur
emailField.addEventListener('blur', function() {
    
    var errorSpan = document.getElementById('emailMessage');
    
    emailValidation = new Validation('e-mail', emailField.value, {
        required: true,
        regex: /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/ // a regular expression that checks for a valid e-mail address
    });
    
    errorSpan.innerHTML = emailValidation.validate();
});

// A validation run for phone1 triggered on blur 
phoneField.addEventListener('blur', function() {
   
    var errorSpan = document.getElementById('phoneMessage');
    
    phoneValidation = new Validation('τηλέφωνο', phoneField.value, {
        maxLength: 13,
        regex: /^\d{3}\d{7}$/ //accepts only 10 numeric characters
    });
    
    errorSpan.innerHTML = phoneValidation.validate();
});

// A validation run for subject triggered on blur
subjectField.addEventListener('blur', function() {
    
    var errorSpan = document.getElementById('subjectMessage');
    
    subjectValidation = new Validation('θέμα', subjectField.value, {
        required: true,
        minLength: 5,
        maxLength: 30
    });
    
    errorSpan.innerHTML = subjectValidation.validate();
});

// A validation run for text area triggered on blur
textAreaField.addEventListener('blur', function() {
    
    var errorSpan = document.getElementById('textAreaMessage');
    
    textAreaValidation = new Validation('κείμενο', subjectField.value, {
        required: true
    });
    
    errorSpan.innerHTML = textAreaValidation.validate();
});

// Validation object that validates a field based on some validation rules
class Validation {
    constructor(validationField, validationFieldValue, validationRules = { required: false, minLength: null, maxLength: null, regex: null, passwordStrength: false }) {
        // Validation properties
        this.field = validationField;
        this.fieldValue = validationFieldValue;
        this.rules = validationRules;
        this.messages = {
            
            // Error messages
            requiredMessage: 'Το πεδίο ' + this.field + ' δεν μπορεί να είναι κενό.',
            minLengthMessage: 'Για το πεδίο ' + this.field + ' απαιτούνται τουλάχιστον ' + this.rules.minLength + ' χαρακτήρες.',
            maxLengthMessage: 'Το πεδίο ' + this.field + ' δεν μπορεί να υπερβαίνει τους ' + this.rules.maxLength + ' χαρακτήρες.',
            regexMessage: 'Εισάγετε μία έγκυρη μορφή για το πεδίο ' + this.field + '.'
        };

        // Main Validation method that runs all the validation tests and returns an error message
        this.validate = () => {
            let error = '';
            if (this.rules.required == true && this.fieldValue.trim() == '') {
                error = this.messages.requiredMessage;
            }
            else if (this.rules.minLength != null && this.fieldValue.length < this.rules.minLength) {
                error = this.messages.minLengthMessage;
            }
            else if (this.rules.maxLength != null && this.fieldValue.length > this.rules.maxLength) {
                error = this.messages.maxLengthMessage;
            }
            else if (this.rules.regex != null && this.fieldValue != '') {
                if (!this.rules.regex.test(this.fieldValue)) {
                    error = this.messages.regexMessage;
                }
            }
            return error;
        };
    }
}
