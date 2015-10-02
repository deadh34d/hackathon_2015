<?php

require_once('database.class.php');

function get_plans()
{
    $db = Database::connect();
    $query = 'SELECT * FROM plans';
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result;
}

function get_plan($id)
{
    $db = Database::connect();
    $query = 'SELECT * FROM plans WHERE plans.id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result;
}

function delete_plan($id)
{
    $db = Database::connect();
    $query = 'DELETE FROM plans WHERE plans.id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $id);
    $result = $statement->execute();
    $statement->closeCursor();
    return $result;
}

function add_plan($sd, $lot, $sold, $street_num,
                  $street_name, $city, $state, $zip_code,
                  $plan_name, $sales_price, $elevation,
                  $finish)
{
    $db = Database::connect();

    $query = "INSERT INTO plans
              (subdivision, lot, sold, street_number,
               street_name, city, state, zip_code,
               plan_name, sales_price, elevation,
               finish)
              VALUES
              ('$sd', $lot, '$sold', $street_num,
               '$street_name', '$city', '$state',
               $zip_code, $plan_name, '$sales_price',
               '$elevation', '$finish')";
    $db->exec($query);
}
