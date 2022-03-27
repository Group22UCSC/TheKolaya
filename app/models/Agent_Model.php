<?php

class Agent_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    //edit profile
    function editProfile()
    {
        $contact_number = $_SESSION['contact_number'];
        $name = $_SESSION['name'];
        $user_id = $_SESSION['user_id'];
        $query = "UPDATE user SET contact_number='$contact_number', name='$name' WHERE user_id='$user_id'";
        $this->db->runQuery($query);
    }

    //check password
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

    //change password
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

    //check whether the agent is available
    function checkAvailability($agent_id)
    {
        // print_r($agent_id)      ;
        $query = "SELECT availability FROM agent WHERE emp_id='$agent_id'";
        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return 0;
        }
    }

    //make the unavailable agent, available
    function availableAgent()
    {
        $agent_id = $_SESSION['user_id'];
        $query = $next_query = "UPDATE agent SET availability='1' WHERE emp_id='$agent_id'";
        $this->db->runQuery($query);
    }

    //get details to display tea available list
    function availableListTable()
    {
        $route_no = $_SESSION['route'];
        $agent_id = $_SESSION['user_id'];


        $query = "SELECT landowner.user_id, landowner.no_of_estimated_containers, 
        landowner.route_no, user.address, user.name
                 FROM landowner 
                 INNER JOIN user 
                 ON landowner.user_id = user.user_id                
                 WHERE landowner.route_no='$route_no' AND landowner.landowner_type='indirect_landowner' 
                AND landowner.tea_availability=1 ";

        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return 0;
        }
    }

    //assign default values when not appended assigned routes
    function setAssignDefault()
    {
        $agent_id = $_SESSION['user_id'];

        $query = "UPDATE agent SET is_rejected = '-1', assigned_routes = '-1' WHERE emp_id = '$agent_id'";
        $this->db->runQuery($query);
    }

    //get the is_rejected value
    function isReject()
    {
        $agent_id = $_SESSION['user_id'];

        $query = "SELECT is_rejected FROM agent WHERE emp_id= '$agent_id'";
        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return 0;
        }
    }

    //get the notification confirmation
    function isNotificationRejected($notification_id)
    {
        $query = "SELECT is_accepted FROM notification WHERE notification_id = '$notification_id'";
        $row = $this->db->runQuery($query);
        return $row;
    }

    //Confirm the route Assign
    function confirmRouteAssign($data)
    {
        $isRejected = $data['isRejected'];
        $notification_id = $data['notification_id'];
        $assigned_route = $data['assign_route'];
        $agent_id = $_SESSION['user_id'];
        $agent_name = $_SESSION['name'];


        $query = "UPDATE agent SET is_rejected='$isRejected' WHERE emp_id = '$agent_id'";
        $this->db->runQuery($query);
        if ($isRejected == 0) {
            //update the notification table that an agent accepted it
            $query = "UPDATE notification SET is_accepted='1' WHERE notification_id='$notification_id'";
            $this->db->runQuery($query);

            //set assigned route for agent who accepted
            $query = "UPDATE agent SET assigned_routes ='$assigned_route' WHERE emp_id='$agent_id'";
            $this->db->runQuery($query);

            //send notification to manager that agent accepted
            $message = $agent_name . " accepted the assigned route no. " . $assigned_route;
            $query = "INSERT INTO notification( read_unread, seen_not_seen, message,
            receiver_type, notification_type, sender_id) VALUES
            ('0','0','$message','manager','request','$agent_id')";
            $this->db->runQuery($query);
            //----------------Pusher API------------------//
            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
            );
            $pusher = new Pusher\Pusher(
                'ef64da0120ca27fe19a3',
                'd5033393ff3b228540f7',
                '1290222',
                $options
            );

            $pusher->trigger('my-channel', 'Manager_notification', $data);
            //-------------------------------------------//
        } else if ($isRejected == 1) {
            //send notification to manager that agent rejected
            $message = $agent_name . " rejected the assigned route no. " . $assigned_route;
            $query = "INSERT INTO notification( read_unread, seen_not_seen, message,
             receiver_type, notification_type, sender_id) VALUES
             ('0','0','$message','manager','warning','$agent_id')";
            $this->db->runQuery($query);
            //----------------Pusher API------------------//
            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
            );
            $pusher = new Pusher\Pusher(
                'ef64da0120ca27fe19a3',
                'd5033393ff3b228540f7',
                '1290222',
                $options
            );

            $pusher->trigger('my-channel', 'Manager_notification', $data);
            //-------------------------------------------//
        }
    }
    //get assign route for the agent (if there are any)
    function getAssignedRoute()
    {
        $agent_id = $_SESSION['user_id'];

        $query = "SELECT assigned_routes FROM agent WHERE emp_id= '$agent_id'";
        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return 0;
        }
    }

    //get the agent id incharge of the assigned route
    function getAssignedRouteAgent()
    {
        $assign_route_res = $this->getAssignedRoute();
        $assign_route = $assign_route_res[0]['assigned_routes'];

        $query = "SELECT emp_id FROM agent WHERE route_no = '$assign_route'";
        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return 0;
        }
    }

    //appending available landowner list of assigned route
    function assignAvailableListTable()
    {
        $assign_route_res = $this->getAssignedRoute();
        $assign_route = $assign_route_res[0]['assigned_routes'];
        $route_no = $_SESSION['route'];

        $query = "SELECT landowner.user_id, landowner.no_of_estimated_containers, 
                 landowner.route_no, user.address
                 FROM landowner INNER JOIN user 
                 ON landowner.user_id = user.user_id                
                 WHERE (landowner.route_no='$route_no' OR landowner.route_no='$assign_route')  AND landowner.landowner_type='indirect_landowner' 
                 AND landowner.tea_availability=1";

        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return 0;
        }
    }

    //appending fertilizer delivery list of assigned route
    function assignFertilizerdeliveryListTable()
    {
        $route_no = $_SESSION['route'];
        $assign_route_res = $this->getAssignedRoute();
        $assign_route = $assign_route_res[0]['assigned_routes'];

        $query = "SELECT request.request_id, request.request_type, request.lid, 
                 fertilizer_request.amount FROM request 
                  INNER JOIN fertilizer_request
                  ON  request.request_id = fertilizer_request.request_id                   
                 WHERE request.lid IN 
                (SELECT user_id FROM landowner WHERE route_no = '$route_no' OR route_no = '$assign_route') 
                AND request.response_status = 'accept' AND request.complete_status = 0 ";

        $row = $this->db->runQuery($query);
        // return $row;
        // print_r($row);
        if ($row) {
            return $row;
        } else {
            return 0;
        }
    }

    //requesting availability from manager
    function requestManager()
    {
        $agent_id = $_SESSION['user_id'];
        $agent_name = $_SESSION['name'];
        $route_no = $_SESSION['route'];
        $message = $agent_name . " requested to make him available for  route no. " . $route_no;

        $query = "INSERT INTO notification( read_unread, seen_not_seen, message,
        receiver_type, notification_type, sender_id) VALUES
        ('0','0','$message','manager','available_request','$agent_id')";
        $this->db->runQuery($query);

        $query = "UPDATE agent SET availability_requested='1' WHERE emp_id='$agent_id'";
        $this->db->runQuery($query);
        //    //----------------Pusher API------------------//
        //    $options = array(
        //        'cluster' => 'ap1',
        //        'useTLS' => true
        //    );
        //    $pusher = new Pusher\Pusher(
        //        'ef64da0120ca27fe19a3',
        //        'd5033393ff3b228540f7',
        //        '1290222',
        //        $options
        //    );

        //    $pusher->trigger('my-channel', 'Manager_notification',$data);
        //-------------------------------------------//  
    }

    function checkLandowner()
    {
        $landowner_id = $_POST['landowner_id'];
        $query = "SELECT * FROM user WHERE user_id='$landowner_id' AND is_delete=0";
        $row = $this->db->runQuery($query);

        if (count($row))
            return true;
        else
            return false;
    }
    //appending advance delivery list of assigned route
    function assignAdvancedeliveryListTable()
    {
        $route_no = $_SESSION['route'];
        $assign_route_res = $this->getAssignedRoute();
        $assign_route = $assign_route_res[0]['assigned_routes'];

        $query = "SELECT request.request_id, request.request_type, request.lid, 
                 advance_request.amount_rs FROM request 
                  INNER JOIN advance_request
                  ON  request.request_id = advance_request.request_id                   
                 WHERE request.lid IN 
                (SELECT user_id FROM landowner WHERE route_no = '$route_no' OR route_no = '$assign_route') 
                AND request.response_status = 'accept' AND request.complete_status = 0 ";

        $row = $this->db->runQuery($query);
        // return $row;
        // print_r($row);
        if ($row) {
            return $row;
        } else {
            return 0;
        }
    }

    //add initial tea weight by agent
    function updateWeight($data = [])
    {
        $landowner_id = $data['lid'];
        $weight = $data['initial_weight'];
        $emp_id = $data['agent_id'];

        $query = "INSERT INTO tea(lid, initial_weight_agent, agent_id)         
                    VALUES ('$landowner_id', '$weight','$emp_id')";
        $next_query = "UPDATE landowner SET tea_availability = '0',  no_of_estimated_containers = '0' WHERE user_id = '$landowner_id'";
        $this->db->runQuery($query);
        $this->db->runQuery($next_query);
    }

    //get details to display in fertilizer request table
    function fertilizerdeliveryListTable()
    {
        $route_no = $_SESSION['route'];
        $query = "SELECT request.request_id, request.request_type, request.lid, 
                 fertilizer_request.amount, 
                 landowner.route_no, 
                 user.address, user.name
                 FROM landowner 
                 INNER JOIN user
                 ON landowner.user_id = user.user_id
                 INNER JOIN request
                 ON request.lid=landowner.user_id
                  INNER JOIN fertilizer_request
                  ON  request.request_id = fertilizer_request.request_id                   
                 WHERE request.lid IN 
                (SELECT user_id FROM landowner WHERE route_no = '$route_no') 
                AND request.response_status = 'accept' AND request.complete_status = 0 ";

        $row = $this->db->runQuery($query);
        // return $row;
        // print_r($row);
        if ($row) {
            return $row;
        } else {
            return 0;
        }
    }

    //check whether the agent has requested availability from manager
    function availabilityRequested($agent_id)
    {
        $query = "SELECT availability_requested FROM agent WHERE emp_id='$agent_id'";

        $row = $this->db->runQuery($query);
        // return $row;
        // print_r($row);
        if ($row) {
            return $row;
        } else {
            return 0;
        }
    }

    //get details to display advance requests table
    function advancedeliveryListTable()
    {
        $route_no = $_SESSION['route'];
        $query = "SELECT request.request_id, request.request_type, request.lid, 
                advance_request.amount_rs,
                landowner.route_no, 
                user.address, user.name
                FROM landowner 
                INNER JOIN user
                ON landowner.user_id = user.user_id
                INNER JOIN request
                ON request.lid=landowner.user_id
                INNER JOIN advance_request
                ON  request.request_id = advance_request.request_id                   
                WHERE request.lid IN 
                (SELECT user_id FROM landowner WHERE route_no = '$route_no') 
                AND request.response_status = 'accept' AND request.complete_status = 0 ";

        $row = $this->db->runQuery($query);
        // return $row;
        // print_r($row);
        if ($row) {
            return $row;
        } else {
            return 0;
        }
    }

    //add fertilizer requests when completed
    function updateFertilizerRequest($data = [])
    {
        $date = $data['date'];
        $request_id = $data['rid'];
        $emp_id = $data['agent_id'];

        $query1 = "UPDATE fertilizer_request SET date_delivered = '$date', agent_id = '$emp_id' WHERE request_id = '$request_id'";
        $query2 = "UPDATE request SET complete_status = '1' WHERE request_id = '$request_id'";

        $this->db->runQuery($query1);
        $this->db->runQuery($query2);
    }

    //add advance requests when completed
    function updateAdvanceRequest($data = [])
    {
        $date = $data['date'];
        $request_id = $data['rid'];
        $emp_id = $data['agent_id'];

        $query1 = "UPDATE advance_request SET payment_day = '$date', agent_id = '$emp_id' WHERE request_id = '$request_id'";
        $query2 = "UPDATE request SET complete_status = '1' WHERE request_id = '$request_id'";

        $this->db->runQuery($query1);
        $this->db->runQuery($query2);
    }

    //search previous tea updates
    function searchTeaUpdates($data = [])
    {
        $date = $data['date'];
        $lid = $data['lid'];

        $query = "SELECT * FROM tea where lid = '$lid' AND date = '$date'";
        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return 0;
        }
    }

    //search previous fertilizer deliveries
    function searchFertilizerUpdates($data = [])
    {
        $date = $data['date'];
        $lid = $data['lid'];

        $query = "SELECT request.request_id,DATE(request.request_date),
        DATE(request.confirm_date), request.request_type, request.lid, 
        request.response_status,
        fertilizer_request.amount, fertilizer_request.agent_id,fertilizer_request.sup_id,
        DATE(fertilizer_request.date_delivered)
         FROM request 
         INNER JOIN fertilizer_request
         ON  request.request_id = fertilizer_request.request_id                   
        WHERE  request.lid ='$lid' AND DATE(request.request_date)='$date'";
        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return 0;
        }
    }

    //search previous advance deliveries
    function searchAdvanceUpdates($data = [])
    {
        $date = $data['date'];
        $lid = $data['lid'];

        $query = "SELECT request.request_id,DATE(request.request_date),
        DATE(request.confirm_date), request.request_type, request.lid, request.response_status,
        advance_request.amount_rs, advance_request.agent_id,advance_request.acc_id,
        DATE(advance_request.payment_day)
         FROM request 
         INNER JOIN advance_request
         ON  request.request_id = advance_request.request_id                   
        WHERE  request.lid ='$lid' AND request.request_date='$date'";
        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return 0;
        }
    }

    //storing the emergency message needed to be sent to the manager
    function storeEmergencyMessage($data = [])
    {
        $route_no = $_SESSION['route'];
        $message = $data['message'] . ". My route number is  " . $route_no;
        $sender_id = $data['agent_id'];

        $query = "INSERT INTO notification( read_unread, seen_not_seen, message,
         receiver_type, notification_type, sender_id) VALUES
         ('0','0','$message','manager','emergency','$sender_id')";
        //have not added receiver_id and receive_datetime,Check into that.
        $query1 = "UPDATE agent SET availability='0' WHERE emp_id='$sender_id'";
        $this->db->runQuery($query);
        $this->db->runQuery($query1);
        //----------------Pusher API------------------//
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            'ef64da0120ca27fe19a3',
            'd5033393ff3b228540f7',
            '1290222',
            $options
        );

        $pusher->trigger('my-channel', 'Manager_notification', $data);
        //-------------------------------------------//
        //add the query to make the agent unavailable         
    }

    //Get Notification
    function getNotification($data = [])
    {
        $notification_type = $data['notification_type'];
        if (isset($data['notification_id'])) {
            $notification_id = $data['notification_id'];
            $query = "UPDATE notification 
             SET read_unread=1 WHERE notification_id='$notification_id'";
            $this->db->runQuery($query);
        }
        if ($notification_type == 'full') {
            $query = "SELECT * FROM notification 
             WHERE receiver_type='Agent' ORDER BY read_unread ASC, notification_id DESC";
        } else if ($notification_type == 'half') {
            $query = "SELECT * FROM notification 
             WHERE receiver_type='Agent' AND read_unread=0 ORDER BY notification_id DESC";
        }

        $row = $this->db->runQuery($query);

        if (isset($data['notification_id'])) {
            if (count($row)) {
                return $row;
            } else {
                return false;
            }
        }

        $query = "UPDATE notification
                 SET seen_not_seen=1 WHERE seen_not_seen=0";
        $this->db->runQuery($query);
        $_SESSION['NotSeenCount'] = '';
        echo '<p>' . $_SESSION["NotSeenCount"] . '</p>';
        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }

    function updateReadNotification($notification_id)
    {
        $query = "UPDATE notification 
         SET read_unread=1 WHERE notification_id='$notification_id'";
        $this->db->runQuery($query);

        $query = "SELECT * FROM notification 
             WHERE receiver_type='Agent' ORDER BY notification_id DESC";

        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        }
    }
    function getNotificationCount()
    {
        $query = "SELECT * FROM notification 
         WHERE receiver_type='Agent' AND seen_not_seen=0";
        $row = $this->db->runQuery($query);

        if (count($row)) {
            $_SESSION['NotSeenCount'] = count($row);
            if (isset($_GET['getCount']))
                echo $_SESSION['NotSeenCount'];
        } else {
            $_SESSION['NotSeenCount'] = 0;
        }
    }
}
