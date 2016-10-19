<?php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class Controller
{
    /**
     * @return Response
     */
    public static function listAction($afterDelete = false)
    {
        $sql = '';
        $posts = Model::getAllPosts($sql);
        $html = self::renderTemplate('templates/list.php', array('posts' => $posts, 'showDeleteMessage'=>$afterDelete));
        return new Response($html);
    }

    /**
     * $afterUpdate it's flag
     * @param int $id
     * @return Response
     */
    public static function showAction($id, $afterUpdate = false)
    {
        $post = Model::getPostById($id);
        $html = self::renderTemplate('templates/show.php', array('post' => $post, 'showUpdateMessage' => $afterUpdate));
        return new Response($html);

    }

    /**
     * @return Response
     */
    public static function moreAction()
    {
        $sql = ' Where id>3';
        $posts = Model::getAllPosts($sql);
        $html = self::renderTemplate('templates/list.php', array('posts' => $posts));
        return new Response($html);
    }

    /**
     * Method description
     *
     * @return Response
     */
    public static function lessAction()
    {
        $sql = ' Where id<=3';
        $posts = Model::getAllPosts($sql);
        $html = self::renderTemplate('templates/list.php', array('posts' => $posts));
        return new Response($html);
    }

    public static function createPostAction()
    {
        $html = self::renderTemplate('templates/form.php', array());
        return new Response($html);
    }

    public static function savePostAction()
    {
        Model::addNewPost();
        $html = self::renderTemplate('templates/action.php', array());
        return new Response($html);
    }

    public static function deleteAction()
    {
        Model::deletePost();
        return self::listAction(true);
    }

    /**
     * @param $id
     * @return Response
     */
    public static function editAction($id)
    {
        $post = Model::getPostById($id);
        $html = self::renderTemplate('templates/edit.php', array('post' => $post));
        return new Response($html);
    }

    public static function updatePostAction()
    {
        $postParams = $_POST;
        Model::editOldPost($postParams);
        return self::showAction($postParams['getparam'], true);
    }

    public static function addSomeStringToTextAction()
    {
        $postParams = Request;
        $postParams['body'] = 'Constant string';
        Model::editOldPost($postParams);
        $html = self::renderTemplate('templates/edited.php', array());
        return new Response($html);
    }

// helper function to render templates
    public static function renderTemplate($path, array $args)
    {
        extract($args); //возвращает массив $posts или $post в зависимости от экшна
        ob_start();
        require $path;  // подтягивает templates/list.php
        $html = ob_get_clean();
        return $html;

    }
}
