<?php

namespace D\Model;

class Settings extends AbstractEntity {

    protected $allowedFields = array(
        "id",
        "name",
        "value");

    public function setId($id) {
        $id = (int) $id;

        if (isset($this->fields["id"])) {
            throw new \BadMethodCallException(
            "The ID for this user has been set already.");
        }

        if (!is_int($id) || $id < 1) {
            throw new \InvalidArgumentException(
            "The ID is invalid.");
        }
        $this->fields["id"] = $id;

        return $this;
    }

	public function setName($name) {

        $this->fields["name"] = $name;
        return $this;
    }
	
	public function setValue($value) {

        $this->fields["value"] = $value;
        return $this;
    }

}
