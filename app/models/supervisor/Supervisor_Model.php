<?php

class Supervisor_Model extends Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function enterPassword($data) {
        $_SESSION['contact_number'] = $data['contact_number'];
        $_SESSION['name'] = $data['name'];
        
        $query = "SELECT * FROM user WHERE user_id=".$_SESSION['user_id']. " AND UPDATE";
    }
}
?>