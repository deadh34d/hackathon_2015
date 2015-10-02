<?php
require_once('../config.php');

//Class
require_once('model/home.class.php'); //plan() constructor lives here
require_once('model/image.class.php');

session_start();

if (isset($_POST['action'])) {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
} else if (isset($_GET['action'])) { //filter_input returns false if incorrect, so evaluating to true works.
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

} else {
    $action = 'view_all_plans';
}

switch ($action) {
    case 'view_plan':
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $image_object = new Image();
        $plan_object = new plan();

        $images = $image_object->get_images_for_plan($id);
        $plan = $plan_object->get_plan($id);
        $realtor = $plan_object->get_realtor($id);

        if ($plan == null || $id == null) {
            $error = "Invalid plan";
            include('errors/404.php');
            die();
        } else {
            include('view_plan.php');
        }
        break;
    case 'view_all_plans':
        $page = 'browse';
        $plan = new plan();
        $plans = $plan->get_plans();
        $image_object = new Image(); // I did the dirty. We have to process the thumbnail in the view. Shameful, I know.
        include('view_all_plans.php');
        break;
    default:
        http_response_code(404);
        include('errors/404.php');
        die();
        break;
}