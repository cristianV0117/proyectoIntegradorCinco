<?php namespace Core;
use Core\MotorView as View;
use Psr\Http\Message\{RequestInterface as Request, ResponseInterface as Response};
class Auth
{
	public function __invoke(Request $request, Response $response, $next): Response
	{
		session_start();
		if (empty($_SESSION)) {
			return $response->withRedirect('/');
		}

		$response = $next($request, $response);
        return $response;
	}
}