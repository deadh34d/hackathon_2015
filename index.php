<?php
if(isset($_POST['action'])) {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
}
elseif(isset($_GET['action'])) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}
else {
    $action = 'default';
}

switch($action) {
    case 'default':
        //todo: default behavior
        break;
}
?>