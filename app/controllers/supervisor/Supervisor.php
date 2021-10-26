<?php

class Supervisor extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if ($this->model->getStock()) {
            $stock = $this->model->getStock();
            $this->view->render('Supervisor/Supervisor', $stock);
        } else {
            $this->view->render('Supervisor/Supervisor');
        }
    }

    function updateTeaMeasure()
    {
        $this->view->render('Supervisor/updateTeaMeasure');
    }

    function manageRequests()
    {
        $request = $this->model->manageRequests();
        $this->view->render('Supervisor/manageRequests', $request);
    }

    function manageFertilizer()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'stock_type' => $_POST['stock_type'],
                'type' => $_POST['type'],
                'price_per_unit' => '',
                'amount' => trim($_POST['amount'])
            ];
            if ($_POST['stock_type'] == 'in_stock') {
                $data['price_per_unit'] = trim($_POST['price_per_unit']);
            }
            
            $this->model->manageStock($data);
        } else {
            $this->view->render('Supervisor/manageFertilizer');
        }
    }

    function manageFirewood()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'stock_type' => $_POST['stock_type'],
                'type' => $_POST['type'],
                'price_per_unit' => '',
                'amount' => trim($_POST['amount'])
            ];
            if ($_POST['stock_type'] == 'in_stock') {
                $data['price_per_unit'] = trim($_POST['price_per_unit']);
            }
            
            $this->model->manageStock($data);
        } else {
            $this->view->render('Supervisor/manageFirewood');
        }
    }

    function fertilizerInStock()
    {
        $data = [
            'stock_type' => 'in_stock',
            'type' => 'fertilizer',
        ];
        $_SESSION['search'] = 0;
        if (isset($_GET['search_btn'])) {
            $_SESSION['searchDate'] = trim($_GET['date']);
            $_SESSION['search'] = 1;
        }
        $instock = $this->model->stock($data);
        $this->view->render('Supervisor/fertilizerInStock', $instock);
    }

    function firewoodInStock()
    {
        $data = [
            'stock_type' => 'in_stock',
            'type' => 'firewood',
            'date' => ''
        ];
        $instock = $this->model->stock($data);
        $this->view->show('Supervisor/firewoodInStock', $instock);
    }

    function fertilizerOutStock()
    {
        $this->view->render('Supervisor/fertilizerOutstock');
    }

    function firewoodOutStock()
    {
        $data = [
            'stock_type' => 'out_stock',
            'type' => 'firewood',
        ];
        $outstock = $this->model->stock($data);
        $this->view->render('Supervisor/firewoodOutStock', $outstock);
    }

    //Manage Profile
    function profile()
    {
        $this->view->render('user/profile/profile');
    }
    
    function editProfile()
    {
        include '../app/controllers/User.php';
        $user = new User();
        $user->loadModelUser('user');
        $user->editProfile();
    }

    function enterPassword()
    {
        $this->view->render('user/profile/enterPassword');
    }
}
