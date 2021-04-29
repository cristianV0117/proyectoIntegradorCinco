<?php namespace Config;
abstract class DataBase
{
    protected function dataBase()
    {
        return [
            "server" => "127.0.0.1",
            "dataBase" => "test",
            "user" => "root",
            "pass" => ""
        ];
    }
}