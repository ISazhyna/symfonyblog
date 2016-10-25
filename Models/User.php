<?php
namespace Models;

class User
{
    public static function openDatabaseConnection()
    {
        $config = simplexml_load_file('config.xml');
        $link = new \PDO("mysql:host=$config->Host; dbname=$config->DBname", "$config->UserName");
        return $link;
    }

    function closeDatabaseConnection(&$link)
    {
        $link = null; //unset($link);
    }

    public static function getAllUsers($sql)
    {
        $link = self::openDatabaseConnection();
        $result = $link->query('SELECT id, username, email FROM User' . $sql);
        $users = array();
        while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = $row;
        }
        self::closeDatabaseConnection($link);
        return $users;
    }

    public static function getUserById($id)
    {
        $link = self::openDatabaseConnection();
        $query = 'SELECT username, email FROM USER WHERE id=:id';
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        self::closeDatabaseConnection($link);
        return $row;
    }

    public static function addNewUser(array $userParams)
    {
        $link = self::openDatabaseConnection(); //create new PDO
        $options = [
            'cost' => 12,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
        ];
        $userParams['password'] = password_hash("$userParams[password]", PASSWORD_BCRYPT, $options);
        $result = $link->query("INSERT INTO User (username, email, password) VALUES ('" . $userParams['username'] . "', '" . $userParams['email'] . "', '" . $userParams['password'] . "')");
        self::closeDatabaseConnection($link);
        return $result;
    }

    public static function deleteUser($id)
    {
        $link = self::openDatabaseConnection(); //create new PDO
        $result = $link->query("DELETE FROM User WHERE id=" . "$id");
        self::closeDatabaseConnection($link);
        return $result;
    }
}