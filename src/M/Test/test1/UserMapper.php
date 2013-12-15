<?php

namespace M\Test;

class UserMapper extends DataMapperAbstract {

    protected $_table = 'users';

    // fetch domain object by ID
    public function find($id) {
        // if the requested domain object exists in the identity map, get it from the there
        if (array_key_exists($id, $this->_identityMap)) {
            return $this->_identityMap[$id];
        }
        // if not, get domain object from the database
        $this->_db->query("SELECT * FROM $this->_table WHERE id = $id");
        if ($row = $this->_db->fetch()) {
            $user = new User;
            $user->id = $row->id;
            $user->fname = $row->fname;
            $user->lname = $row->lname;
            $user->email = $row->email;
            // save domain object to the identity map
            $this->_identityMap[$id] = $user;
            return $user;
        }
    }

    // save domain object
    public function save(DomainObjectAbstract $user) {
        // update domain object
        if ($user->id !== NULL) {
            $this->_db->query("UPDATE $this->_table SET fname = '$user->fname', lname = '$user->lname', email = '$user->email' WHERE id = $user->id");
        }
        // insert domain object
        else {
            $this->_db->query("INSERT INTO $this->_table (id, fname, lname, email) VALUES (NULL, '$user->fname', '$user->lname', '$user->email')");
        }
    }

    public function delete(DomainObjectAbstract $domainObject) {
        
    }

}
