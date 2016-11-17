<?php
namespace Controllers;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Models\Post;

class PostController
{
    /**
     * @return Response
     */
    public static function listAction($afterDelete = false)
    {
        $sql = '';
        $posts = Post::getAllPosts($sql);
        $html = self::renderTemplate('templates/post/list.php', array('posts' => $posts, 'deleteMessage' => $afterDelete));
        return new Response($html);
    }

    /**
     * $afterUpdate it's flag
     * @param int $id
     * @return Response
     */
    public static function showAction($id, $afterUpdate = 0)
    {
        $post = Post::getPostById($id);
        $html = self::renderTemplate('templates/post/show.php', array('post' => $post, 'showMessage' => $afterUpdate));
        return new Response($html);

    }

    /**
     * @return Response
     */
    public static function more3Action()
    {
        $sql = ' Where id>3';
        $posts = Post::getAllPosts($sql);
        $html = self::renderTemplate('templates/post/list.php', array('posts' => $posts));
        return new Response($html);
    }

    /**
     * Method description
     *
     * @return Response
     */
    public static function less3Action()
    {
        $sql = ' Where id<=3';
        $posts = Post::getAllPosts($sql);
        $html = self::renderTemplate('templates/post/list.php', array('posts' => $posts));
        return new Response($html);
    }

    public static function createPostAction()
    {
        $html = self::renderTemplate('templates/post/form.php', array());
        return new Response($html);
    }

    public static function saveNewPostAction($afterUpdate = 2)
    {
        $postParams = $_POST;
        Post::addNewPost($postParams);
        $html = self::renderTemplate('templates/post/show.php', array('post' => $postParams, 'showMessage' => $afterUpdate));
        return new Response($html);
    }

    public static function deleteAction()
    {
        Post::deletePost();
        return self::listAction(true);
    }

    /**
     * @param $id
     * @return Response
     */
    public static function editAction($id)
    {
        $post = Post::getPostById($id);
        $html = self::renderTemplate('templates/post/edit.php', array('post' => $post));
        return new Response($html);
    }

    public static function updatePostAction()
    {
        $postParams = $_POST;
        Post::editOldPost($postParams);
        return self::showAction($postParams['getparam'], 1);
    }

    public static function addSomeStringToTextAction()
    {
        $postParams = Request;
        $postParams['body'] = 'Constant string';
        Post::editOldPost($postParams);
        $html = self::renderTemplate('templates/post/edited.php', array());
        return new Response($html);
    }

// helper function to render templates
    public static function renderTemplate($path, array $args)
    {
        extract($args); //возвращает массив $posts или $post в зависимости от экшна
        ob_start();
        require $path;
        $html = ob_get_clean();
        return $html;

    }
}
