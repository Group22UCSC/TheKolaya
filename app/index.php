<?php

date_default_timezone_set("Asia/colombo");

require 'config/DatabaseConfig.php';
require 'config/Config.php';
require 'libs/App.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';
require 'libs/Database.php';


require 'helpers/url_helper.php';
require 'helpers/session_helper.php';

$app = new App();

?>