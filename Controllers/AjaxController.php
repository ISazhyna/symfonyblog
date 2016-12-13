<?php
namespace Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Models\Post;
use Models\User;

class AjaxController
{
    public static function getAjaxPostContentAction($postId)
    {
        $post = Post::getPostById($postId);
        if (!empty($post)) {
            $result = array('status' => 'success', 'content' => $post['body']);
        } else {
            $result = array('status' => 'fail', 'error_message' => 'Post with id ' . $postId . ' not found');
        }
        $jsonStringResult = json_encode($result);
        return new Response($jsonStringResult);
    }

    public static function addNewPostAjax()
    {

        $postParams = $_POST;

        if (!empty($postParams['title']) && !empty($postParams['body'])) {
            $result = array('status' => 'success', 'message' => 'Added');
            Post::addNewPost($postParams);
        } else {
            $result = array('status' => 'failed', 'message' => 'Fields are empty');
        }
        $jsonStringResult = json_encode($result);
        return new Response($jsonStringResult);

    }

    public static function validationNewPostAjax()
    {
        $postParams = $_POST;
        if (!isset($postParams["title"]) || !isset($postParams["body"])) {
            $result = array('status' => 'failed', 'errors' => array('params_error' => "Not enough params"));
            return new JsonResponse($result);
        }

        $errors = array();
        foreach ($postParams as $fieldName => $fieldValue) {
            if ($fieldName == "title") {
                if ($fieldValue == "") {
                    $errors[$fieldName] = "Title is empty";
                }
                if (strlen($fieldValue) > 30) {
                    $errors[$fieldName] = "Title is too long";
                }
            }
            if ($fieldName == "body") {
                if ($fieldValue == "") {
                    $errors[$fieldName] = "Text is empty";
                }
                if (strlen($fieldValue) > 100) {
                    $errors[$fieldName] = "Text is too long";
                }
            }
        }
        
        if (empty($errors)) {
            try {
                Post::addNewPost($postParams);
                $result = array('status' => 'success', 'message' => 'Added');
            } catch (\Exception $e) {
                $result = array('status' => 'failed', 'message' => 'Not added', 'errors' => array('saving_error' => $e->getMessage()));
            }
        } else {
            $result = array('status' => 'failed', 'message' => 'Not added', 'errors' => $errors);
        }
        return new JsonResponse($result);


//            if (!empty($postParams['title']) && !empty($postParams['body'])) {
//                if (strlen($postParams['title']) <= 30 && strlen($postParams['body']) <= 100) {
//                    $result = array('status' => 'success', 'message' => 'Added');
//                    Post::addNewPost($postParams);
//                } elseif (strlen($postParams['title']) > 30 && strlen($postParams['body']) > 100) {
//                    $result = array('status' => 'failed1', 'message' => 'Fields exceed', "error" => "Уменьшите поле", "prefix" => "");
//                } elseif (strlen($postParams['title']) > 30) {
//                    $result = array('status' => 'failed2', 'message' => '1 field exceeds', "error" => "Уменьшите поле", "prefix" => ".title");
//                } elseif (strlen($postParams['body']) > 100) {
//                    $result = array('status' => 'failed3', 'message' => '1 field exceeds', "error" => "Уменьшите поле", "prefix" => ".body");
//                }
//
//            } else {
//                $result = array('status' => 'failed4', 'message' => 'Fields are empty', 'error' => "Заполните поле", "prefix" => "");
//            }
//        $jsonStringResult = json_encode($result);
//        return new Response($jsonStringResult);
//
    }

    public static function deleteActionAjax($postId)
    {
        Post::deletePost();
        $result = array('message' => 'Post ' . $postId . ' was successfully deleted');
        $jsonStringResult = json_encode($result);
        return new Response($jsonStringResult);
    }

    public static function addNewUserAjax()
    {

        $userParams = $_POST;

        if (!empty($userParams['username']) && !empty($userParams['email']) && !empty($userParams['password'])) {
            $result = array('status' => 'success', 'message' => 'Added');
            User::addNewUser($userParams);
        } else {
            $result = array('status' => 'failed', 'message' => 'Fields are empty');
        }
        $jsonStringResult = json_encode($result);
        return new Response($jsonStringResult);

    }
}