<?php namespace Config;
abstract class DataBase
{
    protected function dataBase()
    {
        return [
            "server" => "us-cdbr-east-03.cleardb.com",
            "dataBase" => "heroku_53981faae2b1da7",
            "user" => "bf058b6433589c",
            "pass" => "ee09700c"
        ];
    }
}