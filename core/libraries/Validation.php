<?php 

class Validation {

    private $field;
    private $field_name;
    private $rules = array();
    public $errors;

    public function __construct($field = null, $field_name = null, array $rules = null, array $errors = null){

        $this->field = $field;
        $this->field_name = $field_name;
        $this->rules = $rules;
        $this->errors = $errors;
    }

    public function validate() {

        foreach ($this->rules as $rule) {

            if($rule == 'required') {
                
                return $this->check_if_empty() ? 'Field is empty' : 'Field is full';
            }
        }
    }

    private function check_if_empty() {

        return empty($this->field) || trim($this->field) == '' ? true : false;
    }

}