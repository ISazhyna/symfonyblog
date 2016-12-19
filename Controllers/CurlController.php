<?php
namespace Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class CurlController
{


    public static function curlController()
    {

        $url = 'http://resources.finance.ua/ru/public/currency-cash.json';
        $cURL = curl_init();
        curl_setopt($cURL, CURLOPT_URL, $url);
        curl_setopt($cURL, CURLOPT_HTTPGET, true);

        curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($cURL);
//        $result = file_get_contents($url);
        curl_close($cURL);
        $json = json_decode($result, true);
        $html = self::renderTemplate('templates/curl.php', array("json"=>$json, "result"=>$result));
        return new Response($html);
    }

    public static function test()
    {
        $url = "http://www.apilayer.net/api/live?access_key=1bc2bf61ccffa2538b5d9d44b48eaa8e&format=1";
        $cURL = curl_init();
        curl_setopt($cURL, CURLOPT_URL, $url);
        curl_setopt($cURL, CURLOPT_HTTPGET, true);
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($cURL);
//        $result = file_get_contents($url);
        curl_close($cURL);
        $json = json_decode($result, true);
//        var_dump($json);
//        var_dump($json['quotes']['USDUAH']);
        $html = self::renderTemplate('templates/test.php', array("json"=>$json));
        return new Response($html);
    }


    public static function renderTemplate($path, array $arr)
    {
        extract($arr); 
        ob_start();
        require $path;
        $html = ob_get_clean();
        return $html;
    }
}