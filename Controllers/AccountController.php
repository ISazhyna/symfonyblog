<?php
namespace Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Models\Account;

class AccountController
{
    static $error = '';

    public static function loginAction()
    {
        if (isset($_POST['submit'])) {
            if (empty($_POST['username']) || empty($_POST['password'])) {
                static::$error = "Username or Password is empty";
            } else {
                // Define $username and $password
                $username = $_POST['username'];
                $password = $_POST['password'];
                $rememberme = $_POST['checkbox'];  //checkbox
                // Establishing Connection with Server by passing server_name, user_id and password as a parameter
//                $link = Account::openDatabaseConnection();
                $username = stripslashes($username); // из формы
                $password = stripslashes($password); // из формы
                $row =Account::connectDB($username); // извлекаем данные из БД в виде массива соответствующей строки array('username' => 'username', 'password' => 'password');
                if ($row)
                {
                    $passwordDB = $row['password'];
                    if (password_verify($password, $passwordDB)) {
                         if($rememberme == 'Yes' && !isset($_COOKIE['username']) )
                        {
                            setcookie("username",$username,time()+60); //1min expiration time
                         }
                        $_SESSION['login_user'] = $username; // Initializing Session
                        header("Location:  ".$_SERVER['HTTP_REFERER']."");   // redirect to the previous page
                        exit();
                    } else {
                        static::$error = "Username or Password not match";
                    }
                } else {
                    static::$error = "Username or Password not match";
                }
                Account::closeDatabaseConnection($link);
            }
        }

        $html = self::renderTemplate('templates/login/form.php', array('error' => static::$error));
        return new Response($html);
    }


    public static function logoutAction()
    {
        unset($_SESSION['login_user']);
        $_COOKIE['username']=null;
        header("Location: /");
        exit();
    }

    public static function renderTemplate($path, array $args)
    {
        extract($args);
        ob_start();
        require $path;
        $html = ob_get_clean();
        return $html;

    }
}