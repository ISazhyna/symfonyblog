<?php
namespace Models;

class Account
{
    public static function openDatabaseConnection()
    {
        $config = simplexml_load_file('config.xml');
        $link = new \PDO("mysql:host=$config->Host; dbname=$config->DBname", "$config->UserName");
        return $link;
    }

    function closeDatabaseConnection(&$link)
    {
        $link = null;
    }

    public static function connectDB($username)
    {
        $link = self::openDatabaseConnection();
        $result = $link->query("SELECT username, password FROM USER WHERE  username='$username'");
        $row = $result->fetch(\PDO::FETCH_ASSOC);
        return $row;
    }

}