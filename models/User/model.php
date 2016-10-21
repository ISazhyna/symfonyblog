<?php
namespace Models\User\Model;

class Model
{
    public static function openDatabaseConnection()
    {
        $config = simplexml_load_file('config.xml');
        $link = new \PDO("mysql:host=$config->Host; dbname=$config->DBname", "$config->UserName");
        var_dump($config->Host);
        return $link;
    }

    function closeDatabaseConnection(&$link)
    {
        $link = null; //unset($link);
    }

    public static function getAllUsers($sql)
    {
        $link = self::openDatabaseConnection();
        $result = $link->query('SELECT id, user_name FROM User' . $sql);
        $users = array();
        var_dump($users);
        while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = $row;
        }
        self::closeDatabaseConnection($link);
        return $users;
    }

}