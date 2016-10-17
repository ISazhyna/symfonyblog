<?php
use Symfony\Component\HttpFoundation\Response;
class Controller
{
   public static function list_action()
    {
        $sql = '';
        $posts = Model::get_all_posts($sql);
//    var_dump($posts);
        $html =  self::render_template('templates/list.php', array('posts' => $posts));
        return new Response($html);
    }

    public static function show_action($id)
    {
        $post = Model::get_post_by_id($id);
        $html =  self::render_template('templates/show.php', array('post' => $post));
        return new Response($html);

    }

    public static function more_action()
    {
        $sql = ' Where id>3';
        $posts = Model::get_all_posts($sql);
        $html =  self::render_template('templates/list.php', array('posts' => $posts));
        return new Response($html);
    }

public static function less_action()
    {
        $sql = ' Where id<=3';
        $posts = Model::get_all_posts($sql);
        $html =  self::render_template('templates/list.php', array('posts' => $posts));
        return new Response($html);
    }
public static function form_action()
{
    $html =  self::render_template('templates/form.php', array());
    return new Response($html);
}

    public static function action_action()
    {
        $html =  self::render_template('templates/action.php', array());
        return new Response($html);
    }
// helper function to render templates
public static function render_template($path, array $args)
    {


        extract($args); //возвращает массив $posts или $post в зависимости от экшна
//    var_dump($post);

//    foreach ($args as $key => $value) {
//        $$key = $value;
//    }

        ob_start();
        require $path;  // подтягивает templates/list.php
        $html = ob_get_clean();
        return $html;

    }
}
