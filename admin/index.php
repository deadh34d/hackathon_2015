<?php
require('../config.php');
require_once('model/admin_db.php');
require_once('php_libs/HTMLPurifier.standalone.php');
require_once('model/home.class.php');
require_once('model/admin_db.php');
//require_once("php_libs/PasswordHash.php");
require_once('model/image.class.php');

//$lifetime = 60 * 60;
//session_set_cookie_params($lifetime, '/');
session_start();

if (isset($_POST['action'])) {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
} else if (isset($_GET['action'])) { //filter_input returns false if incorrect, so evaluating to true works.
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
} else if (isset($_SERVER['CONTENT_LENGTH']) && $_SERVER['CONTENT_LENGTH'] > 3145728) {
    $action = null;
    $error = "File too large.";
    include('errors/generic_error.php');
} else {
    $action = 'admin';
}

switch ($action) {


    //------------------Login Controllers-------------------------//
    case 'admin':
        if (isset($_SESSION['user'])) {
            include('admin_panel.php');
        } else {
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
//                    $_SESSION['user'] = $adminDB->getAdminUsernameByToken($valid_token['sessionID']);
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
            $adminDB->setSessionToken(session_id(), $_SESSION['user']);
            if ($rememberMe) { //TODO
//                setcookie("PHPSESSID", session_id(), "/");
//                $adminDB->setSessionToken(session_id(), $login);
            }
            include('admin_panel.php');
        } else {
            $error = "Invalid login credentials.";
            header("Location: .");
        }
        // passwords didn't match, show an error


        break;
    //------------------Login Controllers-------------------------//
    //---------------------Admin Views------------------------//
    case 'add_admin_page':
        if ($_SESSION['user']) {
            $page_action = 'add';
            $admin_object = new AdminDB();

            include('admin/modify_admin.php');
        } else {
            error_unauthorized();
        }
        break;
    case 'edit_admin_page':
        if ($_SESSION['user']) {
            $page_action = 'edit';
            $admin_object = new AdminDB();
            $admins = $admin_object->get_admins();
            include('admin/view_all_admins.php');
        } else {
            error_unauthorized();
        }
        break;
    case 'delete_admin_page':
        if ($_SESSION['user']) {
            $page_action = 'delete';
            $admin_object = new AdminDB();
            $admins = $admin_object->get_admins();
            include('admin/view_all_admins.php');
        } else {
            error_unauthorized();
        }
        break;
    case 'edit_admin_form':
        if ($_SESSION['user']) {
            $page_action = 'edit';
            $admin_object = new AdminDB();
            $admin = $admin_object->getAdminByToken(session_id());
            include('admin/modify_admin.php');
        } else {
            error_unauthorized();
        }
        break;
    //---------------------Admin Views------------------------//
    //---------------------Admin Controllers------------------------//
    case 'add_admin':
        if ($_SESSION['user']) {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = password_hash(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS), PASSWORD_DEFAULT);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

            $admin_object = new AdminDB();
            $result = false;
            try {
                $result = $admin_object->create_admin($username, $password, $email);
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    header("Location: .?action=add_admin_page&error=" . base64_encode("There is already an existing user in the database with those credentials"));
                }
            }
            if ($result) {
                header("Location: .?action=success&message=" . base64_encode("The administrator was successfully added to the database"));
            } else {
                header("Location: .?action=error&message=" . base64_encode("The administrator could not be added. Please try again"));
            }
        } else {
            error_unauthorized();
        }
        break;
    case 'edit_admin':
        if ($_SESSION['user']) {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = password_hash(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS), PASSWORD_DEFAULT);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

            $admin_object = new AdminDB();
            $result = false;
            try {
                $result = $admin_object->modify_admin($username, $password, $email);
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    header("Location: .?action=add_admin_page&error=" . base64_encode("There is already an existing user in the database with those credentials"));
                }
            }
            if ($result) {
                header("Location: .?action=success&message=" . base64_encode("The administrator was successfully added to the database"));
            } else {
                header("Location: .?action=error&message=" . base64_encode("The administrator could not be added. Please try again"));
            }
        } else {
            error_unauthorized();
        }
        break;
    case 'delete_admin':
        if ($_SESSION['user']) {
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

            $admin_object = new AdminDB();
            $result = false;
            try {
                $result = $admin_object->delete_admin($id);
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    header("Location: .?action=add_admin_page&error=" . base64_encode("There is already an existing user in the database with those credentials"));
                }
            }
            if ($result) {
                header("Location: .?action=success&message=" . base64_encode("The administrator was successfully deleted from the database"));
            } else {
                header("Location: .?action=error&message=" . base64_encode("The administrator could not be deleted"));
            }

        } else {
            error_unauthorized();
        }
        break;
    //---------------------Admin Controllers------------------------//


    //-----------------------Home Views---------------------------//
    case 'add_home_page':
        if ($_SESSION['user']) {
            $page_action = 'add';
            $home_object = new Home();
            $realtors = $home_object->get_realtors();
            include('homes/modify_home.php');
        } else {
            error_unauthorized();
        }
        break;
    case 'edit_home_page':
        if ($_SESSION['user']) {
            $home = new Home();
            $homes = $home->get_homes();
            $realtors = $home->get_realtors();
            $image_object = new Image();
//            $images = $image_object->get_images_for_home($id);
            $page_action = 'edit';
            include('homes/view_all_homes.php');
        } else {
            $error = "The home wasn't able to be modified in the database. Please try again.";
            header("Location: .?error=" . base64_encode($error));
        }
        break;
    case 'delete_home_page':
        if ($_SESSION['user']) {
            $home = new Home();
            $homes = $home->get_homes();
            $image_object = new Image();
            $page_action = 'delete';
            include('homes/view_all_homes.php');
        } else {
            error_unauthorized();
        }
        break;
    //-----------------------/Home Views---------------------------//
    //----------------------/Home Controllers-----------------------//
    case 'commit_home':
        if ($_SESSION['user']) {
            $inputs = [];
            $inputs['subdivision'] = filter_input(INPUT_POST, 'subdivision', FILTER_SANITIZE_STRING);
            $inputs['lot'] = filter_input(INPUT_POST, 'lot', FILTER_SANITIZE_STRING);
            $inputs['sold'] = filter_input(INPUT_POST, 'sold', FILTER_VALIDATE_STRING);

            if (isSet($inputs['sold'])) {
                $inputs['sold'] = 1;
            }
            else {
                $inputs['sold'] = 0;
            }

            $inputs['street_number'] = filter_input(INPUT_POST, 'street_number', FILTER_SANITIZE_STRING);
            $inputs['street_name'] = filter_input(INPUT_POST, 'street_name', FILTER_SANITIZE_STRING);
            $inputs['city'] = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
            $inputs['state'] = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
            $inputs['zip_code'] = filter_input(INPUT_POST, 'zip_code', FILTER_SANITIZE_STRING);
            $inputs['plan_name'] = filter_input(INPUT_POST, 'plan_name', FILTER_SANITIZE_STRING);
            $inputs['sales_price'] = filter_input(INPUT_POST, 'sales_price', FILTER_SANITIZE_STRING);
            $inputs['elevation'] = filter_input(INPUT_POST, 'elevation', FILTER_SANITIZE_STRING);
            $inputs['finish'] = filter_input(INPUT_POST, 'finish', FILTER_SANITIZE_STRING);
            $inputs['square_footage'] = filter_input(INPUT_POST, 'square_footage', FILTER_SANITIZE_STRING);
            $inputs['beds'] = filter_input(INPUT_POST, 'beds', FILTER_SANITIZE_STRING);
            $inputs['baths'] = filter_input(INPUT_POST, 'baths', FILTER_SANITIZE_STRING);
            $inputs['description'] = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $inputs['id'] = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $inputs['mls'] = filter_input(INPUT_POST, 'mls', FILTER_SANITIZE_URL);
            $inputs['realtor_id'] = filter_input(INPUT_POST, 'realtor_id', FILTER_SANITIZE_NUMBER_INT);

            $page_action = filter_input(INPUT_POST, 'page_action', FILTER_SANITIZE_STRING);


//        $inputs['description'] = filter_input(INPUT_POST, 'delete-'., FILTER_VALIDATE_BOOLEAN);

//        $purifier = new HTMLPurifier(); //TODO make purfier work
            try {
                $home = new Home();
                $clean_inputs = [];

                foreach ($inputs as $index => $input) {
                    $clean_inputs[$index] = $input; //TODO make purfier work
                }

                if (!empty($clean_inputs) && isset($clean_inputs)) {
                    if ($page_action == 'add') {
                        $result = $home->add_home_from_array($clean_inputs);
                    } elseif ($page_action == 'edit') {
                        $result = $home->edit_home_from_array($clean_inputs, $clean_inputs['id']);
                        if ($result['lastId'] == 0) {
                            $result['lastId'] = $clean_inputs['id'];
                        }
                    } else {
                        header("Location: .?error=" . base64_encode("There was an error. Please try again."));
                    }
                }
            }
            catch(PDOException $e) {
                header("Location: .?error=" . base64_encode("There was an error adding the home to the "
                    . "home to the database. Please check the entered information and try again." . $e));
                die();
            }
            catch (Exception $e) {
                header("Location: .?error=" . base64_encode("There was an error. Please try again." . $e));
                die();
            }

            if (isset($result['success']) && $result['success']) {
                if (count($_FILES['photos']['name']) > 0) {
                    $file_ary = reArrayFiles($_FILES['photos']);

                    foreach ($file_ary as $index => $file) {
                        $filename = filter_var($file['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $error = filter_var($file['error'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        if ($filename == '' || $error == 4) {
                            break;
                        } elseif ($error == 0) {
                            $target_dir = "images/";
                            $target_file = $target_dir . basename($filename);
                            $tmp_name = filter_var($file['tmp_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                            $size = getimagesize($tmp_name);
                            if ($size !== false) {

                                $i = '';
                                while (file_exists($target_dir . $target_file)) {
                                    $i++;
                                }
                                $target_file = $target_file . $i;

                                move_uploaded_file($tmp_name, '../' . $target_file);
                                $image_object = new Image();
                                $add_image_result = $image_object->add_image($target_file, $result['lastId']);
                                if ($add_image_result) {
                                    $file_upload_status[$index] = true;
                                }
                            }
                        }
                    }
                } else {
                    header("Location: .?error=" . base64_encode("There was an error. Please try again."));
                }
                if (isset($file_upload_status)) {
                    foreach ($file_upload_status as $i => $status) {
                        if ($status == false) {
                            header("Location: .?error=" . base64_encode("There was an error. Please try again. Information: " .
                                    "File " . $i . " failed to upload."));
                        }
                    }
                }
                if ($page_action == 'edit') {
                    $success_message = "The home was successfully edited.";
                    $result['lastId'] = $clean_inputs['id'];
                } else {
                    $success_message = "The home was successfully entered in to the database.";
                }

                header("Location: .?action=success&id=" . $result['lastId'] . "&message=" . base64_encode($success_message));
            } elseif (!$result['success']) {
                header("Location: .?error=" . base64_encode("There was an error adding the home to the database. Please check the input and try again."));
            }
        } else {
            error_unauthorized();
        }
        break;
    case 'edit_home':
        if (isset($_SESSION['user'])) {
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $image_object = new Image();
            $home_object = new Home();

            $images = $image_object->get_images_for_home($id);
            $home = $home_object->get_home($id);
            $realtors = $home_object->get_realtors();

            $page_action = 'edit';
            include('homes/modify_home.php');
        } else {
            error_unauthorized();
        }
        break;
    case 'delete_home':
        if (isset($_SESSION['user'])) {
            if (!isset($home)) {
                $home = new Home();
            }
            $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
            $result = $home->delete_home($id);
            if ($result) {
                $success_message = "Home has been deleted.";
                header("Location: .?action=success&id=" . $result['lastId'] . "&message=" . base64_encode($success_message));
            }

        } else {
            error_unauthorized();
        }
        break;
    //----------------------Home Controllers-----------------------//


    //-----------------------Utilities-----------------------------//
    case 'success':
        $home = new Home();
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $home = $home->get_home($id);
        include('success.php');
        break;
    case 'slider_success':
        $home = new Home();
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $home = $home->get_slider($id);
        include('slider_success.php');
        break;
    case 'delete_image':
        if ($_SESSION['user']) {
            $image_id = filter_input(INPUT_POST, 'image_id', FILTER_SANITIZE_NUMBER_INT);
            $home = new Home();
            $homes = $home->get_homes();
            $image_object = new Image();
            if ($image_id === null) {
                http_response_code(500);
                echo json_encode(false);
                break;
            }
            $result = $image_object->delete_image_by_id($image_id);
            if ($result) {
                http_response_code(200);
                echo json_encode($result);
            } else {
                http_response_code(500);
            }
        } else {
            error_unauthorized();
        }
        break;
    //-----------------------/Utilities-----------------------------//


    //---------------------Slider Views----------------------------//
    case 'edit_slider_page':
        if ($_SESSION['user']) {
            $page_action = 'edit';
            $home = new Home();
            $sliders = $home->get_sliders();
            include('admin/view_all_sliders.php');
        } else {
            error_unauthorized();
        }
        break;
    case 'delete_slider_page':
        if ($_SESSION['user']) {
            $home = new Home();
            $sliders = $home->get_sliders();
            $page_action = 'delete';
            include('admin/view_all_sliders.php');
        } else {
            error_unauthorized();
        }
        break;
    case 'add_slider_page':
        if ($_SESSION['user']) {
            $home = new Home();
            $sliders = $home->get_sliders();
            $page_action = 'add';
            include('admin/modify_slider.php');
        } else {
            error_unauthorized();
        }
        break;
    case 'edit_slider_form':
        if ($_SESSION['user']) {
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $home = new Home();
            $slider = $home->get_slider($id);
            $page_action = 'edit';
            include('admin/modify_slider.php');

        }
        break;
    //---------------------/Slider Views---------------------------//
    //---------------------Slider Controllers----------------------//
//    case 'add_slider':
//        if ($_SESSION['user']) {
////            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
//            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
//            $local_url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
//            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
//
//            $home = new Home();
//            $image_object = new Image();
//            $result = $image_object->add_slider($title, $local_url, $description);
//            if ($result) {
//                if (count($_FILES['photo']['name']) > 0) {
//                    if ($_FILES['photo']['name'] == '' || $_FILES['photo']['error'] == 4) {
//                        break;
//                    } else {
//                        $target_dir = "slider_images/";
//                        $target_file = $target_dir . basename($_FILES['photo']['name']);
//                        $tmp_name = filter_var($_FILES['photo']['tmp_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//                        $size = getimagesize($tmp_name);
//                        if ($size !== false) {
//                            $i = '';
//                            while (file_exists($target_dir . $target_file)) {
//                                $i++;
//                            }
//                            $target_file = $target_file . $i;
//                            $move_result = move_uploaded_file($tmp_name, '../' . $target_file);
//                            if (!$move_result) {
//                                header("Location: .?error=" . base64_encode("There was an error. Please try again."));
//                            } else {
//                                header("Location: .?action=success&message=" . base64_encode("The slider was successsfully added."));
//                            }
//                        }
//                    }
//                }
//            } else {
//                header("Location: .?error=" . base64_encode("There was an error. Please try again."));
//            }
//        } else {
//            error_unauthorized();
//        }
//        break;
    case 'add_slider':
        if ($_SESSION['user']) {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $local_url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);

            $home = new Home();
            $image_object = new Image();

//            $upload_result = $image_object->upload_image('photo', $_SERVER['DOCUMENT_ROOT'] . 'idk/slider_images');
            try {
                $upload_result = $image_object->upload_image('photo', 'slider_images/');
            } catch (Exception $e) {

                die($e);
            }
            if ($upload_result['status'] == true) {
                $add_slider_result = $image_object->add_slider($title, $app_path . '/' . $upload_result['path'], $description);
                if ($add_slider_result) {
                    header("Location: .?action=success&message=" . base64_encode("The slider was successsfully added."));
                }
            } else {
                header("Location: .?action=add_slider_page&error=" . base64_encode("There was an error. Please try again." . $upload_result['errors'][0]));
            }
        } else {
            error_unauthorized();
        }
        break;
    case 'edit_slider':
        if ($_SESSION['user']) {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $local_url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);

            $home = new Home();
            $image_object = new Image();

//            $upload_result = $image_object->upload_image('photo', $_SERVER['DOCUMENT_ROOT'] . 'idk/slider_images');
            $upload_result = $image_object->upload_image('photo', 'slider_images/');
            if ($upload_result['status'] == true) {
                $add_slider_result = $image_object->edit_slider($id, $title, $app_path . '/' . $upload_result['path'], $description);
                if ($add_slider_result) {
                    header("Location: .?action=success&message=" . base64_encode("The slider was successsfully edited."));
                }
            } else {
                header("Location: .?action=add_slider_page&error=" . base64_encode("There was an error. Please try again." . $upload_result['errors'][0]));
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
                //header('Location: .?action=slider_success&id=' . $id . '&message=' . base64_encode("Slider was successfully deleted"));
                header('Location: .?action=slider_success&id=' . $id);
            } else {
                header('Location: .?action=failure&message="' . base64_encode("The image was unable to be deleted from the database"));
            }
        } else {
            error_unauthorized();
        }
        break;
    //---------------------Slider Controllers----------------------//
    case 'add_plan':
        if ($_SESSION['user']) {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $local_url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);

            $home = new Home();
            $image_object = new Image();

            $upload_result = $image_object->upload_image('photo', 'plan_images/');
            if ($upload_result['status'] == true) {
                $add_plan_result = add_plan($title, $app_path . '/' . $upload_result['path'], $description);
                if ($add_plan_result) {
                    header("Location: .?action=success&message=" . base64_encode("The plan was successsfully added."));
                }
            } else {
                header("Location: .?action=add_plan_page&error=" . base64_encode("There was an error. Please try again." . $upload_result['errors'][0]));
            }
        } else {
            error_unauthorized();
        }
        break;
        break;
    case 'add_plan_form':

        break;
    case 'edit_plan':
        break;
    case 'edit_plan_form':
        break;
    case 'delete_plan':
        break;
    case 'delete_plan_form':
        break;

//    //---------------------Card Views------------------------//
//    case 'add_card_page':
//        if ($_SESSION['logged_in'] && $_SESSION['user']) {
//            include('cards/add_card.php');
//        } else {
//            $_SESSION['home_error'] = "Something went wrong, please try to log in again";
//            header('Location: .');
//        }
//        break;
//    case 'edit_card_page':
//        if ($_SESSION['logged_in'] && $_SESSION['user']) {
//            include('cards/edit_card.php');
//        } else {
//            $_SESSION['home_error'] = "Something went wrong, please try to log in again";
//            header('Location: .');
//        }
//        break;
//    case 'delete_card_page':
//        if ($_SESSION['logged_in'] && $_SESSION['user']) {
//            include('cards/delete_card.php');
//        } else {
//            $_SESSION['home_error'] = "Something went wrong, please try to log in again";
//            header('Location: .');
//        }
//        break;
//    //---------------------/Card Views------------------------//
//    //---------------------Card Controllers------------------------//
//    case 'add_card':
//        if ($_SESSION['logged_in'] && $_SESSION['user']) {
//            include('cards/add_card.php');
//        } else {
//            $_SESSION['home_error'] = "Something went wrong, please try to log in again";
//            header('Location: .');
//        }
//        break;
//    case 'edit_card':
//        if ($_SESSION['logged_in'] && $_SESSION['user']) {
//            include('cards/edit_card.php');
//        } else {
//            $_SESSION['home_error'] = "Something went wrong, please try to log in again";
//            header('Location: .');
//        }
//        break;
//    case 'delete_card':
//        if ($_SESSION['logged_in'] && $_SESSION['user']) {
//            include('cards/delete_card.php');
//        } else {
//            $_SESSION['home_error'] = "Something went wrong, please try to log in again";
//            header('Location: .');
//        }
//        break;
//    //---------------------/Card Controllers------------------------//


    default:
        error_unauthorized();
        break;
}