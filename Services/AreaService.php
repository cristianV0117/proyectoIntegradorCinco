<?php namespace Services;
use Core\Base;
class AreaService
{
	private $DB;

    public function __construct()
    {
        $this->DB = new Base();
    }

    public function allAreas()
    {
        $status = 1;
        $sql = "SELECT * FROM areas WHERE status = :status";
        $query = $this->DB->query($sql);
        $query['response']->bindParam(':status', $status);
        if ($query["response"]->execute()) {
            $response = $query["response"]->fetchAll();
            return $response;
        } else {
            return array("error" => true, "message" => "Ha ocurrido error");
        }
    }
}