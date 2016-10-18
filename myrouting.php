<?php
use Symfony\Component\HttpFoundation\Response;

class MyRouting
{
    public static function routing($uri, $request)
    {
        if ('/' === $uri) {
            $response = Controller::list_action();
            return $response;
            var_dump($uri);
        } elseif ('/show' === $uri && $request->query->has('id')) {
            $response = Controller::show_action($request->query->get('id'));
            return $response;
            var_dump($uri);
        } //new more and less
        elseif ('/more3' === $uri) {
            $response = Controller::more_action();
            return $response;
        } elseif ('/less3' === $uri) {
            $response = Controller::less_action();
            return $response;
        } elseif ('/form' === $uri) {
            $response = Controller::form_action();
            return $response;
        } elseif ('/fdhdfhn' === $uri) {
            $response = Controller::action_action();
            return $response;
        } elseif ('/delete' === $uri) {
            $response = Controller::delete_action();
            return $response;
        } else {
            $html = '<html><body><h1>Page Not Found</h1></body></html>';
            $response = new Response($html, Response::HTTP_NOT_FOUND);
            return $response;
            var_dump($request->query->get('id'));
            var_dump($uri);
        }
    }
}