<?php

class Login_Model extends Model {

    function __construct()
    {
        parent::__construct();
    }

    //Register a user
    public function registration($data) {
        $name = $data['name'];
        $contact_number = $data['contact_number'];
        $user_id = $data['user_id'];
        $address = $data['address'];
        $password = $data['password'];
        $user_type = 'Land_Owner';

        $query = "INSERT INTO user(user_id, name, address, contact_number, user_type, password) values('$user_id','$name','$address', '$contact_number', '$user_type', '$password')";
        
        $this->db->runQuery($query);
    }

    public function findUserByMobileNumber($contact_number) {
        $query = "SELECT * FROM user WHERE contact_number = '$contact_number'";

        $row = $this->db->runQuery($query);

        if(count($row)) {
            return true;
        }else {
            return false;
        }
    }

    public function isRegisteredUser($contact_number) {
        $query = "SELECT * FROM user WHERE contact_number = '$contact_number' AND verify = 1";

        $row = $this->db->runQuery($query);

        if(count($row)) {
            return true;
        }else {
            return false;
        }
    }

    //Login a user
    public function login($contact_number, $password) {
        $query = "SELECT * FROM user WHERE contact_number = '$contact_number'";

        $row = $this->db->runQuery($query);
        
        $hashed_password = $row[0]['password'];

        if(password_verify($password, $hashed_password)) {
            return $row;
        }else {
            return false;
        }
    }

    public function changePassword($data = []) {
        $new_password = $data['new_password'];
        $contact_number = $data['contact_number'];
        
        $query = "UPDATE user SET password='$new_password' WHERE contact_number='$contact_number'";
        $row = $this->db->runQuery($query);
        if($row) {
            return true;
        }else {
            return false;
        }
    }

}
?>