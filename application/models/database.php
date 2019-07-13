<?php

class database {
	protected $db;

	/* Database settings*/
	private $host = "localhost";
	private $port = "3306";
	private $dbname = "artjoker";
	private $dbuser = "dvachevskyi";
	private $dbpassword = "";
	
	public function __construct() {
		$dsn = "mysql:host=".$this->host.";port=".$this->port.";dbname=".$this->dbname.";charset=utf8";
		$this->db = new PDO($dsn, $this->dbuser, $this->dbpassword);
	}
	public function query($sql) {
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		return $stmt;
	}
	public function row($sql) {
		$result = $this->query($sql);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	public function lastInsertId() {
		return $this->db->lastInsertId();
	}
}