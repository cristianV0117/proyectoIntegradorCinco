<?php namespace Core;
use Config\Connection;
class Base extends Connection
{
    public function query($query)
    {
        $this->connection->exec("SET CHARSET utf8");
		$this->query = $this->connection->prepare($query);
		return array('response' => $this->query,'lastId' => $this->connection);
    }
}