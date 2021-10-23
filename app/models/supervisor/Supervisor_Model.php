<?php

class Supervisor_Model extends Model {

    function __construct()
    {
        parent::__construct();
    }

    function getStock() {
        $query = "SELECT * FROM stock";
        $row = $this->db->runQuery($query);
        if(count($row)) {
            return $row;
        }else {
            return false;
        }
    }
    
    // function editProfile() {
    //     $contact_number = $_SESSION['contact_number'];
    //     $name = $_SESSION['name'];
    //     $user_id = $_SESSION['user_id'];
    //     $query = "UPDATE user SET contact_number='$contact_number', name='$name' WHERE user_id='$user_id'";
    //     $this->db->runQuery($query);
    // }

    function manageRequests() {
        $query = "SELECT request.request_id, request.lid, DATE(request.request_date) AS request_date, user.name, fertilizer_request.amount 
                FROM user 
                INNER JOIN request 
                ON user.user_id=request.lid 
                INNER JOIN fertilizer_request 
                ON fertilizer_request.request_id=request.request_id";
        $row = $this->db->runQuery($query);

        if($row) {
            return $row;
        }else {
            return false;
        }
    }

    function stock($data) {
        $type = $data['type'];
        if($data['stock_type'] == 'out_stock') {
            $query = "SELECT DATE(out_date) 
                AS out_date, 
                out_quantity, emp_id 
                FROM ".$data['stock_type']." WHERE type='$type'";
        }else if($data['stock_type'] == 'in_stock') {
            $query = "SELECT DATE(in_date) 
                AS in_date, 
                price_per_unit, price_for_amount, in_quantity, emp_id 
                FROM ".$data['stock_type']." WHERE type='$type'";
        }
        
        $row = $this->db->runQuery($query);
        if($row) {
            return $row;
        }else {
            return false;
        }
    }

    function manageStock($data) {
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
            $query = "UPDATE stock SET full_stock='$full_stock', emp_id='$emp_id' WHERE type='$type'";
            $this->db->runQuery($query);
            $query = "INSERT INTO in_stock(type, price_per_unit, price_for_amount, in_quantity, emp_id) 
                    VALUES('$type', '$price_per_unit', '$price_for_amount' , '$amount', '$emp_id')";
            $this->db->runQuery($query);
        }else if($data['stock_type'] == 'out_stock') {
            if($full_stock < $amount) {
                $full_stock -= $full_stock;
            }else {
                $full_stock -= $amount;
            }
            $query = "UPDATE stock SET full_stock='$full_stock', emp_id='$emp_id' WHERE type='$type'";
            $this->db->runQuery($query);

            $query = "INSERT INTO out_stock(type, out_quantity, emp_id) VALUES('$type', '$amount', '$emp_id')";
            $this->db->runQuery($query);
        }
    }

    function searchByDate($data) {
        $stock_type = $data['stock_type'];
        $type = $data['type'];
        $search_date = $data['date'];

        $query = "SELECT DATE(in_date) 
                AS in_date, 
                type, price_per_unit, price_for_amount, in_quantity, emp_id 
                FROM '$stock_type' WHERE type='$type' WHERE in_date='$search_date'";

        $row = $this->db->runQuery($query);
        if($row) {
            return $row;
        }else {
            return false;
        }
    }

}

?>