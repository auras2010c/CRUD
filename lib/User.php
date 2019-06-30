<?php 

class User extends QueryBuilder

{
	private $pdo;


	public function __construct($conn, $user = null)

	{

		$this->pdo = $conn;

	}

	public function login($username, $password) {
		$data = [
			':username' => $username,
			':password' => $password
		];
		$sql = "SELECT * FROM users WHERE username = :username AND password = :password";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($data);
		$count = $stmt->rowCount();

		if ($count == 1) {
			return true;
		} else {
			return false;
		}
	}

}