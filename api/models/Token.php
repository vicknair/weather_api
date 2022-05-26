<?php

class Token {
	private $token;
	private $connection = false;
	private $usage_count = 0;

	function __construct() {
		include_once 'Database.php';
		$db = new Database();
		$this->connection = $db->getConnection();
		if (!$this->connection) {
			return [];
		}
	}

	public function authenticate($token) {
		//check if token is valid
		$this->token = $token;
		$stmt = $this->connection->prepare("SELECT usage_count FROM api_tokens WHERE token = ?");
        $stmt->execute([$token]);

        $this->usage_count = $stmt->fetchColumn();

        if (empty($this->usage_count)) {
        	return false;
        } else {
        	$this->log_token();
        	return true;
        }

	}
	
	private function log_token () {
		$stmt = $this->connection->prepare("UPDATE api_tokens SET usage_count=?, last_used_on=now() WHERE token = ?");
        $stmt->execute([(int)(1+$this->usage_count),$this->token]);
        return;
	}

	public function history() {
		return $this->connection->query("SELECT token, usage_count, DATE_FORMAT(last_used_on, '%b %d, %Y %h:%i:%s %p') as last_used_on FROM api_tokens")->fetchAll(PDO::FETCH_ASSOC);

	}
}
