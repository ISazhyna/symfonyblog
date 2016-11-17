<?php
namespace Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Models\User;

class UserController
{
    public static function listUserAction($afterDelete = false)
    {
        $sql = '';
        $users = User::getAllUsers($sql);
        $html = self::renderTemplate('templates/user/list.php', array('users' => $users, 'deleteMessage' => $afterDelete));
        return new Response($html);
    }

    public static function addNewUserAction()
    {
        $html = self::renderTemplate('templates/user/form.php', array());
        return new Response($html);
    }

    public static function saveNewUserAction($afterUpdate = 2)
    {
        $userParams = $_POST;
        User::addNewUser($userParams);  // return $result as query
        $html = self::renderTemplate('templates/user/show.php', array('user' => $userParams, 'showMessage' => $afterUpdate));   // create associated array wtih two keys 'user' and 'showMessage'
        return new Response($html);
    }

    public static function showUserAction($id, $afterUpdate = 0)
    {
        $user = User::getUserById($id);
        $html = self::renderTemplate('templates/user/show.php', array('user' => $user, 'showMessage' => $afterUpdate));
        return new Response($html);

    }

    public static function deleteUserAction($id)
    {
        User::deleteUser($id);
        return self::listUserAction(true);

    }

    public static function renderTemplate($path, array $args)
    {
        extract($args); //возвращает массив $posts или $post в зависимости от экшна
        ob_start();
        require $path;
        $html = ob_get_clean();
        return $html;
    }


}