<?php namespace Controllers;
use Slim\Http\Response;
abstract class BaseController
{
    protected function response($data, int $status, bool $error, Response $response): Response
    {
        $result = [
            "status" => $status,
            "error"  => $error,
            "message"=> $data
        ];
        return $response->withJson($result, $status);
    }
}