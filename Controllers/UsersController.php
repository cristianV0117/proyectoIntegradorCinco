<?php namespace Controllers;
use Slim\Http\{Request, Response};
use Controllers\BaseController;
use Services\AreaService;
use Core\Base;
use Models\User;
use Core\MotorView as View;

class UsersController extends BaseController
{
	private $user;
	private $DB;
	private $areaService;

	public function __construct()
    {
    	$this->DB = new Base();
        $this->user = new User();
        $this->areaService = new AreaService();
    }

	public function index(Request $request, Response $response, array $args)
	{
		$sql = "SELECT 
					users.id,
					users.firstName,
					users.firstLastName,
					users.email,
					users.document,
					areas.name 
					FROM users
					INNER JOIN areas ON areas.id = users.areaId";
		$query = $this->DB->query($sql);
		if ($query["response"]->execute()) {
            $data = $query["response"]->fetchAll();
            View::view('Users/Index', $data);
        } else {
        	return $this->response('Ha ocurrido un error', 500, true, $response);
        }
	}

	public function create(Request $request, Response $response, array $args)
	{
		View::view('Users/Create', $this->areaService->allAreas());
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
		$this->user->areaId         = $post["area"];
		$this->user->status         = 1;

		if ($this->exist('users', ["document" => $this->user->data["documentUser"], "email" => $this->user->data["email"]])) {
			return $this->response("El documento y/o email ya existen", 400, true, $response);
		}
		
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

	public function edit(Request $request, Response $response, array $args)
	{
		$this->user->id = $args["id"];
		$sql = "SELECT 
					users.id,
					users.firstName, 
					users.secondName, 
					users.firstLastName, 
					users.secondLastName, 
					users.document, 
					users.email,
					areas.id as areaId,
					areas.name
					FROM users 
					INNER JOIN areas ON areas.id = users.areaId
					WHERE users.id = :id";
		$query = $this->DB->query($sql);
		$query['response']->bindParam(':id', $this->user->data["id"]);
		if ($query['response']->execute()) {
			$data = $query["response"]->fetchAll();
			View::view('Users/Edit', [$data, $this->areaService->allAreas()]);
		} else {
			return $this->response('Ha ocurrido un error', 500, true, $response);
		}
	}

	public function update(Request $request, Response $response, array $args): Response
	{
		$post = $request->getParsedBody();
		$this->user->firstName      = $post["firstName"];
		$this->user->secondName     = $post["secondName"];
		$this->user->firstLastName  = $post["firstLastName"];
		$this->user->secondLastName = $post["secondLastName"];
		$this->user->documentUser   = $post["documentUser"];
		$this->user->email          = $post["email"];
		$this->user->areaId         = $post["area"];
		$this->user->id = $args["id"];
		if ($this->exist('users', ["document" => $this->user->data["documentUser"], "email" => $this->user->data["email"]])) {
			return $this->response("El documento y/o email ya existen", 400, true, $response);
		}
		$sql = "UPDATE users SET 
					firstName = :firstName, 
					secondName = :secondName, 
					firstLastName = :firstLastName, 
					secondLastName = :secondLastName, 
					document = :document, 
					email = :email,
					areaId = :areaId
				WHERE id = :id";
		$query = $this->DB->query($sql);
		$query['response']->bindParam(':firstName', $this->user->data["firstName"]);
		$query['response']->bindParam(':secondName', $this->user->data["secondName"]);
		$query['response']->bindParam(':firstLastName', $this->user->data["firstLastName"]);
		$query['response']->bindParam(':secondLastName', $this->user->data["secondLastName"]);
		$query['response']->bindParam(':document', $this->user->data["documentUser"]);
		$query['response']->bindParam(':email', $this->user->data["email"]);
		$query['response']->bindParam(':areaId', $this->user->data["areaId"]);
		$query['response']->bindParam(':id', $this->user->data["id"]);
		if ($query['response']->execute()) {
			return $this->response("Se ha editado correctamente", 201, false, $response);
		} else {
			return $this->response('Ha ocurrido un error', 500, true, $response);
		}
	}

	public function destroy(Request $request, Response $response, array $args): Response
	{
		$this->user->id = $args["id"];
		$sql = "DELETE FROM users WHERE id = :id";
		$query = $this->DB->query($sql);
		$query['response']->bindParam(':id', $this->user->data["id"]);
		if ($query['response']->execute()) {
			return $this->response("Se ha eliminado el registro", 200, false, $response);
		} else {
			return $this->response('Ha ocurrido un error', 500, true, $response);
		}
	}

	public function __destruct()
	{
		$this->DB = null;
		$this->user = null;
		$this->areaService = null;
	}
}