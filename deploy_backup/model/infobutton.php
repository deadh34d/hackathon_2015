<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 8/14/2015
 * Time: 12:22 PM
 */
require_once('../config.php');
require_once('model/database.class.php');


function get_infobuttons()
{
    $db = Database::connect();

    $query = "SELECT * FROM infobuttons";
    $infobuttons = $db->query($query);
    return $infobuttons;
}