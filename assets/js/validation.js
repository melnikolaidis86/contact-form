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


        //A method for checking password strength
        this.checkPasswordStrength = () => {
            let message = '';
            let mediumRegex = new RegExp('^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})$');
            let strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

             if(strongRegex.test(this.fieldValue)) {

                message = 'Μεγάλη Ισχύς';
            } else if(mediumRegex.test(this.fieldValue)) {

                message = 'Μέτρια Ισχύς';
            } else {

                message = 'Μικρή Ισχύς';
            }

            return message;
        }

    }
}