<?php

namespace M\Test;

class User extends \M\Database\AbstractEntity{

    private $id;
    private $email;
    private $name;
    private $role;

    public function getId() {
        return $this->id;
    }

    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setName($code) {
        $this->name = $code;

        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setRole($code) {
        $this->role = $code;

        return $this;
    }

    public function getRole() {
        return $this->role;
    }

    /**
     * Get the entities stored in the collection
     */
//    public function toArray() {
//        $me = $this;
//
//        $r = array();
//        $vars = get_object_vars($me);
//        foreach ($vars as $k => $v) {
//            $r[$k] = $v;
//        }
//        return $r;
//    }

}
