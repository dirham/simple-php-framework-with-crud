<?php

    namespace apps\models;
    use database\Mysql as Db;
    abstract class Model {
    	public $conn;
        public static function getDB() {
        	$arr = new Db();
			$conn = $arr->ddb();
            $host = $conn['server'];
            $dbname = $conn['database'];
            return new \PDO("mysql:host=$host;dbname=$dbname", $conn['user'], $conn['pass']);
        }
    }