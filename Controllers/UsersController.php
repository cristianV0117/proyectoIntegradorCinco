<?php namespace Controllers;
use Slim\Http\{Request, Response};
use Controllers\BaseController;
use Core\Base;
use Models\User;
use Core\MotorView as View;

class UsersController extends BaseController
{
	private $user;
	private $DB;

	public function __construct()
    {
    	$this->DB = new Base();
        $this->user = new User();
    }

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
		$post = $request->getParsedBody();
		$this->user->firstName      = $post["firstName"];
		$this->user->secondName     = $post["secondName"];
		$this->user->firstLastName  = $post["firstLastName"];
		$this->user->secondLastName = $post["secondLastName"];
		$this->user->documentUser   = $post["documentUser"];
		$this->user->email          = $post["email"];
		$this->user->password       = password_hash($post["password"], PASSWORD_DEFAULT);
		$this->user->areaId         = 0;
		$this->user->status         = 1;
		$sql = "INSERT INTO users (firstName, secondName, firstLastName, secondLastName, document, email, password, areaId, status) VALUES (:firstName, :secondName, :firstLastName, :secondLastName, :document, :email, :password, :areaId, :status)";
		$query = $this->DB->query($sql);
		$query['response']->bindParam(':firstName', $this->user->data["firstName"]);
		$query['response']->bindParam(':secondName', $this->user->data["secondName"]);
		$query['response']->bindParam(':firstLastName', $this->user->data["firstLastName"]);
		$query['response']->bindParam(':secondLastName', $this->user->data["secondLastName"]);
		$query['response']->bindParam(':document', $this->user->data["documentUser"]);
		$query['response']->bindParam(':email', $this->user->data["email"]);
		$query['response']->bindParam(':password', $this->user->data["password"]);
		$query['response']->bindParam(':areaId', $this->user->data["areaId"]);
		$query['response']->bindParam(':status', $this->user->data["status"]);
		if ($query['response']->execute()) {
			return $this->response("Se ha registrado correctamente", 201, false, $response);
		} else {
			return $this->response('Ha ocurrido un error', 500, true, $response);
		}
		
	}

	public function __destruct()
	{
		$this->DB = null;
		$this->user = null;
	}
}