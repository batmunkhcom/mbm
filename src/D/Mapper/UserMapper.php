<?php
namespace D\Mapper;
//use ModelUser;
 
class UserMapper extends AbstractDataMapper
{
    protected $entityTable = "users";
     
    protected function loadEntity(array $row) {
        return new \D\Model\User(array(
            "id"    => $row["id"], 
            "name"  => $row["name"], 
            "email" => $row["email"],
            "role"  => $row["role"]));
    }
}