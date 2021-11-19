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
        // echo $date;
        $query = "SELECT user.name, landowner.user_id, request.request_id, request.request_type, 
                DATE(request.request_date) AS request_date, fertilizer_request.amount 
                FROM user 
                INNER JOIN landowner 
                ON landowner.user_id=user.user_id 
                INNER JOIN request 
                ON request.lid=landowner.user_id
                INNER JOIN fertilizer_request 
                ON request.request_id=fertilizer_request.request_id
                WHERE DATE(request.request_date)='$date' AND request.response_status='recive'";
        $row = $this->db->runQuery($query);
        // print_r($row);
        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }

    function getLastRequestDate($landowner_id) {
        $query = "SELECT DATE(request_date) As request_date FROM request 
                WHERE lid = '$landowner_id' 
                AND request_type = 'fertilizer' 
                AND response_status = 'accept'";
        $row = $this->db->runQuery($query);
        if(count($row)) {
            return $row;
        }else {
            return false;
        }
    }

    function getMonthTeaWeight($month, $landowner_id) {
        $monthlyTeaAmount = 0;
        $query = "SELECT * FROM tea WHERE MONTH(date) = '$month' AND lid='$landowner_id'";
        $row = $this->db->runQuery($query);

        if(count($row)) {
            for($i = 0; $i < count($row); $i++) {
                $monthlyTeaAmount += $row[$i]['net_weight'];
            }
            return $monthlyTeaAmount/count($row);
        }else {
            return '<b style="color:red;">No data found for '.date('F', strtotime("2001-$month-1")). '</b>';
        }
    }

    function getTeaQuality($landowner_id) {
        $query = "SELECT quality FROM tea WHERE lid='$landowner_id'";
        $row = $this->db->runQuery($query);

        if(count($row)) {
            return $row;
        }else {
            false;
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
        $landowner_id = $data['landowner_id'];
        $weight = $data['weight'];
        $water = $data['water'];
        $container = $data['container'];
        $mature_leaves = $data['mature_leaves'];
        $net_weight = $data['net_weight'];
        $supervisor_id = $_SESSION['user_id'];
        $rate = $data['rate'];
        $date = date('Y-m-d');
        // $query = "INSERT INTO tea(lid, initial_weight_sup, water_precentage, container_precentage, matured_precentage, net_weight, sup_id, quality) 
        // VALUES(" . $data['landowner_id'] . ", " . $data['weight'] . ", " . $data['water'] . ", " . $data['container'] . ", " . $data['mature_leaves'] . ", " . $data['net_weight'] . ", " . $_SESSION['user_id'] . ", " . $data['rate'] . ")";
        $query = "UPDATE tea SET 
        initial_weight_sup = '$weight', 
        water_precentage = '$water', 
        container_precentage = '$container', 
        matured_precentage = '$mature_leaves', 
        net_weight = '$net_weight', 
        sup_id = '$supervisor_id', 
        quality = '$rate' 
        WHERE lid = '$landowner_id' AND date='$date'";
        $this->db->runQuery($query);
        return true;
    }

    
    function getUpdateTeaMeasure()
    {
        $date = date('Y-m-d');
        $supervisor_id = $_SESSION['user_id'];
        $query = "SELECT * FROM tea WHERE date='$date' AND sup_id='$supervisor_id'";
        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }

    function getUpdateTeaMeasureById($landowner_id) {
        $query = "SELECT * FROM tea WHERE lid='$landowner_id'";
        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }
    
    
    function getRequests()
    {
        $query = "SELECT request.request_id, request.lid, DATE(request.request_date) AS request_date, user.name, fertilizer_request.amount 
                FROM user 
                INNER JOIN request 
                ON user.user_id=request.lid 
                INNER JOIN fertilizer_request 
                ON fertilizer_request.request_id=request.request_id 
                WHERE request.response_status='recive'";
        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    function manageRequests($data) {
        $request_id = $data['request_id'];
        $response_status = $data['response_status'];
        $query = "UPDATE request SET response_status='$response_status' WHERE request_id='$request_id'";

        $this->db->runQuery($query);
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
        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }

    //Get Notification
    function getNotReadedNotification() {
        $query = "SELECT * FROM notification 
        WHERE receiver_type='Supervisor' AND read_unread=0 
        ORDER BY notification_id ASC";
        $row = $this->db->runQuery($query);
        if(count($row)) {
            return $row;
        }else {
            return false;
        }
    }

    function getAllNotification() {
        $query = "SELECT * FROM notification 
        WHERE receiver_type='Supervisor' ORDER BY notification_id ASC";
        $row = $this->db->runQuery($query);
        if(count($row)) {
            return $row;
        }else {
            return false;
        }
    }
}
