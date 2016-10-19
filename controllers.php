<?php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class Controller
{
    /**
     * @return Response
     */
    public static function listAction()
    {
        $sql = '';
        $posts = Model::get_all_posts($sql);
//    var_dump($posts);
        $html = self::render_template('templates/list.php', array('posts' => $posts));
        return new Response($html);
    }

    /**
     * @param int $id
     * @return Response
     */
    public static function showAction($id, $afterUpdate = false)
    {
        $post = Model::get_post_by_id($id);
        $html = self::render_template('templates/show.php', array('post' => $post, 'showUpdateMessage' => $afterUpdate));
        return new Response($html);

    }

    /**
     * @return Response
     */
    public static function moreAction()
    {
        $sql = ' Where id>3';
        $posts = Model::get_all_posts($sql);
        $html = self::render_template('templates/list.php', array('posts' => $posts));
        return new Response($html);
    }

    /**
     * Method description
     *
     * @return Response
     */
    public static function less_action()
    {
        $sql = ' Where id<=3';
        $posts = Model::get_all_posts($sql);
        $html = self::render_template('templates/list.php', array('posts' => $posts));
        return new Response($html);
    }

    public static function createPostAction()
    {
        $html = self::render_template('templates/form.php', array());
        return new Response($html);
    }

    public static function savePostAction()
    {
        Model::add_new_post();
        $html = self::render_template('templates/action.php', array());
        return new Response($html);
    }

    public static function delete_action()
    {
        $html = self::render_template('templates/delete.php', array());
        return new Response($html);
    }

    /**
     * @param $id
     * @return Response
     */
    public static function edit_action($id)
    {
        $post = Model::get_post_by_id($id);
        $html = self::render_template('templates/edit.php', array('post' => $post));
        return new Response($html);
    }

    public static function updatePostAction()
    {
        $postParams = $_POST;
        Model::edit_old_post($postParams);
//        $html = self::render_template('templates/edited.php', array());
//        return new Response($html);
        return self::showAction($postParams['getparam'], true);
    }

    public static function addSomeStringToTextAction()
    {
        $postParams = Request;

        $postParams['body'] = 'Constant string';
        Model::edit_old_post($postParams);
        $html = self::render_template('templates/edited.php', array());
        return new Response($html);
    }

// helper function to render templates
    public static function render_template($path, array $args)
    {
        extract($args); //возвращает массив $posts или $post в зависимости от экшна
        ob_start();
        require $path;  // подтягивает templates/list.php
        $html = ob_get_clean();
        return $html;

    }
}
