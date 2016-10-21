<?php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Controllers\User\Controllers\Controllers as UsController;

class MyRouting
{
    /**
     * @param $uri
     * @param Request $request
     * @return Response
     */
    public static function routing($uri, Request $request)
    {
        if ('/post/' === $uri or '/' === $uri) {
            $response = Controller::listAction();
            return $response;
        } elseif ('/post/show' === $uri && $request->query->has('id')) {
            $response = Controller::showAction($request->query->get('id'));
            return $response;
        } //new more and less
        elseif ('/post/more3' === $uri) {
            $response = Controller::more3Action();
            return $response;
        } elseif ('/post/less3' === $uri) {
            $response = Controller::less3Action();
            return $response;
        } elseif ('/post/form' === $uri) {
            $response = Controller::createPostAction();
            return $response;
        } elseif ('/post/save-new-post' === $uri) {
            $response = Controller::saveNewPostAction();
            return $response;
        } elseif ('/post/delete' === $uri) {
            $response = Controller::deleteAction();
            return $response;
        }
        elseif ('/post/edit' === $uri && $request->query->has('id')) {
            $response = Controller::editAction($request->query->get('id'));
            return $response;
        }
        elseif ('/post/edited' === $uri ) {
            $response = Controller::updatePostAction();
            return $response;
        }

        elseif ('/user/' === $uri ) {
            $response = UsController::listUserAction();
            return $response;
        }


        else {
            $html = '<html><body><h1>Page Not Found</h1></body></html>';
            $response = new Response($html, Response::HTTP_NOT_FOUND);
            return $response;
        }
    }
}