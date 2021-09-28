<?php

class Registration_Model extends Model {

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

        $query = "INSERT INTO employee(user_id, name, address, contact_number, user_type, password) values('$user_id','$name','$address', '$contact_number', '$user_type', '$password')";
        
        $this->db->insertQuery($query);
    }

    public function findUserByMobileNumber($contact_number) {
        $query = "SELECT * FROM employee WHERE contact_number = '$contact_number'";

        $row = $this->db->searchQuery($query);

        if(count($row)) {
            return true;
        }else {
            return false;
        }
    }

    //Login a user
    public function login($contact_number, $password) {
        $query = "SELECT * FROM employee WHERE contact_number = '$contact_number'";

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