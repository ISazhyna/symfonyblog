<?php
namespace Models;

class Post
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


    public static function getAllPosts($start,$limit)
    {

        $link = self::openDatabaseConnection(); //create new PDO
        $result = $link->query("SELECT id, title FROM post LIMIT "."$start, $limit");
        $posts = array();
        while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $posts[] = $row;
        }
        self::closeDatabaseConnection($link);
        return $posts;
    }

    public static function pagination ()
    {
        $link = self::openDatabaseConnection(); //create new PDO
        $countr = $link->query("SELECT id, title FROM post");
        $count = $countr->rowCount();
        return $count;
    }


    public static function getPostById($id)
    {

        $link = self::openDatabaseConnection();
        $query = 'SELECT created_at, title, body FROM post WHERE id=:id';
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        self::closeDatabaseConnection($link);
        return $row;

    }

    public static function addNewPost(array $postParams)
    {
        $link = self::openDatabaseConnection(); //create new PDO
        $result = $link->query("INSERT INTO Post (Title, body, created_at) VALUES ('" . $postParams['title'] . "', '" . $postParams['body'] . "', '" . date('Y-m-d H:m:s') . "')");
        self::closeDatabaseConnection($link);
        return $result;
    }

    public static function deletePost()
    {
        $link = self::openDatabaseConnection(); //create new PDO
        $result = $link->query("DELETE FROM post WHERE id=" . $_GET['post_id']);
        self::closeDatabaseConnection($link);
        return $result;
    }

    public static function editOldPost(array $postParams)
    {
       $link = self::openDatabaseConnection(); //create new PDO
        $result = $link->query("UPDATE Post SET Title='" . $postParams['title'] . "', body='" . $postParams['body'] . "' WHERE id=" . $postParams['getparam']);
//        self::closeDatabaseConnection($link);
        return $result;
    }
}
