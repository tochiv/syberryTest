<?php

namespace core;

class Database extends \PDO
{
    public function __construct()
    {
        global $config;

        try {
            parent::__construct('mysql:host='.$config['host'].';dbname='.$config['dbname'].';charset='.$config['charset'],
                $config['dbuser'],$config['dbpass']);
        }
        catch(\PDOException $e) {
            echo "ОШИБКА ПОДКЛЮЧЕНИЯ К БД\n";
            echo $e->getMessage();
        }
    }
}

