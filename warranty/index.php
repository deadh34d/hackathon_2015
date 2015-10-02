<?php

require('../config.php');
$page = 'about';
if (isset($_POST['action'])) {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
} else if (isset($_GET['action'])) { //filter_input returns false if incorrect, so evaluating to true works.
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
} else {
    $action = 'default';
}
switch ($action) {
    default:
        include('view/warranty.php');
        break;
}