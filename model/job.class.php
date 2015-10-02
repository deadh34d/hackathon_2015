<?php

require_once('database.class.php');

/**
 * Created by PhpStorm.
 * User: development
 * Date: 8/11/2015
 * Time: 1:25 PM
 */
class job
{
    public function get_jobs()
    {
        $db = Database::connect();
        $query = 'SELECT * FROM jobs';
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }

    public function get_job($id)
    {
        $db = Database::connect();
        $query = 'SELECT * FROM jobs WHERE jobs.id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }
    public function delete_job($id)
    {
        $db = Database::connect();
        $query = 'DELETE FROM jobs WHERE jobs.id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }
    public function get_job_coords($id)
    {
        $db = Database::connect();
        $query = 'SELECT `x_coord`, `y_coord` FROM jobs WHERE jobs.id = 1';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }

    public function add_job($sd, $lot, $sold, $street_num,
                            $street_name, $city, $state, $zip_code,
                            $plan_name, $sales_price, $elevation,
                            $finish)
    {
        $db = Database::connect();

        $query = "INSERT INTO jobs
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

    public function add_job_from_array($input_array)
    {
        $db = Database::connect();

        $query = "INSERT INTO jobs
              (subdivision, lot, sold, street_number,
               street_name, city, state, zip_code,
               plan_name, sales_price, elevation,
               finish, square_footage, beds, baths, description, mls)
              VALUES
              (:subdivision, :lot, :sold, :street_number,
               :street_name, :city, :state, :zip_code,
               :plan_name, :sales_price, :elevation,
               :finish, :square_footage, :beds, :baths, :description, :mls)";
        $statement = $db->prepare($query);
        $statement->bindValue(":subdivision", $input_array['subdivision']);
        $statement->bindValue(":lot", $input_array['lot']);
        $statement->bindValue(":sold", $input_array['sold']);
        $statement->bindValue(":street_number", $input_array['street_number']);
        $statement->bindValue(":street_name", $input_array['street_name']);
        $statement->bindValue(":city", $input_array['city']);
        $statement->bindValue(":state", $input_array['state']);
        $statement->bindValue(":zip_code", $input_array['zip_code']);
        $statement->bindValue(":plan_name", $input_array['plan_name']);
        $statement->bindValue(":sales_price", $input_array['sales_price']);
        $statement->bindValue(":elevation", $input_array['elevation']);
        $statement->bindValue(":finish", $input_array['finish']);
        $statement->bindValue(":square_footage", $input_array['square_footage']);
        $statement->bindValue(":beds", $input_array['beds']);
        $statement->bindValue(":baths", $input_array['baths']);
        $statement->bindValue(":description", $input_array['description']);
        $statement->bindValue(":mls", $input_array['mls']);
        $resultArray['success'] = $statement->execute();
        $resultArray['lastId'] = $db->lastInsertId();
        $resultArray['error'] = $statement->errorInfo();
        $statement->closeCursor();

        return $resultArray;

    }

    public function edit_job_from_array($input_array, $id)
    {
        $db = Database::connect();

        $query = "UPDATE jobs
              SET subdivision = :subdivision,
              lot = :lot,
              sold = :sold,
              street_number = :street_number,
              street_name = :street_name,
              city = :city,
              state = :state,
              zip_code = :zip_code,
              plan_name = :plan_name,
              sales_price = :sales_price,
              elevation = :elevation,
              finish = :finish,
              square_footage = :square_footage,
              beds = :beds,
              baths = :baths,
              description = :description,
              mls = :mls,
              realtor_id = :realtor_id
              WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(":subdivision", $input_array['subdivision']);
        $statement->bindValue(":lot", $input_array['lot']);
        $statement->bindValue(":sold", $input_array['sold']);
        $statement->bindValue(":street_number", $input_array['street_number']);
        $statement->bindValue(":street_name", $input_array['street_name']);
        $statement->bindValue(":city", $input_array['city']);
        $statement->bindValue(":state", $input_array['state']);
        $statement->bindValue(":zip_code", $input_array['zip_code']);
        $statement->bindValue(":plan_name", $input_array['plan_name']);
        $statement->bindValue(":sales_price", $input_array['sales_price']);
        $statement->bindValue(":elevation", $input_array['elevation']);
        $statement->bindValue(":finish", $input_array['finish']);
        $statement->bindValue(":square_footage", $input_array['square_footage']);
        $statement->bindValue(":beds", $input_array['beds']);
        $statement->bindValue(":baths", $input_array['baths']);
        $statement->bindValue(":description", $input_array['description']);
        $statement->bindValue(":mls", $input_array['mls']);
        $statement->bindValue(":realtor_id", $input_array['realtor_id']);
        $statement->bindValue(":id", $id);

        $resultArray['success'] = $statement->execute();
        $resultArray['lastId'] = $db->lastInsertId();
        $resultArray['error'] = $statement->errorInfo();
        $statement->closeCursor();

        return $resultArray;

    }

    public function search_jobs($filter)
    {
        $db = Database::connect();
        $filter_query = $filter['price'] . " AND " . $filter['sqft']
            . " AND " . $filter['bed'] . " AND " . $filter['location'];
        $query = "SELECT * FROM jobs WHERE $filter_query";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }
    public function get_sliders(){
        $db = Database::connect();
        $query = "SELECT * FROM sliders";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }
    public function get_slider($id){
        $db = Database::connect();
        $query = "SELECT * FROM sliders WHERE :id = id";
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }

    public function get_realtors() {
        $db = Database::connect();
        $query = "SELECT * FROM realtors";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }
    public function get_realtor($id) {
        $db = Database::connect();
        $query = "SELECT name, url FROM realtors, jobs
                  WHERE jobs.realtor_id = realtors.realtor_id
                  AND jobs.id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }

}