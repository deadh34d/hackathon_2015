<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 8/29/2015
 * Time: 5:06 PM
 */
require_once('model/database.class.php');
//$price = [];
//$j = 0;
//for($i = 100000;$i<1500000;$i+=25000){
//
//    $price[]+=$i;
//
//    add_prices($price[$j]);
//    $j++;
//} internal mass insert statement loop

//http://stackoverflow.com/questions/6369887/alternative-to-money-format-function-in-php-on-windows-platform
function get_zips()
{
    $db = Database::connect();
    $query = 'SELECT * FROM zipcodes';
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
//    $result = array (
//        0 =>
//            array (
//                'elevation' => 'A',
//            ),
//        1 =>
//            array (
//                'elevation' => 'B',
//            ),
//        2 =>
//            array (
//                'elevation' => 'C',
//            ),
//        3 =>
//            array (
//                'elevation' => 'D',
//            ),
//        4 =>
//            array (
//                'elevation' => 'E',
//            ),
//        5 =>
//            array (
//                'elevation' => 'F',
//            ),
//        6 =>
//            array (
//                'elevation' => 'G',
//            ),
//    );
    sort($result);
    return $result;
}

function get_street_names()
{
    $db = Database::connect();
    $query = 'SELECT street_name FROM homes';
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    sort($result);
    return $result;
}
function get_locations()
{
//    $db = Database::connect();
//    $query = 'SELECT * FROM locations';
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $locations = $statement->fetchAll(PDO::FETCH_ASSOC);
//    $statement->closeCursor();
//    $locations = array(
//        array('Aiken' => "South Carolina"),
//        array('Grovetown' => 'Georgia'),
//        array('Evans' => 'Georgia')
//    );
    $locations = array (
        0 =>
            array (
                'city' => 'Aiken',
                'state' => 'South Carolina',
            ),
        1 =>
            array (
                'city' => 'Evans',
                'state' => 'Georgia',
            ),
        2 =>
            array (
                'city' => 'Grovetown',
                'state' => 'Georgia',
            ),
    );
    sort($locations);
    return $locations;
}

function get_elevations()
{
    $db = Database::connect();
    $query = 'SELECT * FROM elevations';
    $statement = $db->prepare($query);
    $statement->execute();
    $elevations = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
//    $elevations = ['A','B','C','D','E','F','G'];
    $elevations = array (
        0 =>
            array (
                'elevation' => 'A',
            ),
        1 =>
            array (
                'elevation' => 'B',
            ),
        2 =>
            array (
                'elevation' => 'C',
            ),
        3 =>
            array (
                'elevation' => 'D',
            ),
        4 =>
            array (
                'elevation' => 'E',
            ),
        5 =>
            array (
                'elevation' => 'F',
            ),
        6 =>
            array (
                'elevation' => 'G',
            ),
    );
    sort($elevations);
    return $elevations;
}

function get_plan_names()
{
//    $db = Database::connect();
//    $query = 'SELECT * FROM plans';
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
//    $statement->closeCursor();
//    $result = [2135,2145,2305,2351,2458,3353,4458,4561,4578,4587,4844,5646,6542,6543,6544,6545,6546,6547,6548,6549,6550,6551,6552,7854,8855];
    $result = array (
        0 =>
            array (
                'plan_name' => '2135',
            ),
        1 =>
            array (
                'plan_name' => '2145',
            ),
        2 =>
            array (
                'plan_name' => '2305',
            ),
        3 =>
            array (
                'plan_name' => '2351',
            ),
        4 =>
            array (
                'plan_name' => '2458',
            ),
        5 =>
            array (
                'plan_name' => '3353',
            ),
        6 =>
            array (
                'plan_name' => '4458',
            ),
        7 =>
            array (
                'plan_name' => '4561',
            ),
        8 =>
            array (
                'plan_name' => '4578',
            ),
        9 =>
            array (
                'plan_name' => '4587',
            ),
        10 =>
            array (
                'plan_name' => '4844',
            ),
        11 =>
            array (
                'plan_name' => '5646',
            ),
        12 =>
            array (
                'plan_name' => '6542',
            ),
        13 =>
            array (
                'plan_name' => '6543',
            ),
        14 =>
            array (
                'plan_name' => '6544',
            ),
        15 =>
            array (
                'plan_name' => '6545',
            ),
        16 =>
            array (
                'plan_name' => '6546',
            ),
        17 =>
            array (
                'plan_name' => '6547',
            ),
        18 =>
            array (
                'plan_name' => '6548',
            ),
        19 =>
            array (
                'plan_name' => '6549',
            ),
        20 =>
            array (
                'plan_name' => '6550',
            ),
        21 =>
            array (
                'plan_name' => '6551',
            ),
        22 =>
            array (
                'plan_name' => '6552',
            ),
        23 =>
            array (
                'plan_name' => '7854',
            ),
        24 =>
            array (
                'plan_name' => '8855',
            ),
    );
    sort($result);
    return $result;
}

function get_finishes()
{
//    $db = Database::connect();
//    $query = 'SELECT * FROM finishes';
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
//    $statement->closeCursor();
$result = array (
    0 =>
        array (
            'finish' => 'Brick Accent',
        ),
    1 =>
        array (
            'finish' => 'Full Brick 4 Sides',
        ),
    2 =>
        array (
            'finish' => 'Full Brick Front',
        ),
    3 =>
        array (
            'finish' => 'Full Stone 4 Sides',
        ),
    4 =>
        array (
            'finish' => 'Stone Accent',
        ),
);

    sort($result);
    return $result;
}

function add_finish($finish) //internal use only
{
    $db = Database::connect();
    $query = 'INSERT INTO finishes (finish) VALUE (:finish)';
    $statement = $db->prepare($query);
    $statement->bindValue(":finish", $finish);
    $statement->execute();
    $statement->closeCursor();
}

function get_lots()
{
    $db = Database::connect();
    $query = 'SELECT * FROM lots';
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result;
}

function get_subdivisions()
{
//    $db = Database::connect();
//    $query = 'SELECT * FROM subdivisions';
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
//    $statement->closeCursor();
    $result = array (
        0 =>
            array (
                'subdivision' => 'Bartram Trail',
            ),
        1 =>
            array (
                'subdivision' => 'Blanchard',
            ),
        2 =>
            array (
                'subdivision' => 'Chastain Place',
            ),
        3 =>
            array (
                'subdivision' => 'Pine Ridge',
            ),
        4 =>
            array (
                'subdivision' => 'Tudor Branch',
            ),
    );
    sort($result);
    return $result;
}

function toMoney($val, $symbol = '$', $r = 2)
{


    $n = $val;
    $c = is_float($n) ? 1 : number_format($n, $r);
    $d = '.';
    $t = ',';
    $sign = ($n < 0) ? '-' : '';
    $i = $n = number_format(abs($n), $r);
    $j = (($j = strlen($i)) > 3) ? $j % 3 : 0;

    return $symbol . $sign . ($j ? substr($i, 0, $j) + $t : '') . preg_replace('/(\d{3})(?=\d)/', "$1" + $t, substr($i, $j));

}

function get_states()
{
//    $db = Database::connect();
//    $query = 'SELECT * FROM states';
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
//    $statement->closeCursor();
//    $result = ['South Carolina', 'Georgia'];
    $result = array (
        0 =>
            array (
                'state' => 'Georgia',
            ),
        1 =>
            array (
                'state' => 'South Carolina',
            ),
    );
    sort($result);
    return $result;
}

function get_cities(){
//{
//    $db = Database::connect();
//    $query = 'SELECT * FROM cities';
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
//    $statement->closeCursor();
//    $result = ['Aiken','Evans','Grovetown'];
//    $result = array (
//        0 => 'Aiken',
//        1 => 'Evans',
//        2 => 'Grovetown',
//    );
    $result = array (
        0 =>
            array (
                'city' => 'Aiken',
            ),
        1 =>
            array (
                'city' => 'Evans',
            ),
        3 =>
            array (
                'city' => 'Grovetown',
            )
    );
    sort($result);
    return $result;
}

function get_beds()
{
//    $db = Database::connect();
//    $query = 'SELECT * FROM beds';
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
//    $statement->closeCursor();
    $result = array (
        0 =>
            array (
                'bed' => '1',
            ),
        1 =>
            array (
                'bed' => '2',
            ),
        2 =>
            array (
                'bed' => '3',
            ),
        3 =>
            array (
                'bed' => '4',
            ),
        4 =>
            array (
                'bed' => '5',
            ),
        5 =>
            array (
                'bed' => '6',
            ),
    );
//    $result = [1, 2, 3, 4, 5, 6, 7, 8];
    sort($result);
    return $result;
}

function get_baths()
{
//    $db = Database::connect();
//    $query = 'SELECT * FROM baths';
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
//    $statement->closeCursor();
//    $result = [1, 2, 3, 4, 5, 6, 7, 8];
    $result = array (
        0 =>
            array (
                'bath' => '1',
            ),
        1 =>
            array (
                'bath' => '2',
            ),
        2 =>
            array (
                'bath' => '3',
            ),
        3 =>
            array (
                'bath' => '4',
            ),
        4 =>
            array (
                'bath' => '5',
            ),
    );
    sort($result);
    return $result;
}

function get_prices()
{
//    $db = Database::connect();
//    $query = 'SELECT * FROM prices';
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
//    $statement->closeCursor();
//    $result = [100000, 125000, 150000, 175000, 200000, 225000, 250000, 275000, 300000, 325000, 350000, 375000, 400000,
//        425000, 450000, 475000, 500000, 525000, 550000, 575000, 600000, 625000, 650000, 675000, 700000, 725000, 750000,
//        775000, 800000, 825000, 850000, 875000, 900000, 925000, 950000, 975000, 1000000, 1025000, 1050000, 1075000,
//        1100000, 1125000, 1150000, 1175000, 1200000, 1225000, 1250000, 1275000, 1300000, 1325000, 1350000, 1375000,
//        1400000, 1425000, 1450000, 1475000, 1500000];
    $result = array (
        0 =>
            array (
                'id' => '1',
                'price' => '100000',
            ),
        1 =>
            array (
                'id' => '2',
                'price' => '125000',
            ),
        2 =>
            array (
                'id' => '3',
                'price' => '150000',
            ),
        3 =>
            array (
                'id' => '4',
                'price' => '175000',
            ),
        4 =>
            array (
                'id' => '5',
                'price' => '200000',
            ),
        5 =>
            array (
                'id' => '6',
                'price' => '225000',
            ),
        6 =>
            array (
                'id' => '7',
                'price' => '250000',
            ),
        7 =>
            array (
                'id' => '8',
                'price' => '275000',
            ),
        8 =>
            array (
                'id' => '9',
                'price' => '300000',
            ),
        9 =>
            array (
                'id' => '10',
                'price' => '325000',
            ),
        10 =>
            array (
                'id' => '11',
                'price' => '350000',
            ),
        11 =>
            array (
                'id' => '12',
                'price' => '375000',
            ),
        12 =>
            array (
                'id' => '13',
                'price' => '400000',
            ),
        13 =>
            array (
                'id' => '14',
                'price' => '425000',
            ),
        14 =>
            array (
                'id' => '15',
                'price' => '450000',
            ),
        15 =>
            array (
                'id' => '16',
                'price' => '475000',
            ),
        16 =>
            array (
                'id' => '17',
                'price' => '500000',
            ),
        17 =>
            array (
                'id' => '18',
                'price' => '525000',
            ),
        18 =>
            array (
                'id' => '19',
                'price' => '550000',
            ),
        19 =>
            array (
                'id' => '20',
                'price' => '575000',
            ),
        20 =>
            array (
                'id' => '21',
                'price' => '600000',
            ),
        21 =>
            array (
                'id' => '22',
                'price' => '625000',
            ),
        22 =>
            array (
                'id' => '23',
                'price' => '650000',
            ),
        23 =>
            array (
                'id' => '24',
                'price' => '675000',
            ),
        24 =>
            array (
                'id' => '25',
                'price' => '700000',
            ),
        25 =>
            array (
                'id' => '26',
                'price' => '725000',
            ),
        26 =>
            array (
                'id' => '27',
                'price' => '750000',
            ),
        27 =>
            array (
                'id' => '28',
                'price' => '775000',
            ),
        28 =>
            array (
                'id' => '29',
                'price' => '800000',
            ),
        29 =>
            array (
                'id' => '30',
                'price' => '825000',
            ),
        30 =>
            array (
                'id' => '31',
                'price' => '850000',
            ),
        31 =>
            array (
                'id' => '32',
                'price' => '875000',
            ),
        32 =>
            array (
                'id' => '33',
                'price' => '900000',
            ),
        33 =>
            array (
                'id' => '34',
                'price' => '925000',
            ),
        34 =>
            array (
                'id' => '35',
                'price' => '950000',
            ),
        35 =>
            array (
                'id' => '36',
                'price' => '975000',
            ),
        36 =>
            array (
                'id' => '37',
                'price' => '1000000',
            ),
        37 =>
            array (
                'id' => '38',
                'price' => '1025000',
            ),
        38 =>
            array (
                'id' => '39',
                'price' => '1050000',
            ),
        39 =>
            array (
                'id' => '40',
                'price' => '1075000',
            ),
        40 =>
            array (
                'id' => '41',
                'price' => '1100000',
            ),
        41 =>
            array (
                'id' => '42',
                'price' => '1125000',
            ),
        42 =>
            array (
                'id' => '43',
                'price' => '1150000',
            ),
        43 =>
            array (
                'id' => '44',
                'price' => '1175000',
            ),
        44 =>
            array (
                'id' => '45',
                'price' => '1200000',
            ),
        45 =>
            array (
                'id' => '46',
                'price' => '1225000',
            ),
        46 =>
            array (
                'id' => '47',
                'price' => '1250000',
            ),
        47 =>
            array (
                'id' => '48',
                'price' => '1275000',
            ),
        48 =>
            array (
                'id' => '49',
                'price' => '1300000',
            ),
        49 =>
            array (
                'id' => '50',
                'price' => '1325000',
            ),
        50 =>
            array (
                'id' => '51',
                'price' => '1350000',
            ),
        51 =>
            array (
                'id' => '52',
                'price' => '1375000',
            ),
        52 =>
            array (
                'id' => '53',
                'price' => '1400000',
            ),
        53 =>
            array (
                'id' => '54',
                'price' => '1425000',
            ),
        54 =>
            array (
                'id' => '55',
                'price' => '1450000',
            ),
        55 =>
            array (
                'id' => '56',
                'price' => '1475000',
            ),
        56 =>
            array (
                'id' => '57',
                'price' => '1500000',
            ),
    );
    sort($result);
    return $result;
}

function add_price($price) //internal use only
{
    $db = Database::connect();
    $query = 'INSERT INTO prices (price) VALUE (:price)';
    $statement = $db->prepare($query);
    $statement->bindValue(":price", $price);
    $statement->execute();
    $statement->closeCursor();
}

function get_sqfts()
{
//    $db = Database::connect();
//    $query = 'SELECT * FROM sqfts';
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
//    $statement->closeCursor();
//    $result = [1000,1200,1400,1600,1800,2000,2200,2400,2600,2800,3000,3200,3400,3600,3800,4000,4200,4400,4600,4800,5000,5200,5400,5600,5800,6000];
    $result = array (
        0 =>
            array (
                'sqft' => '1000',
            ),
        1 =>
            array (
                'sqft' => '1200',
            ),
        2 =>
            array (
                'sqft' => '1400',
            ),
        3 =>
            array (
                'sqft' => '1600',
            ),
        4 =>
            array (
                'sqft' => '1800',
            ),
        5 =>
            array (
                'sqft' => '2000',
            ),
        6 =>
            array (
                'sqft' => '2200',
            ),
        7 =>
            array (
                'sqft' => '2400',
            ),
        8 =>
            array (
                'sqft' => '2600',
            ),
        9 =>
            array (
                'sqft' => '2800',
            ),
        10 =>
            array (
                'sqft' => '3000',
            ),
        11 =>
            array (
                'sqft' => '3200',
            ),
        12 =>
            array (
                'sqft' => '3400',
            ),
        13 =>
            array (
                'sqft' => '3600',
            ),
        14 =>
            array (
                'sqft' => '3800',
            ),
        15 =>
            array (
                'sqft' => '4000',
            ),
        16 =>
            array (
                'sqft' => '4200',
            ),
        17 =>
            array (
                'sqft' => '4400',
            ),
        18 =>
            array (
                'sqft' => '4600',
            ),
        19 =>
            array (
                'sqft' => '4800',
            ),
        20 =>
            array (
                'sqft' => '5000',
            ),
        21 =>
            array (
                'sqft' => '5200',
            ),
        22 =>
            array (
                'sqft' => '5400',
            ),
        23 =>
            array (
                'sqft' => '5600',
            ),
        24 =>
            array (
                'sqft' => '5800',
            ),
        25 =>
            array (
                'sqft' => '6000',
            ),
    );
    sort($result);
    return $result;
}

function add_sqft($sqft) //internal use only
{
    $db = Database::connect();
    $query = 'INSERT INTO sqfts (sqft) VALUE (:sqft)';
    $statement = $db->prepare($query);
    $statement->bindValue(":sqft", $sqft);
    $statement->execute();
    $statement->closeCursor();
}