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
        $start=0;
        $count=Post::pagination();
        if (isset($_GET['qnt'])) {   // check if quantity of rows(posts) on page has been choosen
            $limit = $_GET['qnt'];
        } else {
            $limit = $count;   // if not chosen
        }
        $total=ceil($count/$limit); // quantity of pages

        if(isset($_GET['page']))
        {
            $page=$_GET['page'];
            $start=($page-1)*$limit;
        }
        $posts = Post::getAllPosts($start,$limit);
        $html = self::renderTemplate('templates/post/list.php', array('posts' => $posts, 'count'=>$count,  'total' => $total,'deleteMessage' => $afterDelete));
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


// helper function to render templates
    public static function renderTemplate($path, array $args)
    {
        extract($args); //возвращает массив $posts или $post в зависимости от экшна
        ob_start();
        require $path;
        $html = ob_get_clean();
        return $html;

    }
    public static function ajaxAction()
    {
        $post = Post::getPostById(41);
        $html =  json_encode($post);
        return new Response($html);
//        return json_encode($post);
    }

    public static function getAjaxPostContentAction($postId)
    {
        $post = Post::getPostById($postId);
        if (!empty($post)) {
            $result = array('status' => 'success', 'content' => $post['body']);
        } else {
            $result = array('status' => 'fail', 'error_message' => 'Post with id '.$postId. ' not found');
        }
        $jsonStringResult = json_encode($result);
        return new Response($jsonStringResult);
    }

public static function addNewPostAjax(){

    $postParams = $_POST;
    if (!empty($postParams['title']) && !empty($postParams['body'])) {
        $result = array('status' => 'success', 'message'=>'Added');
    } else {
        $result = array('status' => 'failed', 'message' => 'Fields are empty');
        exit($result['message']);
    }
    Post::addNewPost($postParams);
    $jsonStringResult = json_encode($result);
    return new Response($jsonStringResult);

}
}
