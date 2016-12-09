<?php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Controllers\PostController;
use Controllers\UserController;
use Controllers\AccountController;
use Controllers\AjaxController;

class MyRouting
{
//    /**
//     * @param $uri
//     * @param Request $request
//     * @return string
//     */
//    public static function session()
//    {
//        $request = Request::createFromGlobals();
//        if (!isset($_SESSION['login_user'])) {
//            $uri = '/login-form';
//        }
//        else {$uri = $request->getPathInfo();}
//        return $uri;
//    }
    /**
     * @return bool
     */
    public static function isNotLoggedIn() {
        if (!isset($_SESSION['login_user'])) {
            return true;
        } else {
            return false;
        }
    }
    public static function rememberMe() {
        if (isset($_COOKIE['username'])) {
            $_SESSION['login_user']=$_COOKIE['username'];
        }
    }

    public static function routing($uri, Request $request)
    {
        if (self::rememberMe()) {
            $uri = '/login-form';
        }

        if (self::isNotLoggedIn()) {
            $uri = '/login-form';
        }

        if ('/post' === $uri || '/' === $uri) {
            $response = PostController::listAction();
            return $response;
        } elseif ('/post/show' === $uri && $request->query->has('id')) {
            $response = PostController::showAction($request->query->get('id'));
            return $response;
        } //new more and less
        elseif ('/post/more3' === $uri) {
            $response = PostController::more3Action();
            return $response;
        } elseif ('/post/less3' === $uri) {
            $response = PostController::less3Action();
            return $response;
        } elseif ('/post/form' === $uri) {
            $response = PostController::createPostAction();
            return $response;
        } elseif ('/post/save-new-post' === $uri) {
            $response = PostController::saveNewPostAction();
            return $response;
        }

        elseif ('/post/edit' === $uri && $request->query->has('id')) {
            $response = PostController::editAction($request->query->get('id'));
            return $response;
        } elseif ('/post/edited' === $uri) {
            $response = PostController::updatePostAction();
            return $response;
        }


         elseif ('/post/get_ajax_post_content' === $uri && $request->query->has('post_id')) {
            $response = AjaxController::getAjaxPostContentAction($request->query->get('post_id'));
            return $response;
        }

        elseif ('/post/add_new_post_ajax' === $uri) {
            $response = AjaxController::addNewPostAjax();
            return $response;
        }

        elseif ('/post/add_new_post_ajax_validation' === $uri) {
            $response = AjaxController::validationNewPostAjax();
            return $response;
        }

        elseif ('/post/form_validation' === $uri) {
            $response = PostController::createPostValidAction();
            return $response;
        }

        elseif ('/post/delete' === $uri && $request->query->has('post_id')) {
            $response = AjaxController::deleteActionAjax($request->query->get('post_id'));
            return $response;
        }

        /**
         * User section
         */
        elseif ('/user/' === $uri) {
            $response = UserController::listUserAction();
            return $response;
        }
        elseif ('/user/show' === $uri && $request->query->has('id')) {
            $response = UserController::showUserAction($request->query->get('id'));
            return $response;
        }
        elseif ('/user/add-new-user' === $uri) {
            $response = UserController::addNewUserAction();
            return $response;
        }elseif ('/user/save-new-user' === $uri) {
            $response = UserController::saveNewUserAction();
            return $response;
        }
        elseif ('/user/delete' === $uri && $request->query->has('id')) {  //not obligatory check && $request->query->has('id')
            $response = UserController::deleteUserAction($request->query->get('id'));
            return $response;
        }
        elseif ('/user/edit-user' === $uri ) {
            $response = UserController::editUserAction($request->query->get('id'));
            return $response;
        }
        /**
         * login page
         */
        elseif ('/login-form' === $uri ) {
            $response = AccountController::loginAction();
            return $response;
        }
        elseif ('/logout-action' === $uri ) {
            $response = AccountController::logoutAction();
            return $response;
        }
        elseif ('/user/save-new-user-ajax' === $uri) {
            $response = AjaxController::addNewUserAjax();
            return $response;
        }
        else {
            $html = '<html><body><h1>Page Not Found</h1></body></html>';
            $response = new Response($html, Response::HTTP_NOT_FOUND);
            return $response;
        }
    }
}