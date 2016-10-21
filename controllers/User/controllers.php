<?php
namespace Controllers\User\Controllers;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Models\User\Model;

class Controllers
{
    public static function listUserAction($afterDelete = false)
    {
        $sql = '';
//        $users = \Symfony\Component\Serializer\Tests\Model::fromArray();   // just test of namespace
        $users = Model\Model::getAllUsers($sql);
        $html = self::renderTemplate('templates/user/list.php', array('users' => $users, 'deleteMessage' => $afterDelete));
        return new Response($html);
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