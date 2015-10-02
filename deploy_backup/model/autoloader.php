<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 8/13/2015
 * Time: 3:19 PM
 */

function spl_autoload_register($class_name)
{
    try {
        include $class_name . '.php';
        include $class_name . '_db.php';
        include 'model/classes/' . $class_name . '.php';
        include 'model/' . $class_name . '.php';
        include 'model/' . $class_name . '_db.php';
    } catch (Exception $e) {
        if ($debug = true) {
            print_r($e);
        }
    }
}