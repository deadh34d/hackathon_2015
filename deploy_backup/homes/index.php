<?php
require_once('../config.php');

//Class
require_once('model/home.class.php'); //Home() constructor lives here
require_once('model/image.class.php');

session_start();

if (isset($_POST['action'])) {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
} else if (isset($_GET['action'])) { //filter_input returns false if incorrect, so evaluating to true works.
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

} else {
    $action = 'view_all_homes';
}

switch ($action) {
    case 'view_home':
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $image_object = new Image();
        $home_object = new Home();

        $images = $image_object->get_images_for_home($id);
        $home = $home_object->get_home($id);

        if ($home == null || $id == null) {
            $error = "Invalid home";
            include('errors/404.php');
            die();
        }
        include('view_home.php');
        break;
    case 'add_home':
        if (isset($_SESSION['user'])) {
            include('add_home.php');
        } else {
            http_response_code(404);
            include('errors/404.php');
        }

        break;
    case 'edit_home':
        if (isset($_SESSION['user'])) {
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $image_object = new Image();
            $home_object = new Home();

            $images = $image_object->get_images_for_home($id);
            $home = $home_object->get_home($id);

            $_SESSION['id'] = $id;
            include('homes/modify_home.php');
        } else {
            http_response_code(404);
            include('errors/404.php');
        }
        break;
    case 'delete_home':
        if (isset($_SESSION['user'])) {
            include('delete_home.php');

        } else {
            http_response_code(404);
            include('errors/404.php');
        }
        break;

    case 'create_new_home':
        $subdivision = filter_input(INPUT_POST, 'subdivision', FILTER_SANITIZE_STRING);
        $lot = filter_input(INPUT_POST, 'lot', FILTER_SANITIZE_NUMBER_INT);
        $sold = filter_input(INPUT_POST, 'sold', FILTER_VALIDATE_BOOLEAN);
        $street_num = filter_input(INPUT_POST, 'street_number', FILTER_SANITIZE_STRING);
        $street_name = filter_input(INPUT_POST, 'street_number', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
        $zip_code = filter_input(INPUT_POST, 'zip_code', FILTER_SANITIZE_STRING);
        $plan_name = filter_input(INPUT_POST, 'plan_name', FILTER_SANITIZE_STRING);
        $sales_price = filter_input(INPUT_POST, 'sales_price', FILTER_SANITIZE_NUMBER_INT);
        $elevation = filter_input(INPUT_POST, 'elevation', FILTER_SANITIZE_STRING);
        $finish = filter_input(INPUT_POST, 'finish', FILTER_SANITIZE_STRING);

        $home = new Home();

        $home->add_home($subdivision, $lot, $sold, $street_num,
            $street_name, $city, $state, $zip_code,
            $plan_name, $sales_price, $elevation,
            $finish);
        header('Location: ./?action=show_available_homes');
        break;
    case 'view_all_homes':
        $page = 'browse';
        $home = new Home();
        $homes = $home->get_homes();
        $image_object = new Image(); // I did the dirty. We have to process the thumbnail in the view. Shameful, I know.
        include('view_all_homes.php');
        break;
    case 'search_homes':

        $min_price = filter_input(INPUT_POST, 'min_price');
        $max_price = filter_input(INPUT_POST, 'max_price');

        $min_sqft = filter_input(INPUT_POST, 'min_sqft');
        $max_sqft = filter_input(INPUT_POST, 'max_sqft');

        $min_bed = filter_input(INPUT_POST, 'min_bedrooms');
        $max_bed = filter_input(INPUT_POST, 'max_bedrooms');

        $min_bath = filter_input(INPUT_POST, 'min_bathrooms');
        $max_bath = filter_input(INPUT_POST, 'max_bathrooms');

//        $state = filter_input(INPUT_POST, 'state');

        $location = filter_input(INPUT_POST, 'location');

        if ($min_price == 'any') {
            $min_price = 1;
        }
        if ($max_price == 'any') {
            $max_price = 99999999999;
        }

        if ($min_sqft == 'any') {
            $min_sqft = 1;
        }
        if ($max_sqft == 'any') {
            $max_sqft = 99999999999;

        }
        if ($min_bath == 'any') {
            $min_bath = 1;
        }
        if ($max_bath == 'any') {
            $max_bath = 99999999999;;
        }
        if ($min_bed == 'any') {
            $min_bed = 1;
        }
        if ($max_bed == 'any') {
            $max_bed = 99999999999;
        }
        if ($location == 'any') {
            $location = '%';
        }


        $filter['price'] = " (sales_price >= $min_price" .
            " AND sales_price <= $max_price)";

        $filter['sqft'] = "(square_footage >= $min_sqft" .
            " AND square_footage <= $max_sqft)";

        $filter['bed'] = "(beds >= $min_bed AND beds <= $max_bed)";

        $filter['location'] = "(city LIKE '$location')";

//        if ($state == "ANY") {
//            $filter['state'] = "(state LIKE '%')";
//        } else {
//            $filter['state'] = "(state = '$state')";
//        }


        $home = new Home();
        $homes = $home->search_homes($filter);
        $image_object = new Image();
        if (empty($homes)) {
            $error = "No homes found matching your search parameters. Please try again.";
        }
        include("view_all_homes.php");

        break;
    default:
        http_response_code(404);
        include('errors/404.php');
        die();
        break;
}