<?php

// model.php
class Model
{
    public static function open_database_connection()
    {
        $link = new PDO("mysql:host=localhost;dbname=blog_db", 'root');
        return $link;
    }

    function close_database_connection(&$link)
    {
        $link = null; //unset($link);
    }


    public static function get_all_posts($sql)
    {
        $link = self::open_database_connection(); //create new PDO
        $result = $link->query('SELECT id, title FROM post' . $sql);
        $posts = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = $row;
        }
        self::close_database_connection($link);
        return $posts;
    }


    public static function get_post_by_id($id)
    {
        $link = self::open_database_connection();
        $query = 'SELECT created_at, title, body FROM post WHERE id=:id';
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        self::close_database_connection($link);
        return $row;

    }

    public static function add_new_post()
    {
        $link = self::open_database_connection(); //create new PDO
        $result = $link->query("INSERT INTO Post (Title, body, created_at) VALUES ('".$_POST['title']."', '".$_POST['body']."', '".$_POST['created_at']."')");
       self::close_database_connection($link);
        return $result;
    }

    public static function delete_post()
    {
        $link = self::open_database_connection(); //create new PDO
        $result = $link->query("DELETE FROM post WHERE id=" . $_GET['id']);
        self::close_database_connection($link);
        return $result;
    }
    public static function edit_old_post(array $postParams)
    {
        $link = self::open_database_connection(); //create new PDO
//        var_dump("UPDATE Post SET Title='".$postParams['title']."', body='".$postParams['body']."' WHERE id=".$postParams['getparam']);
//        exit;
        $result = $link->query("UPDATE Post SET Title='".$postParams['title']."', body='".$postParams['body']."' WHERE id=".$postParams['getparam']);
        self::close_database_connection($link);
        return $result;
    }
}
