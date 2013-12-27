<?php

namespace D\Model;

/**
 * User model. Users table.
 */
class User extends AbstractEntity {

    /**
     * hereglegchiin erh
     */
    const ADMINISTRATOR_ROLE = "Administrator";
    const GUEST_ROLE = "Guest";
    const MANAGER_ROLE = "Manager";

    /**
     * Table iin columns. UserMapper deer duudahdaa davhar zaaj ugnu.
     */
    protected $allowedFields = array(
        "id",
        "user_id",
        "depth",
        "lft",
        "rgt",
        "st",
        "email",
        "username",
        "password",
        "password_tmp",
        "token",
        "firstname",
        "lastname",
        "gender",
        "birthday",
        "city_birth",
        "city_live_in",
        "website",
        "profile_hits",
        "default_time_zone",
        "default_date_format",
        "default_lang",
        "default_layout",
        "date_created",
        "date_password_reset",
        "secret_key",
        "address_living",
        "address_billing",
        "address_shipping",
        "role");

    /**
     * @param integer $id User iin id
     * @return object
     */
    public function setId($id) {
        $id = (int) $id;

        if (isset($this->fields["id"])) {
            throw new \BadMethodCallException(
            "The ID for this user has been set already.");
        }

        if (!is_int($id) || $id < 1) {
            throw new \InvalidArgumentException(
            "The user ID is invalid.");
        }
        $this->fields["id"] = $id;

        return $this;
    }

    /**
     * @param integer $userId User iin userId
     * @return object
     */
    public function setUserId($userId) {
        $userId = (int) $userId;

        if (!isset($this->fields["id"])) {
            throw new \BadMethodCallException(
            "The user_id not found.");
        }

        if (!is_int($userId) || $userId < 1) {
            throw new \InvalidArgumentException(
            "The user user_id is invalid.");
        }
        $this->fields["user_id"] = $userId;

        return $this;
    }

    /**
     * @param integer $lft User iin lft
     * @return object
     */
    public function setLft($lft) {
        $lft = (int) $lft;

        if (!is_int($lft) || $lft < 0) {
            throw new \InvalidArgumentException(
            "The user lft is invalid.");
        }
        $this->fields["lft"] = $lft;

        return $this;
    }

    /**
     * @param integer $rgt User iin rgt
     * @return object
     */
    public function setRgt($rgt) {
        $rgt = (int) $rgt;

        if (!is_int($rgt) || $rgt < 0) {
            throw new \InvalidArgumentException(
            "The user lft is invalid.");
        }
        $this->fields["rgt"] = $rgt;

        return $this;
    }

    /**
     * @param string $status User iin status
     * @return object
     */
    public function setSt($status = 0) {

        if (!isset($status)) {
            $status = 0;
        }
        $this->fields["st"] = (int) $status;

        return $this;
    }

    /**
     * @param string $email User iin email
     * @return object
     */
    public function setEmail($email) {

        if (strlen($email) < 10 && substr_count('.', $email) > 2 && substr_count('@', $email) != 1) {
            throw new \InvalidArgumentException(
            "The user email is invalid.");
        }
        $this->fields["email"] = $email;

        return $this;
    }

    /**
     * @param string $username User iin username
     * @return object
     */
    public function setUsername($username) {

        //username n 5-16 temdegt aguulsan useg too dooguur zuraasaas burdene
        if (!preg_match("/^[0-9a-zA-Z_]{5,16}$/", $username)) {
            throw new \InvalidArgumentException(
            "The user username is invalid.");
        }
        $this->fields["username"] = $username;

        return $this;
    }

    /**
     * @param string $password User iin password
     * @return object
     */
    public function setPassword($password) {

        //nuuts ugiin urt bagadaa 8 temdegtees burdene
        if (strlen($password) < 8) {
            throw new \InvalidArgumentException(
            "Password must consis of at least 8 characters.");
        }
        $this->fields["password"] = $password;

        return $this;
    }

    /**
     * @param string $password token iin password
     * @return object
     */
    public function setToken($token) {

        //token urt bagadaa 32 temdegtees burdene
        if (strlen($token) < 32) {
            throw new \InvalidArgumentException(
            "Token must consis of at least 32 characters.");
        }
        $this->fields["token"] = $token;

        return $this;
    }

    /**
     * @param string $firstname User iin firstname
     * @return object
     */
    public function setFirstname($firstname) {
        if (strlen($firstname) < 2 || strlen($firstname) > 30) {
            throw new \InvalidArgumentException(
            "The user firstname is invalid.");
        }
        $this->fields["firstname"] = htmlspecialchars(trim($firstname), ENT_QUOTES);

        return $this;
    }

    /**
     * @param string $lastname User iin lastname
     * @return object
     */
    public function setLastname($lastname) {
        if (strlen($lastname) < 2 || strlen($lastname) > 30) {
            throw new \InvalidArgumentException(
            "The user lastname is invalid.");
        }
        $this->fields["lastname"] = htmlspecialchars(trim($lastname), ENT_QUOTES);

        return $this;
    }

    /**
     * @param string $gender
     * @return object
     */
    public function setGender($gender) {

        switch ($gender) {
            case 'Male':
                $gender = 'Male';
                break;
            case 'Female':
                $gender = 'Female';
                break;
            default:
                $gender = 'Unknown';
                break;
        }
        $this->fields["gender"] = $gender;

        return $this;
    }

    /**
     * @param string $birthday YYYY-MM-DD HH:II:SS
     * @return object
     */
    public function setBirthday($birthday) {

        $this->fields["birthday"] = convert_date($birthday);

        return $this;
    }

    /**
     * @param string $city_birth User iin tursun hot
     * @return object
     */
    public function setCityBirth($city_birth = '') {
        $this->fields["city_birth"] = htmlspecialchars(trim($city_birth), ENT_QUOTES);

        return $this;
    }

    /**
     * @param string $city_live_in User iin amidardag hot
     * @return object
     */
    public function setCityLiveIn($city_live_in = '') {
        $this->fields["city_live_in"] = htmlspecialchars(trim($city_live_in), ENT_QUOTES);

        return $this;
    }

    /**
     * @param string $website User iin tsahim huudas
     * @return object
     */
    public function setWebsite($website = '') {
        $this->fields["website"] = htmlspecialchars(trim($website), ENT_QUOTES);

        return $this;
    }

    /**
     * @param string $hits User iin profile iig uzsen too
     * @return object
     */
    public function setProfileHits($hits = 0) {
        $this->fields["profile_hits"] = (int) $hits;

        return $this;
    }

    /**
     * @param string $hits User iin tsagiin bus
     * @return object
     */
    public function setDefaultTimezone($timezone) {

        if ($timezone == '' || !isset($timezone)) {
            $timezone = TIME_ZONE;
        }
        $this->fields["default_timezone"] = $timezone;

        return $this;
    }

    /**
     * @param string $lang User iin default helnii songolt
     * @return object
     */
    public function setDefaultLang($lang = 'mn') {

        if ($lang == '' || !isset($lang)) {
            $lang = DEFAULT_LANG;
        }
        $this->fields["default_lang"] = $lang;

        return $this;
    }

    /**
     * @param string $layout User iin default zagvar
     * @return object
     */
    public function setDefaultLayout($layout = 'default') {

        if ($layout == '' || !isset($layout)) {
            $layout = DEFAULT_LAYOUT;
        }
        $this->fields["default_layout"] = $layout;

        return $this;
    }

    /**
     * User iin uussen ognoo
     * @return object
     */
    public function setDateCreated() {

        $this->fields["date_created"] = \M\Carbon::now();

        return $this;
    }

    /**
     * User iin nuuts ug sergeeh huselt yavuulsan ognoo
     * @param $date string optional
     * @return object
     */
    public function setDatePasswordReset($date) {

        if (isset($date)) {
            $this->fields["date_password_reset"] = convert_date($date);
        } else {
            $this->fields["date_password_reset"] = '';
        }

        return $this;
    }

    /**
     * User iin secret key
     * @param $secret_key string API aar handahad token toi hosloj hereglegdene
     * @return object
     */
    public function setSecretKey($secret_key = '') {

        if ($secret_key != '' && strlen($secret_key) > 16) {
            $this->fields["secret_key"] = $secret_key;
        }

        return $this;
    }

    /**
     * User iin address living
     * @param $address_living string user iin odoogiin amidarch bui hayag
     * @return object
     */
    public function setAddressLiveing($address_living = '') {

        $this->fields["address_living"] = $address_living;

        return $this;
    }

    /**
     * User iin address billing
     * @param $address_billing string user iin tulburiin hayag
     * @return object
     */
    public function setAddressBilling($address_billing = '') {

        $this->fields["address_billing"] = $address_billing;

        return $this;
    }

    /**
     * User iin address shipping
     * @param $address_shipping string user iin hurgeltiin hayag
     * @return object
     */
    public function setAddressBilling($address_shipping = '') {

        $this->fields["address_shipping"] = $address_shipping;

        return $this;
    }

    /**
     * @param string $role User iin role
     * @return object
     */
    public function setRole($role) {

        if (!$role) {
            $role = self::GUEST_ROLE;
        }

//        if ($role != self::ADMINISTRATOR_ROLE ||
//            $role != self::GUEST_ROLE) {
//            throw new \InvalidArgumentException(
//                "The user role is invalid.");
//        }
        $this->fields["role"] = $role;
        return $this;
    }

    //
    public function getAllFields() {

        return $this->allowedFields;
    }

}
