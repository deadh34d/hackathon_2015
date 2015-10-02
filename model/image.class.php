<?php

require_once 'php_libs/upload.php';

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

    public function upload_image($HTMLName, $destination)
    {

        if (!empty($_FILES[$HTMLName])) {

            $upload = Upload::factory($destination, $_SERVER['DOCUMENT_ROOT']);
            $upload->file($_FILES[$HTMLName]);

            //set max. file size (in mb)
            $upload->set_max_file_size(5);

            //set allowed mime types
            $upload->set_allowed_mime_types(array('image/jpeg', 'image/png'));

            $results = $upload->upload();

            return $results;
        }
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
    public function get_preview_images_for_home($id)
    {
        $db = Database::connect();
        $query = 'SELECT * FROM images WHERE is_preview_image = 1;';
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }

    public function get_preview_images()
    {
        $db = Database::connect();
        $query = 'SELECT * FROM images WHERE is_preview_image = 1;';
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }

    public function add_image($url, $homeID)
    {
        $db = Database::connect();
        $query = 'INSERT INTO images (local_url, home) VALUES (:url, :homeID);';
        $statement = $db->prepare($query);
        $statement->bindValue(":homeID", $homeID);
        $statement->bindValue(":url", $url);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }

    public function set_home_preview_image($url, $homeID)
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

    public function delete_image_by_id($image_id)
    {
        $db = Database::connect();
        $query = 'DELETE FROM images WHERE images.id = :id;';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $image_id);
        $result = $statement->execute();
//        $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }

    public function add_slider($title, $local_url, $description)
    {
        $db = Database::connect();

        $query = "INSERT INTO sliders
              (description, title, local_url)
              VALUES
              (:description, :title, :local_url)";
        $statement = $db->prepare($query);
        $statement->bindValue(":title", $title);
        $statement->bindValue(":local_url", $local_url);
        $statement->bindValue(":description", $description);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }

    public function edit_slider($id, $title, $local_url, $description)
    {
        $db = Database::connect();

        $query = "UPDATE sliders
                SET
                title = :title,
                local_url = :local_url,
                description = :description
                WHERE sliders.id = :id;";
        $statement = $db->prepare($query);
        $statement->bindValue(":title", $title);
        $statement->bindValue(":local_url", $local_url);
        $statement->bindValue(":description", $description);
        $statement->bindValue(":id", $id);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }

    public function delete_slider_image($id)
    {
        $db = Database::connect();
        $query = 'DELETE FROM sliders WHERE :id = sliders.id;';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }
}