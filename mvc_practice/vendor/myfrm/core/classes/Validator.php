<?php

namespace myfrm;

class Validator
{
    protected $errors = [];
    protected $rules_list = ["required", "min", "max", "email"];
    protected $messeges = [
        'required' => "The :fieldname: fields is required",
        'min' => "The :fieldname: field must be a minimum :rule_value: chars",
        'max' => "The :fieldname: field must be a maximum :rule_value: chars",
        'email' => "Not valid email"
    ];

    public function validte($data = [], $rules = []) {

        foreach ($data as $fieldname => $record) {
            if(isset($rules[$fieldname])) {
                $this->check_value(["fieldname" => $fieldname, "record" => $record, "rules" => $rules[$fieldname]]);
            }
        }
        return $this;
    }

    protected function check_value($field) {
        foreach ($field["rules"] as $rule => $rule_value) {
            if(in_array($rule, $this->rules_list)) {
                if(!call_user_func_array([$this, $rule], [$field["record"], $rule_value])) {
                    $this->addError($field["fieldname"], str_replace([':fieldname:', ':rule_value:'], [$field["fieldname"], $rule_value], $this->messeges[$rule]));
                };
            }
        }
    }

    protected function addError($fieldname, $error) {
        $this->errors[$fieldname][] = $error;
    }

    public function getErrors() {
        return $this->errors;
    }

    public function hasErrors() {
        return !empty($this->errors);
    }

    public function listErrors($fieldname) {
        $output = '';
        if(isset($this->errors[$fieldname])) {
            $output .= "<div class='invalid'><ul>";
            foreach ($this->errors[$fieldname] as $error) {
                $output .= "<li>$error</li>";
            }
            $output .= "</ul></div>";
        }
        return $output;
    }

    protected function required($value, $rule_value) {
        return !empty(trim($value));
    }

    protected function min($value, $rule_value) {
        return mb_strlen($value, "UTF-8") >= $rule_value;
    }

    protected function max($value, $rule_value) {
        return mb_strlen($value, "UTF-8") <= $rule_value;
    }

    protected function email($value, $rule_value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
