<?php namespace Models;
class Area
{
    private $id;
    private $name;

    protected function setId(int $id)
    {
        $this->id = $id;
    }

    protected function setName(String $name)
    {
        $this->name = $name;
    }

    protected function getId(): int
    {
        return $this->id;
    }

    protected function getName(): String
    {
        return $this->name;
    }
}