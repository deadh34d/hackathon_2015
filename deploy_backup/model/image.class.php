<?php

/**
 * Created by PhpStorm.
 * User: development
 * Date: 8/19/2015
 * Time: 5:22 PM
 */
class Image
{
    public function get_images()
    {
        $db = Database::connect();
        $query = 'SELECT * FROM images';
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }

    public function get_images_for_home($id)
    {
        $db = Database::connect();
        $query = 'SELECT * FROM images WHERE images.home = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }

    public function add_image($url, $homeID)
    {
        $db = Database::connect();
        $query = 'INSERT INTO images (local_url, home, is_preview_image) VALUES (:url, :homeID, 1);';
        $statement = $db->prepare($query);
        $statement->bindValue(":homeID", $homeID);
        $statement->bindValue(":url", $url);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }

    public function get_thumbnails()
    {
        $db = Database::connect();
        $query = 'SELECT * FROM images WHERE is_preview_image = 1;';
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }

    public function get_thumbnail($id)
    {
        $db = Database::connect();
        $query = 'SELECT * FROM images WHERE images.home = :id AND is_preview_image = 1;';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }
}