<?php

class Supervisor_Model extends Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function editProfile($data) {
        $_SESSION['contact_number'] = $data['contact_number'];
        $_SESSION['name'] = $data['name'];
        
        $query = "UPDATE user SET contact_number="
                .$_SESSION['contact_number'].", name=".$_SESSION['name']." WHERE user_id=".$_SESSION['user_id'];
        $this->db->runQuery($query);
    }

    function checkPassword($data) {
        $query = "SELECT * FROM user WHERE user_id=".$_SESSION['user_id'];
        
        $row = $this->db->runQuery($query);

        $hashed_password = $row[0]['password'];

        if(password_verify($data['password'], $hashed_password)) {
            return $row;
        }else {
            return false;
        }
    }

}
?>