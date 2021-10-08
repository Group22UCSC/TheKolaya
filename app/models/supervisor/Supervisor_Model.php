<?php

class Supervisor_Model extends Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function editProfile() {
        $contact_number = $_SESSION['contact_number'];
        $name = $_SESSION['name'];
        $user_id = $_SESSION['user_id'];
        $query = "UPDATE user SET contact_number='$contact_number', name='$name' WHERE user_id='$user_id'";
        $this->db->runQuery($query);
    }

    function checkPassword($data) {
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM user WHERE user_id='$user_id'";
        
        $row = $this->db->runQuery($query);
        $hashed_password = $row[0]['password'];

        if(password_verify($data['password'], $hashed_password)) {
            return $row;
        }else {
            return false;
        }
    }

    function changePassword($data = []) {
        $new_password = $data['new_password'];
        $contact_number = $_SESSION['contact_number'];
        
        $query = "UPDATE user SET password='$new_password' WHERE contact_number='$contact_number'";
        $row = $this->db->runQuery($query);
        if($row) {
            return true;
        }else {
            return false;
        }
    }

    function manageRequests() {
        // $time = time();
        // $query = "INSERT INTO request(confirm_date, response_status, request_type, lid) values('$time', 0, 'fertilizer', 'LAN-000')";
        // $this->db->runQuery($query);
        // // $query2 = "INSERT INTO fertilizer_request(request_id)";
        // $query = "SELECT LAST_INSERT_ID()";
        // $row = $this->db->runQuery($query);
        // $lastInsertID = $row[0][0];
        // $query = "INSERT INTO fertilizer_request(request_id, amount, supervisor_id, agent_id) VALUES('$lastInsertID', 50, 'SUP-000', 'AGN-000')";
        // $row = $this->db->runQuery($query);
        $query = "SELECT request.request_id, request.lid, request.request_date, user.name, fertilizer_request.amount 
                FROM user 
                INNER JOIN request 
                ON user.user_id=request.lid 
                INNER JOIN fertilizer_request 
                ON fertilizer_request.request_id=request.request_id";
        $row = $this->db->runQuery($query);
        // print($lastInsertID);
        // print_r($row);
        // for($i = 0; $i < 2; $i++) {
        //     echo $row[$i]['request_id']." ".$row[$i]['request_date']." ".$row[$i]['name']." ".$row[$i]['amount']." ".$row[$i]['lid']."<br>";
            
        // }
        // print($row[0]['name']);
        if($row) {
            return $row;
        }else {
            return false;
        }
    }

    function manageStock($data = []) {
        $type = $data['type'];
        $amount = $data['amount'];
        $emp_id = $_SESSION['user_id'];

        $query = "SELECT full_stock FROM stock WHERE type='$type'";
        $row = $this->db->runQuery($query);
        $full_stock = $row[0]['full_stock'];

        

        if($data['stock_type'] == 'in_stock') {
            $price_per_unit = $data['price_per_unit'];
            $price_for_amount = $price_per_unit * $amount;

            $full_stock += $amount;
            $query = "UPDATE stock SET type='$type', full_stock='$full_stock', emp_id='$emp_id'";
            $this->db->runQuery($query);
            $query = "INSERT INTO in_stock(type, price_per_unit, price_for_amount, in_quantity, emp_id) 
                    VALUES('$type', '$price_per_unit', '$price_for_amount' , '$amount', '$emp_id')";
            $this->db->runQuery($query);
        }else if($data['stock_type'] == 'out_stock') {
            if($full_stock <= $amount) {
                $full_stock -= $full_stock;
            }else {
                $full_stock -= $amount;
            }
            $query = "UPDATE stock SET type='$type', full_stock='$full_stock', emp_id='$emp_id'";
            $this->db->runQuery($query);

            $query = "INSERT INTO out_stock(type, out_quantity, emp_id) VALUES('$type', '$amount', '$emp_id')";
            $this->db->runQuery($query);
        }
    }


}
?>