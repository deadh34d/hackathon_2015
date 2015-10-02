<?php
require('../config.php');
require_once('model/admin_db.php');
require_once('php_libs/HTMLPurifier.standalone.php');
require_once('model/home.class.php');
require_once('model/admin_db.php');
require_once("php_libs/PasswordHash.php");
require_once('model/image.class.php');
require_once('model/verifier.php');

//$lifetime = 60 * 60;
//session_set_cookie_params($lifetime, '/');
session_start();

if (isset($_POST['action'])) {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
} else if (isset($_GET['action'])) { //filter_input returns false if incorrect, so evaluating to true works.
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
} else {
    $action = 'admin';
}

switch ($action) {
    case 'admin':
        if (isset($_SESSION['user'])) {
            include('admin_panel.php');
        }else{
            include('admin_login.php');
        }
        break;
    case 'logout':
//        unset($_SESSION);
        try {

            session_unset();
            session_destroy();
            $_SESSION = array();
            unset($_COOKIE['PHPSESSID']);
            setcookie("PHPSESSID", "", time() - 3600, "/");
            header('Location: .');

        } catch (Exception $e) {
            $error = $e;
            include('errors/generic_error.php');
        }
        break;


    case 'doAdminLogin':
        $adminDB = new AdminDB();
        $validTokens = $adminDB->getSessionTokens();
//        if (isset($_COOKIE['PHPSESSID'])) {
//            foreach ($validTokens as $valid_token) {
//                if ($_COOKIE['PHPSESSID'] == $valid_token['sessionID']) {
//                    $_SESSION['user'] = $adminDB->getAdminByToken($valid_token['sessionID']);
//                    if (!$_SESSION['user']) {
//                        echo "login error";
//                    } else {
//                        include('admin_panel.php');
//                    }
//                    break;
//                }
//            }
//        }

        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $rememberMe = filter_input(INPUT_POST, 'rememberMe', FILTER_VALIDATE_BOOLEAN);

        $hash = $adminDB->get_admin_password_hash($login);

        $check = password_verify($password, $hash);

        if ($check) {

            // passwords matched! show account dashboard or something
            $_SESSION['user'] = $login;
            if ($rememberMe) { //TODO
//                setcookie("PHPSESSID", session_id(), "/");
//                $adminDB->setSessionToken(session_id(), $login);
            }
            include('admin_panel.php');
        } else {
            $_SESSION['error'] = "Invalid login credentials.";
            header("Location: .");
        }
        // passwords didn't match, show an error


        break;

    case 'add_home':
        if ($_SESSION['user']) {
            $_SESSION['add_homes'] = true;
            include('homes/modify_home.php');
        } else {
            $error = "Something went wrong, please try to log in again";
            header('Location: .');
        }
        break;
//    case 'verify_home':
////        $verify = new Verifier();
//        $inputs = [];
//        $inputs['subdivision'] = filter_input(INPUT_POST, 'subdivision', FILTER_SANITIZE_STRING);
//        $inputs['lot'] = filter_input(INPUT_POST, 'lot', FILTER_SANITIZE_STRING);
//        $inputs['sold'] = filter_input(INPUT_POST, 'sold', FILTER_VALIDATE_BOOLEAN);
//        $inputs['street_number'] = filter_input(INPUT_POST, 'street_number', FILTER_SANITIZE_STRING);
//        $inputs['street_name'] = filter_input(INPUT_POST, 'street_name', FILTER_SANITIZE_STRING);
//        $inputs['city'] = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
//        $inputs['state'] = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
//        $inputs['zip_code'] = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
//        $inputs['plan_name'] = filter_input(INPUT_POST, 'plan_name', FILTER_SANITIZE_STRING);
//        $inputs['sales_price'] = filter_input(INPUT_POST, 'sales_price', FILTER_SANITIZE_STRING);
//        $inputs['elevation'] = filter_input(INPUT_POST, 'elevation', FILTER_SANITIZE_STRING);
//        $inputs['finish'] = filter_input(INPUT_POST, 'finish', FILTER_SANITIZE_STRING);
//        $inputs['square_footage'] = filter_input(INPUT_POST, 'square_footage', FILTER_SANITIZE_STRING);
//        $inputs['beds'] = filter_input(INPUT_POST, 'beds', FILTER_SANITIZE_STRING);
//        $inputs['baths'] = filter_input(INPUT_POST, 'baths', FILTER_SANITIZE_STRING);
//        $inputs['description'] = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
//
//        break;
    case 'commit_home':

        $inputs = [];
        $inputs['subdivision'] = filter_input(INPUT_POST, 'subdivision', FILTER_SANITIZE_STRING);
        $inputs['lot'] = filter_input(INPUT_POST, 'lot', FILTER_SANITIZE_STRING);
        $inputs['sold'] = filter_input(INPUT_POST, 'sold', FILTER_VALIDATE_BOOLEAN);
        $inputs['street_number'] = filter_input(INPUT_POST, 'street_number', FILTER_SANITIZE_STRING);
        $inputs['street_name'] = filter_input(INPUT_POST, 'street_name', FILTER_SANITIZE_STRING);
        $inputs['city'] = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $inputs['state'] = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
        $inputs['zip_code'] = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
        $inputs['plan_name'] = filter_input(INPUT_POST, 'plan_name', FILTER_SANITIZE_STRING);
        $inputs['sales_price'] = filter_input(INPUT_POST, 'sales_price', FILTER_SANITIZE_STRING);
        $inputs['elevation'] = filter_input(INPUT_POST, 'elevation', FILTER_SANITIZE_STRING);
        $inputs['finish'] = filter_input(INPUT_POST, 'finish', FILTER_SANITIZE_STRING);
        $inputs['square_footage'] = filter_input(INPUT_POST, 'square_footage', FILTER_SANITIZE_STRING);
        $inputs['beds'] = filter_input(INPUT_POST, 'beds', FILTER_SANITIZE_STRING);
        $inputs['baths'] = filter_input(INPUT_POST, 'baths', FILTER_SANITIZE_STRING);
        $inputs['description'] = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        
//        $inputs['description'] = filter_input(INPUT_POST, 'delete-'., FILTER_VALIDATE_BOOLEAN);

//        $purifier = new HTMLPurifier(); //TODO make purfier work
        $home = new Home();

        foreach ($inputs as $input => $index) {
            $clean_inputs[$input] = htmlspecialchars($index); //TODO make purfier work
        }
        if (!empty($clean_inputs) && isset($clean_inputs) && isset($_SESSION['add_homes'])) {
            $result = $home->add_home_from_array($clean_inputs);
        } else if (!empty($clean_inputs) && isset($clean_inputs) && isset($_SESSION['edit_homes'])) {
            $home->edit_home_from_array($clean_inputs, $_SESSION['id']);
        } else {
            $error = "Something went wrong, please try to log in again";
            header('Location: .');
        }
        $i=0;

        if(isset($result)){
            //this means insert was successful
            $_SESSION['lastId'] = $result;

            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                //$target_dir . base64_encode($_SESSION['lastId'] . '-' . $i);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["photo"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
                move_uploaded_file($_FILES['photo']['tmp_name'], '../'.$target_file);
                $image_object = new Image();
                if(isset($result)){
                    $image_object->add_image($target_file, $result);
                }else{
                    $image_object->add_image($target_file, $_SESSION['id']);
                }

            } else {
                $error = "File was not an image";
                include('errors/generic_error.php');
                $uploadOk = 0;
            }

            header('Location: .?action=success');
        }else if(isset($_SESSION['id'])){
            //this means an update was performed
            header('Location: .?action=success');
        }else {
            $error = $_SESSION['error'] = "Something went wrong, please try to log in again";
            if(isset($_SESSION['edit_home'])){
                include('errors/generic_error.php');
            }elseif(isset($_SESSION['add_home'])){
                include('errors/generic_error.php');
            }

//
        }


//        if (isset($_SESSION['id'])) {
//            $_SESSION['id'];
//
//        } elseif (isset($_SESSION['lastId'])) {
//            $_SESSION['lastId'];
//            header('Location: .?action=success');
//        } else {
//            include('errors/generic_error.php');
//        }
        break;

    case 'success':
        $home = new Home();
        if(isset($_SESSION['lastId'])){
            $home = $home->get_home($_SESSION['lastId']);
        }elseif(isset($_SESSION['id'])){
            $home = $home->get_home($_SESSION['id']);
        }

        include('success.php');
        break;
    case 'edit_home':
        if ($_SESSION['user']) {
            $_SESSION['edit_homes'] = true;
            $home = new Home();
            $homes = $home->get_homes();
            $image_object = new Image();
            include('homes/view_all_homes.php');
        } else {
            $_SESSION['error'] = "Something went wrong, please try to log in again";
            header('Location: .');
        }
        break;
    case 'delete_home':
        if ($_SESSION['user']) {
            $_SESSION['delete_homes'];
            include('homes/delete_home.php');
        } else {
            $error = "Something went wrong, please try to log in again";
            header('Location: .');
        }
        break;
    case 'add_card':
        if ($_SESSION['logged_in'] && $_SESSION['user']) {
            include('cards/add_card.php');
        } else {
            $error = "Something went wrong, please try to log in again";
            header('Location: .');
        }
        break;
    case 'edit_card':
        if ($_SESSION['logged_in'] && $_SESSION['user']) {
            include('cards/edit_card.php');
        } else {
            $error = "Something went wrong, please try to log in again";
            header('Location: .');
        }
        break;
    case 'delete_card':
        if ($_SESSION['logged_in'] && $_SESSION['user']) {
            include('cards/delete_card.php');
        } else {
            $error = "Something went wrong, please try to log in again";
            header('Location: .');
        }
        break;
    default:
        $_SESSION['error'] = "Something went wrong, please try to log in again";
        header('Location: .');
        break;
}