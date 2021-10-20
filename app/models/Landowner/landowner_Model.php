<?php

class landowner_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function editProfile()
    {
        $contact_number = $_SESSION['contact_number'];
        $name = $_SESSION['name'];
        $user_id = $_SESSION['user_id'];
        $query = "UPDATE user SET contact_number='$contact_number', name='$name' WHERE user_id='$user_id'";
        $this->db->runQuery($query);
    }

    function checkPassword($data)
    {
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM user WHERE user_id='$user_id'";

        $row = $this->db->runQuery($query);
        $hashed_password = $row[0]['password'];

        if (password_verify($data['password'], $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    function changePassword($data = [])
    {
        $new_password = $data['new_password'];
        $contact_number = $_SESSION['contact_number'];

        $query = "UPDATE user SET password='$new_password' WHERE contact_number='$contact_number'";
        $row = $this->db->runQuery($query);
        if ($row) {
            return true;
        } else {
            return false;
        }
    }

    //Test
    function testModel()
    {
        $query = "SELECT * FROM product";
        return $this->db->runQuery($query);
    }

    function insertRequest()
    {
        $date = date("Y-m-d");
        $requests_type = $_POST['rtype'];
        // HAS TO CHANGE THIS
        $lid = 'LAN-000';
        $qty = $_POST['qty'];
        $query = "INSERT INTO request (requests_date,response_status,requests_type,lid) VALUES ('{$date}','0','{$requests_type}',{$lid})";

        $row = $this->db->insertQuery($query);
        print_r($row);
        if ($row) {
            return true;
        } else {
            return false;
        }
    }


    //test
    function Test()
    {
        $date = date("Y-m-d");
        $requests_type = $_POST['rtype'];
        // HAS TO CHANGE THIS
        // $lid = 'LAN-000';
        // $qty = $_POST['qty'];
        // $query = "INSERT INTO request (requests_date,response_status,requests_type,lid) VALUES ('{$date}','0','{$requests_type}',{$lid})";

        // $row = $this->db->insertQuery($query);
        // print_r($row);
        // if ($row) {
        //     return true;
        // } else {
        //     return false;
        // }
    }
}
