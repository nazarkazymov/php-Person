<?php 

class Database {

	private $db_host;
	private $db_name;
	private $db_user;
	private $db_password;

	private static $db;
	private $connection;

	private function __construct() {
		$db_host = '127.0.0.1';
		$db_name = 'first_db';
		$db_user = 'root';
		$db_password = '';
		$this->connection = new PDO("mysql:host=".$db_host.";dbname=".$db_name, $db_user, $db_password);
		$this->connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
	}

	public static function getConnection() {
		if (self::$db == null) {
			self::$db = new Database();
		}
		return self::$db->connection;
	}
}

?>