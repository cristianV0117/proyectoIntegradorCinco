<?php namespace Controllers;
use Models\Area;
use Core\Base;
class AreasController extends Area
{
    private $DB;

    public function __construct()
    {
        $this->DB = new Base();
    }
    public function index()
    {
        $query = "SELECT * FROM areas";
        $var = $this->DB->query($query);
        if ($var["response"]->execute()) {
            $var2 = $var["response"]->fetchAll();
            print_r($var2);
        }
    }
}