<?php

class User_Model extends Model {

    function __construct()
    {
        parent::__construct();
    }

    // function getData($fname, $lname, $password) {
    //     $query = "INSERT INTO users(first_name, last_name, password) values('$fname', '$lname', '$password')";
    //     echo "Data is entered";
    //     return $this->db->insertQuery($query);
    // }

    // function showData() {
    //     $query = "SELECT * from users";
    //     return $this->db->searchQuery($query);
    // }

    //Register a user
    public function registration($data) {
        $name = $data['name'];
        $mobile_number = $data['mobile_number'];
        $user_id = $data['user_id'];
        $address = $data['address'];
        $password = $data['password'];
        $user_type = 'Agent';

        $query = "INSERT INTO users(user_id, name, address, mobile_number, user_type, password) values('$user_id','$name','$address', '$mobile_number', '$user_type', '$password')";
        
        $this->db->insertQuery($query);
    }

    public function findUserByMobileNumber($mobile_number) {
        $query = "SELECT * FROM users WHERE mobile_number = '$mobile_number'";

        $row = $this->db->searchQuery($query);

        if(count($row)) {
            return true;
        }else {
            return false;
        }
    }

    //Login a user
    public function login($mobile_number, $password) {
        $query = "SELECT * FROM users WHERE mobile_number = '$mobile_number'";

        $row = $this->db->searchQuery($query);
        
        $hashed_password = $row[0]['password'];

        if(password_verify($password, $hashed_password)) {
            return $row;
        }else {
            return false;
        }
    }

}
?>