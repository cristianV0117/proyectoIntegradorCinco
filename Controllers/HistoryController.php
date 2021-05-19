<?php namespace Controllers;
use Controllers\BaseController;
use Core\{Base, MotorView as View};
class HistoryController extends BaseController
{
	private $DB;
	private $ip;
	private $browser;
	private $so;

	public function __construct()
	{
		$this->DB      = new Base();
		$this->ip      = $this->ip();
		$this->browser = $this->browser($_SERVER['HTTP_USER_AGENT']);
		$this->so      = $this->so($_SERVER['HTTP_USER_AGENT']);
	}

	public function index()
	{
		$sql = "SELECT * FROM loginHistory";
		$query = $this->DB->query($sql);
		if ($query["response"]->execute()) {
            $data = $query["response"]->fetchAll();
            View::view('History/Index', $data);
        } else {
        	return $this->response('Ha ocurrido un error', 500, true, $response);
        }
		 
	}
	
	public function store(array $data)
	{
		$sql = "INSERT INTO loginHistory (user, type, ip, browser, so) VALUES (:user, :type, :ip, :browser, :so)";
		$query = $this->DB->query($sql);
		$query['response']->bindParam(':user', $data["user"]);
		$query['response']->bindParam(':type', $data["type"]);
		$query['response']->bindParam(':ip', $this->ip);
		$query['response']->bindParam(':browser', $this->browser);
		$query['response']->bindParam(':so', $this->so);
		if ($query['response']->execute()) {
			return true;
		}
	}

	public function __destruct()
	{
		$this->DB = null;
		$this->ip = null;
		$this->browser = null;
		$this->so = null;
	}
}