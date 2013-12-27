<?php

namespace D\Mapper;

//use ModelUser;

/**
 * User Model iin Mapper n .
 */
class UserMapper extends AbstractDataMapper {

    protected $entityTable = "users";

    protected function loadEntity(array $row) {
        return new \D\Model\User(
                array(
            "id" => $row['id'],
            "user_id" => $row['user_id'],
            "depth" => $row['depth'],
            "lft" => $row['lft'],
            "rgt" => $row['rgt'],
            "st" => $row['st'],
            "email" => $row['email'],
            "username" => $row['username'],
            "password" => $row['password'],
            "password_tmp" => $row['password_tmp'],
            "token" => $row['token'],
            "firstname" => $row['firstname'],
            "lastname" => $row['lastname'],
            "gender" => $row['gender'],
            "birthday" => $row['birthday'],
            "city_birth" => $row['city_birth'],
            "city_live_in" => $row['city_live_in'],
            "website" => $row['website'],
            "profile_hits" => $row['profile_hits'],
            "default_time_zone" => $row['default_time_zone'],
            "default_date_format" => $row['default_date_format'],
            "default_lang" => $row['default_lang'],
            "default_layout" => $row['default_layout'],
            "date_created" => $row['date_created'],
            "date_password_reset" => $row['date_password_reset'],
            "secret_key" => $row['secret_key'],
            "address_living" => $row['address_living'],
            "address_billing" => $row['address_billing'],
            "address_shipping" => $row['address_shipping'],
            "role" => $row['role'])
        );
    }

}
