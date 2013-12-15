<?php

namespace D\Model;

class User extends \D\AbstractEntity {

    protected $_allowedFields = array('id', 'name', 'email', 'role');

    public function __construct() {
        parent::__construct($this->_allowedFields);
    }

    /**
     * Set the comment ID
     */
    public function setId($id) {

        if (!filter_var($id, FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 999999)))) {
            throw new \InvalidArgumentException('The user ID is invalid.');
        }
        $this->_values['id'] = $id;
    }

    public function setEmail($email) {
        if (!is_string($email) || strlen($email) < 2) {
            throw new \InvalidArgumentException('The email is invalid.');
        }
        $this->_values['email'] = $email;
    }

    public function setName($name) {
        if (!is_string($name) || strlen($name) < 2) {
            throw new \InvalidArgumentException('The name is invalid.');
        }
        $this->_values['name'] = $name;
    }

    public function setRole($code) {
        if (!is_string($code) || strlen($code) < 2) {
            throw new \InvalidArgumentException('The role is invalid.');
        }
        $this->_values['role'] = $code;
    }
}
