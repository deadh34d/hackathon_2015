<?php

require_once('./config.php');
require_once('model/home.class.php');

if (isset($_POST['action'])) {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
} else if (isset($_GET['action'])) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
} else {
    $action = 'default';
}

switch ($action) {
    default:
        $page = 'home';
        $home = new Home();
        $sliders = $home->get_sliders();
        include('view/carousel.php');
        break;
}