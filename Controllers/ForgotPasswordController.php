<?php namespace Controllers;
use Slim\Http\{Request, Response};
use Controllers\BaseController;
use Core\{Base, MotorView as View};
class ForgotPasswordController extends BaseController
{
	public function index()
	{
		View::view('ForgotPassword/Index', null);
	}
}