<?php 

class QueryBuilder extends Input 


{


	protected $db;
	public $successmsg = [];

	public function __construct($db)

	{

		$this->db = $db;

	}

	public function selectfetch($table, $column)

	{

		$stmt = $this->db->query("SELECT * FROM {$table}");

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			return $row[$column];
		}

	}

	public function selectusername($name)

	{
		$data = [
			':username' => $name
		];
		$stmt = $this->db->prepare("SELECT username FROM users WHERE username = :username");
		$stmt->execute($data);
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			return $row['username'];
		}

	}

	public function selectgroup($name)

	{

		$data = [
			':username' => $name
		];
		$stmt = $this->db->prepare("SELECT groupp FROM users WHERE username = :username");
		$stmt->execute($data);
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			return $row['groupp'];
		}

	}

	public function insert($data)

	{
		$sql = "INSERT INTO users(username, password, name, email, joined, groupp) 
				VALUES(:username, :password, :name, :email, :joined, :groupp)";
		$stmt = $this->db->prepare($sql);

		if($stmt->execute($data)) {
			$this->addsuccessmessage('You registered successfully !');
		}

		return true;

	}

	public function update($setcolumn, $value)

	{
		$data = [
			':value'		 => $value
		];
		$sql = "UPDATE settings SET $setcolumn = :value";
		$stmt = $this->db->prepare($sql);
		if($stmt->execute($data)){
			$this->addsuccessmessage('Your changes have been saved !');
		} 

		return true;

	}



	public function selectall($table)

	{

		$stmt = $this->db->query("SELECT * FROM {$table}");

		while ($row = $stmt->fetchAll()) {
			return $row;
		}

	}

	public function selectmarks($table, $done)

	{

		$data = [
			':username' => Session::get('id'),
			':done'		=> $done
		];
		$stmt = $this->db->prepare("SELECT * FROM {$table} WHERE username_todo = :username AND done = :done");
		$stmt->execute($data);
		while ($row = $stmt->fetchAll()) {
			return $row;
		}	

	}



	public function successmessages() 

	{

		return $this->successmsg;

	}

	public function addsuccessmessage($message) 

	{

		$this->successmsg[] = $message;

	}
}
