<?php

abstract class Model_Model {
    private $errors = array();

    public function __set($key, $value) {
        $method_name = 'set' . ucfirst($key);
        if (method_exists($this, $method_name)) {
            $this->{$method_name}($value);
        }
    }

    public function __get($key) {
        $method_name = 'get' . ucfirst($key);
        if (method_exists($this, $method_name)) {
            return $this->$method_name();
        }
    }

    abstract public function validate();

    public function isValid() {
        $this->validate();
        return count($this->errors) === 0;
    }

    public function getErrors() {
        return $this->errors;
    }
    public function addError($error) {
        $this->errors[] = $error;
    }

}
