<?php
//set_include_path('designeroid.com/idk');
require_once('../config.php');
require_once('model/database.class.php');


function get_communities()
{
    $db = Database::connect();

    $query = "SELECT * FROM regions";
    $communities = $db->query($query);
    return $communities;
}
