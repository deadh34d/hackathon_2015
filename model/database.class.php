<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 6/27/2015
 * Time: 9:11 AM
 */
//this is a test string, to see if this commits after being ignored
//test 2
//test 3

class Database {

    private static $dsn = 'mysql:host=mysql.designeroid.com;dbname=rsihackathon;charset=utf8';
    private static $username = 'rsihackathon';
    private static $password = 'majormel37';
    private static $db;

    function __construct(){}

    public static function connect(){
        if(!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
                self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
//                self::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); TODO: check in to prepared statements later
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                print_r($error_message);
//                include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}


?>
