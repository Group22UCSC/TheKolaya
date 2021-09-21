<?php

    class Manager extends Controller {
        function __construct() {
            parent::__construct();
        }

        function index() {
            $this->view->showPage('Manager/Manager');
        }
    }
?>