<?php 

class crud

{

	private $db;
	public $message = [];

	public function __construct($db)

	{

		$this->db = $db;

	}


	public function select($username_todo)

	{

		$data = [
			':username_todo' => $username_todo
		];
		$sql = "
		SELECT  
		@row_number :=CASE
		WHEN @todo_no = username_todo THEN @row_number + 1
		ELSE 1
		END AS num,
		@todo_no :=username_todo as username_todo,
		data, message, id
		from todo
		WHERE username_todo = :username_todo;
		";

		$result = $this->db->prepare($sql);
		$result->execute($data);

		if ($result->rowCount() > 0) {
			
			while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
				return $row;
			}
		}

		
	}

	public function insert()

	{
		$data = [
			'message' => Input::get('message'),
			'data' 	  => date("Y-m-d H:i:s"),
			'username_todo'	=> Session::get('id')
		];

		$sql = "INSERT INTO todo(message, data, username_todo) 
				VALUES(:message, :data, :username_todo)";
		$stmt = $this->db->prepare($sql);

		if($stmt->execute($data)) {
			return true;
		}

	}

	public function getid($username)

	{
		$data = [
			':username' => $username
		];
		$stmt = $this->db->prepare("SELECT id FROM todo WHERE username = :username");
		$stmt->execute($data);
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			return $row['id'];
		}

	}

	public function delete($table, $id)

	{
		$data = [
			':id' => $id
		];
		$sql = "DELETE FROM {$table} WHERE id = :id";
		$stmt = $this->db->prepare($sql);
		if($stmt->execute($data)) {
			$this->addmessage('Done !');
		}
	}


	public function selectedit($id)

	{
		$data = [
			':id' 	=> $id
		];
		$stmt = $this->db->prepare("SELECT message FROM todo WHERE id = :id");
		$stmt->execute($data);

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			return $row['message'];
		}

	}

	public function editupdate($value, $id)

	{
		$data = [
			':value'		 => $value,
			'id'			 => $id
		];
		$sql = "UPDATE todo SET message = :value WHERE id = :id";
		$stmt = $this->db->prepare($sql);
		if($stmt->execute($data)){
			return $this->addmessage('You have successfully updated');
		} 

		return true;

	}

	public function addmessage($message)

	{

		$this->message[] = $message;

	}

	public function getmessage()

	{

		return $this->message;

	}

}