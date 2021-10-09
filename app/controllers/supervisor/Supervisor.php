<?php

class Supervisor extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {

        $this->view->showPage('Supervisor/Supervisor');
    }

    function updateTeaMeasure() {
        $this->view->showPage('Supervisor/updateTeaMeasure');
    }

    function manageRequests() {
        $request = $this->model->manageRequests();
        $this->view->render('Supervisor/manageRequests', $request);
    }

    function manageFertilizer() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['fertlizer_in'])) {
                $data = [
                    'stock_type' => 'in_stock',
                    'type' => 'fertilizer',
                    'price_per_unit' => trim($_POST['price_per_unit']),
                    'amount' => trim($_POST['amount'])
                ];
                $this->model->manageStock($data);
                // $this->view->render('Supervisor/manageFertilizer');
            }else if(isset($_POST['fertilizer_out'])) {
                $data = [
                    'stock_type' => 'out_stock',
                    'type' => 'fertilizer',
                    'amount' => trim($_POST['amount'])
                ];
                $this->model->manageStock($data);
                // $this->view->render('Supervisor/manageFertilizer');
            }
            
        }else {
            $this->view->render('Supervisor/manageFertilizer');
        }
    }

    function manageFirewood() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['firewood_in'])) {
                $data = [
                    'stock_type' => 'in_stock',
                    'type' => 'firewood',
                    'price_per_unit' => trim($_POST['price_per_unit']),
                    'amount' => trim($_POST['amount'])
                ];
                $this->model->manageStock($data);
                $this->view->render('Supervisor/manageFirewood');
            }else if(isset($_POST['firewood_out'])) {
                $data = [
                    'stock_type' => 'out_stock',
                    'type' => 'firewood',
                    'amount' => trim($_POST['amount'])
                ];
                $this->model->manageStock($data);
                $this->view->render('Supervisor/manageFirewood');
            }
            
        }else {
            $this->view->render('Supervisor/manageFirewood');
        }
    }

    function fertilizerInStock() {
        $this->view->showPage('Supervisor/fertilizerInStock');
    }

    function firewoodInStock() {
        $this->view->showPage('Supervisor/firewoodInStock');
    }

    function fertilizerOutStock() {
        $this->view->showPage('Supervisor/fertilizerOutstock');
    }
    
    function firewoodOutStock() {
        $this->view->showPage('Supervisor/firewoodOutStock');
    }

    function fertilizerStock() {
        $this->view->showPage('Supervisor/fertilizerStock');
    }

    function firewoodStock() {
        $this->view->showPage('Supervisor/firewoodStock');
    }

    function profile() {
        $this->view->showPage('user/profile//profile');
    }

    function editProfile() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            if(isset($_POST['accept-btn'])) {
                $data = [
                    'contact_number' => trim($_POST['contact_number']),
                    'name' => trim($_POST['name'])
                ];
    
                $_SESSION['contact_number'] = $data['contact_number'];
                $_SESSION['name'] = $data['name'];
                $this->view->render('user/profile/enterPassword');
            }else if(isset($_POST['enter_btn'])) {
                $data = [
                    'password' => $_POST['password']
                ];
                if($this->model->checkPassword($data)) {
                    $this->model->editProfile();
                    $this->view->render('user/profile/correctPassword');
                }else {
                    $this->view->render('user/profile/wrongPassword');
                }
            }
            
        }else{
            $this->view->render('user/profile/editProfile');
        }
    }

    function changePassword() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'password' => $_POST['password'],
                'new_password' => $_POST['new_password'],
                'confirm_password' => $_POST['confirm_password'],

                'password_err' => '',
                'new_password_err' => '',
                'confirm_password_err' => ''
            ];
            if(empty($data['new_password'])) {
                $data['password_err'] = "Please enter the old passoword";
            }else if(!($this->model->checkPassword($data))) {
                $data['password_err'] = "Wrong Password";
            }

            if(empty($data['new_password'])) {
                $data['new_password_err'] = "Please enter a new passoword";
            }

            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Please confirm the password";
            }else if($data['new_password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = "Doesn't match with password";
            }

            if(!empty($data['password']) || !empty($data['new_password']) || !empty($data['confirm_password'])) {
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
                $this->model->changePassword($data);
                unset($_SESSION['user_type']);
                redirect('login');
            }else {
                $this->view->render('User/forgetPassword/changePassword', $data);
            }
        }else {
            $_SESSION['controller'] = 'profile';
            otpSend();
            // $this->view->render('user/profile/');
        }
    }

}

?>