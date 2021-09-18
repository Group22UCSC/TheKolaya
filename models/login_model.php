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
        $emp_id = $data['emp_id'];
        $address = $data['address'];
        $password = $data['password'];
        $user_type = 'Supervisor';

        $query = "INSERT INTO employee(emp_id, name, address, contact_number, user_type, password) values('$emp_id','$name','$address', '$contact_number', '$user_type', '$password')";
        
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