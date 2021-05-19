<?php namespace Core;
use Core\MotorView as View;
use Psr\Http\Message\{RequestInterface as Request, ResponseInterface as Response};
class AuthHome
{
	public function __invoke(Request $request, Response $response, $next): Response
	{
		session_start();
		if (!empty($_SESSION)) {
			return $response->withRedirect('/admin');
		}

		$response = $next($request, $response);
        return $response;
	}
}