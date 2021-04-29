<?php namespace Controllers;

class UsersController
{
	private $index = "SELECT * FROM users";

	public function index(Request $request, Response $response, array $args): Response
	{
		return $response;
	}

	public function store(Request $request, Response $response, array $args): Response
	{
		return $response;
	}
}