<?php

require_once('../config.php');
require_once('model/database.class.php');


class AdminDB
{

    public function validate_admin($user_or_email, $password)
    {
        $db = Database::connect();
        $query = "SELECT username, password, email
              FROM administrators";
        $statement = $db->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            if ($user_or_email === $user['username'] &&
                $password === $user['password']
            ) {
                return true;
            } else if ($user_or_email === $user['email'] &&
                $password === $user['password']
            ) {
                return true;
            }
        }

        return false;
    }
    public function create_admin($username, $hashed_password, $email){
        $sessionID = session_id();
        $db = Database::connect();
        $query = 'INSERT INTO administrators (username, password, email, sessionID) VALUES (:username, :password, :email, :sessionID);';
        $statement = $db->prepare($query);
        $statement->bindValue(":username", $username);
        $statement->bindValue(":password", $hashed_password);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":sessionID", $sessionID);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }
    public function delete_admin($id){
        if($id == null){ throw new Exception;}
        $db = Database::connect();
        $query = 'DELETE FROM administrators WHERE id = :id;';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }
    public function modify_admin($username, $hashed_password, $email){
        $sessionID = session_id();
        $db = Database::connect();
        $query = 'UPDATE administrators SET password = :password, email = :email WHERE administrators.username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(":username", $username);
        $statement->bindValue(":password", $hashed_password);
        $statement->bindValue(":email", $email);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }

    public function get_admin_password_hash($username)
    {
        $db = Database::connect();
        $query = "SELECT password FROM administrators WHERE :login = username;";
        $statement = $db->prepare($query);
        $statement->bindValue(':login', $username);
        $statement->execute();
        $password = $statement->fetchColumn();

        return $password;
    }

    public function get_admin_usernames()
    {
        $db = Database::connect();
        $query = "SELECT username, sessionID FROM administrators";
        $statement = $db->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    public function get_admins()
    {
        $db = Database::connect();
        $query = "SELECT * FROM administrators";
        $statement = $db->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function setSessionToken($sessionID, $username)
    {
        $db = Database::connect();
        $query = "UPDATE administrators SET sessionID = :sessionID WHERE administrators.username = :username";
        $statement = $db->prepare($query);
        $statement->bindValue(":sessionID", $sessionID);
        $statement->bindValue(":username", $username);
        $result = $statement->execute();
        return $result;
    }

    public function getSessionTokens()
    {
        $db = Database::connect();
        $query = "SELECT sessionID FROM administrators";
        $statement = $db->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function getAdminUsernameByToken($sessionID)
    {
        $db = Database::connect();
        $query = "SELECT username FROM administrators WHERE administrators.sessionID = :sessionID";
        $statement = $db->prepare($query);
        $statement->bindValue(":sessionID", $sessionID);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function getAdminByToken($sessionID)
    {
        $db = Database::connect();
        $query = "SELECT * FROM administrators WHERE administrators.sessionID = :sessionID";
        $statement = $db->prepare($query);
        $statement->bindValue(":sessionID", $sessionID);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}

?>