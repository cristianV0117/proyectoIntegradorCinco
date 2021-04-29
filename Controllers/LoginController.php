<?php namespace Controllers;
use Slim\Http\{Request, Response};
use Controllers\BaseController;
use Core\Base;
use Models\User;
class LoginController extends BaseController
{
	private $user;
	private $DB;

	public function __construct()
    {
    	$this->DB = new Base();
        $this->user = new User();
    }

	public function login(Request $request, Response $response, array $args): Response
	{
		
		$post = $request->getParsedBody();
		$this->user->email = $post["user"];
		$this->user->password = $post["password"];
		$sql = "SELECT firstName, password FROM users WHERE email = :email";
		$query = $this->DB->query($sql);
		$query['response']->bindParam(':email', $this->user->data["email"]);
		if ($query['response']->execute()) {
			$data = $query['response']->fetchAll();
			if (!empty($data)) {
				$statusPassword = (password_verify($this->user->data["password"], $data[0]["password"])) ? true : false;
				if ($statusPassword) {
					session_start();
					$_SESSION['session'] = true;
					$_SESSION['user'] = $data[0]["firstName"];
					return $this->response($data[0]["firstName"], 200, false, $response);
				} else {
					return $this->response('email y/o contraseña incorrectos', 400, true, $response);
				}
			} else {
				return $this->response('email y/o contraseña incorrectos', 400, true, $response);
			}
				
			
		} else {
			return $this->response('LOGIN_ERR', 500, true, $response);
		}
	}

	public function out(Request $request, Response $response, array $args): Response
	{
		session_start();
		session_destroy();
		return $this->response('Adios', 200, false, $response);
	}

	public function __destruct()
	{
		$this->DB = null;
		$this->user = null;
	}
}