<?php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class MyRouting
{
    /**
     * @param $uri
     * @param Request $request
     * @return Response
     */
    public static function routing($uri, Request $request)
    {
        if ('/' === $uri) {
            $response = Controller::listAction();
            return $response;
            var_dump($uri);
        } elseif ('/show' === $uri && $request->query->has('id')) {
            $response = Controller::showAction($request->query->get('id'));
            return $response;
            var_dump($uri);
        } //new more and less
        elseif ('/more3' === $uri) {
            $response = Controller::moreAction();
            return $response;
        } elseif ('/less3' === $uri) {
            $response = Controller::less_action();
            return $response;
        } elseif ('/form' === $uri) {
            $response = Controller::createPostAction();
            return $response;
        } elseif ('/fdhdfhn' === $uri) {
            $response = Controller::savePostAction();
            return $response;
        } elseif ('/delete' === $uri) {
            $response = Controller::delete_action();
            return $response;
        }
        elseif ('/edit' === $uri && $request->query->has('id')) {
            $response = Controller::edit_action($request->query->get('id'));
            return $response;
        }
        elseif ('/edited' === $uri ) {
            $response = Controller::updatePostAction();
            return $response;
        }
        else {
            $html = '<html><body><h1>Page Not Found</h1></body></html>';
            $response = new Response($html, Response::HTTP_NOT_FOUND);
            return $response;
        }
    }
}