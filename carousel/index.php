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
    $action = 'view_slider_images';
}

switch($action) {
    case 'view_slider_images':
        $home = new Home();
        $sliders = $home->get_sliders();
//        include('carousel/view_all_sliders.php');
        break;
    case 'view_slider':
        $home = new Home();
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $slider = $home->get_slider($id);
        include('carousel/view_slider.php');
        break;
    case 'edit_slider':
        if ($_SESSION['user']) {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $local_url = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_URL);
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);

            $home = new Home();
            $image_object = new Image();
            $result = $image_object->edit_slider($id, $title, $local_url, $description);
            if ($result) {
                header('Location: .?action=success&id="' . $id . '"&message="' . base64_encode("Slider image added successfully"));
            } else {
                header('Location: .?action=failure&message="' . base64_encode("The image was unable to be added to the database"));
//                include('errors/generic_error.php');
            }
        } else {
            error_unauthorized();
        }
        break;
    case 'delete_slider':
        if ($_SESSION['user']) {
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $home = new Home();
            $image_object = new Image();
            $result = $image_object->delete_slider_image($id);
            if ($result) {
                header('Location: .?action=success&id="' . $id . '"&message="' . base64_encode("Slider was successfully deleted"));
            } else {
                header('Location: .?action=failure&message="' . base64_encode("The image was unable to be deleted from the database"));
            }
        } else {
            error_unauthorized();
        }
        break;
}