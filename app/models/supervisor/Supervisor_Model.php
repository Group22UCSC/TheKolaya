<?php

class Supervisor_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }


    function getTeaCollection()
    {
        $date = date("Y-m-d");
        // $date = '2021-10-29';
        $query = "SELECT lid, initial_weight_agent, agent_id FROM tea WHERE date='$date'";
        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }

    function getTodayFertilizerRequest()
    {
        // $date = '2021-10-20';
        $date = date("Y-m-d");
        $query = "SELECT user.name, landowner.user_id, request.request_id, request.request_type, 
                DATE(request.request_date) AS request_date, fertilizer_request.amount 
                FROM user 
                INNER JOIN landowner 
                ON landowner.user_id=user.user_id 
                INNER JOIN request 
                ON request.lid=landowner.user_id
                INNER JOIN fertilizer_request 
                ON request.request_id=fertilizer_request.request_id
                WHERE DATE(request.request_date)='$date' AND request.response_status=0";
        $row = $this->db->runQuery($query);

        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }

    function getStock()
    {
        $query = "SELECT * FROM stock";
        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }

    function updateTeaMeasure($data)
    {
        $lanowner_id = $data['landowner_id'];
        $weight = $data['weight'];
        $water = $data['water'];
        $container = $data['container'];
        $mature_leaves = $data['mature_leaves'];
        $net_weight = $data['net_weight'];
        $user_id = $_SESSION['user_id'];
        $rate = $data['rate'];
        // $query = "INSERT INTO tea(lid, initial_weight_sup, water_precentage, container_precentage, matured_precentage, net_weight, sup_id, quality) 
        // VALUES(" . $data['landowner_id'] . ", " . $data['weight'] . ", " . $data['water'] . ", " . $data['container'] . ", " . $data['mature_leaves'] . ", " . $data['net_weight'] . ", " . $_SESSION['user_id'] . ", " . $data['rate'] . ")";
        $query = "INSERT INTO tea(lid, initial_weight_sup, water_precentage, container_precentage, matured_precentage, net_weight, sup_id, quality) 
        VALUES('$lanowner_id', '$weight','$water', '$container','$mature_leaves','$net_weight','$user_id','$rate'";
        $this->db->runQuery($query);
    }

    function getUpdateTeaMeasure()
    {
        $query = "SELECT * FROM tea";
        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }

    function manageRequests()
    {
        $query = "SELECT request.request_id, request.lid, DATE(request.request_date) AS request_date, user.name, fertilizer_request.amount 
                FROM user 
                INNER JOIN request 
                ON user.user_id=request.lid 
                INNER JOIN fertilizer_request 
                ON fertilizer_request.request_id=request.request_id";
        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    function stock($data)
    {
        $type = $data['type'];
        if ($data['stock_type'] == 'out_stock') {
            $query = "SELECT DATE(out_date) 
                AS out_date, 
                out_quantity, emp_id 
                FROM " . $data['stock_type'] . " WHERE type='$type'";
        } else if ($data['stock_type'] == 'in_stock') {
            $query = "SELECT DATE(in_date) 
                AS in_date, 
                price_per_unit, price_for_amount, in_quantity, emp_id 
                FROM " . $data['stock_type'] . " WHERE type='$type'";
        }

        $row = $this->db->runQuery($query);
        if (!empty($row)) {
            return $row;
        } else {
            return false;
        }
    }

    function manageStock($data)
    {
        $type = $data['type'];
        $amount = $data['amount'];
        $emp_id = $_SESSION['user_id'];
        $full_stock = null;

        $query = "SELECT * FROM stock WHERE type='$type'";
        $row = $this->db->runQuery($query);
        if (empty($row)) {
            $query = "INSERT INTO stock(type, full_stock, emp_id) VALUES('$type', '$amount', '$emp_id')";
            $this->db->runQuery($query);
        } else {
            $full_stock = $row[0]['full_stock'];
        }

        if ($data['stock_type'] == 'in_stock') {
            $price_per_unit = $data['price_per_unit'];
            $price_for_amount = $price_per_unit * $amount;

            if ($full_stock) {
                $full_stock += $amount;
                $query = "UPDATE stock SET full_stock='$full_stock', emp_id='$emp_id' WHERE type='$type'";
                $this->db->runQuery($query);
            }

            $query = "INSERT INTO in_stock(type, price_per_unit, price_for_amount, in_quantity, emp_id) 
                    VALUES('$type', '$price_per_unit', '$price_for_amount' , '$amount', '$emp_id')";
            $this->db->runQuery($query);
        } else if ($data['stock_type'] == 'out_stock') {
            if ($full_stock) {
                if ($full_stock < $amount) {
                    $full_stock -= $full_stock;
                } else {
                    $full_stock -= $amount;
                }
                $query = "UPDATE stock SET full_stock='$full_stock', emp_id='$emp_id' WHERE type='$type'";
                $this->db->runQuery($query);
            }

            $query = "INSERT INTO out_stock(type, out_quantity, emp_id) VALUES('$type', '$amount', '$emp_id')";
            $this->db->runQuery($query);
        }
    }

    function searchByDate($data)
    {
        $stock_type = $data['stock_type'];
        $type = $data['type'];
        $search_date = $data['date'];

        $query = "SELECT DATE(in_date) 
                AS in_date, 
                type, price_per_unit, price_for_amount, in_quantity, emp_id 
                FROM '$stock_type' WHERE type='$type' WHERE in_date='$search_date'";

        $row = $this->db->runQuery($query);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }
}
