<?php namespace Controllers;
use Slim\Http\{Request, Response};
use Controllers\BaseController;
use Core\MotorView as View;

class UsersController
{
	private $index = "SELECT * FROM users";

	public function index(Request $request, Response $response, array $args)
	{
		View::view('Users/Index', null);
	}

	public function create(Request $request, Response $response, array $args)
	{
		View::view('Users/Create', null);
	}

	public function store(Request $request, Response $response, array $args): Response
	{
		return $response;
	}
}