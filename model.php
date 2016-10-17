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
        var_dump($row);
    }
}
