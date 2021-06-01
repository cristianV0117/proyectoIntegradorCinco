<?php namespace Controllers;
use Slim\Http\{Request, Response};
use Controllers\{BaseController, MailerController};
use Core\{Base, MotorView as View};
class ForgotPasswordController extends BaseController
{

	private $DB;

	public function __construct()
	{
		$this->DB = new Base();
	}

	public function index(): void
	{
		View::view('ForgotPassword/Index', null);
	}

	public function search(Request $request, Response $response, array $args): Response
	{
		$post = $request->getParsedBody();
		$sql = "SELECT email FROM users WHERE email = :email";
		$query = $this->DB->query($sql);
		$query['response']->bindParam(':email', $post["email"]);
		if ($query['response']->execute()) {
			$result = $query['response']->fetchAll();
			if (!empty($result)) {
				$mailResponse = (new MailerController())->mailFromSystem([
					'Address' => $post['email'],
					'Subject' => 'Reztablezca su password',
					'Body'    => 'Si quiere restablecer tu contraseña haz click aquí http://proyecto.integrador.local/reset-password'
 				]);
				return $this->response('Se ha enviado un mail por favor verifica tu cuenta', 200, false, $response);
			} else {
				return $this->response('No se encuentra el email en nuestro sistema', 400, true, $response);
			}
		} else {
			return $this->response('Ha ocurrido un error', 500, true, $response);
		}
	}

	public function __destruct()
	{
		$this->DB = null;
	}
}