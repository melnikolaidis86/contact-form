<?php 

class Validation {

    private $field;
    private $field_name;
    private $rules = array();
    public $errors = array();

    public function __construct($field = null, $field_name = null, array $rules = null){

        $this->field = $field;
        $this->field_name = $field_name;
        $this->rules = $rules;
    }

    public function validate() {

        if(isset($this->rules['required'])) {
            
            if($this->check_if_empty()) {

                $this->errors['required'] = 'Το πεδίο ' . $this->field_name . ' δεν μπορεί να είναι κενό.';
            }
        }
        
        if(isset($this->rules['minLength'])) {

            if(!$this->check_min_length($this->rules['minLength']) && !$this->check_if_empty()) {

                $this->errors['minLength'] = 'Το πεδίο ' . $this->field_name . ' πρέπει να περιέχει τουλάχιστον ' . $this->rules['minLength']  . ' χαρακτήρες.';
            }
        }

        if(isset($this->rules['maxLength'])) {

            if(!$this->check_max_length($this->rules['maxLength'])) {

                $this->errors['maxLength'] = 'Το πεδίο ' . $this->field_name . ' πρέπει να περιέχει το πολύ ' . $this->rules['maxLength']  . ' χαρακτήρες.';
            }
        }
    }

    //A method to check if the current field is empty
    private function check_if_empty() {

        return empty($this->field) || trim($this->field) == '' ? true : false;
    }

    //A method to check if the current field length is smaller than the chars expected
    private function check_min_length($minLength) {

        return strlen($this->field) > $minLength ? true : false;
    }

    //A method to check if the current field length is larger than the chars expected
    private function check_max_length($maxLength) {

        return strlen($this->field) < $maxLength ? true : false;
    }

}