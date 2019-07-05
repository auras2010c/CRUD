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

		/*
		SELECT -- echivalentul in postgres 
		   product_id,
		   product_name,
		   group_id,
		   ROW_NUMBER () OVER (
		      PARTITION BY group_id
		      ORDER BY
		         product_name
		   )
		FROM
		   products;*/
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

		$sql = "INSERT INTO todo(message, data, username_todo, done) 
				VALUES(:message, :data, :username_todo, 1)";
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

	public function updatedone($value, $id, $username)

	{

		$data = [
			':value'		 => $value,
			'id'			 => $id,
			':username'		 => $username
		];
		$sql = "UPDATE todo SET done = :value WHERE id = :id AND username_todo = :username";
		$stmt = $this->db->prepare($sql);
		if($stmt->execute($data)){
			return $this->addmessage('Marked as done !');
		} 

		return true;

	}

	public function selectdone($id)

	{

		$data = [
			':username' => Session::get('id'),
			':id' 	=> $id
		];
		$stmt = $this->db->prepare("SELECT done FROM todo WHERE username_todo = :username AND id = :id");
		if($stmt->execute($data)){
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				return $row['done'];
			}
		}

	}

	public function deletelists()

	{
		$data = [
			':username' => Session::get('id')
		];
		$sql = "DELETE FROM todo WHERE username_todo = :username";
		$stmt = $this->db->prepare($sql);
		if($stmt->execute($data)) {
			$this->addmessage('Done !');
		}
	}

	public function selecttoplists()

	{
		$stmt = $this->db->prepare("
				SELECT username_todo, count(id) AS nr_todo
				FROM todo
				GROUP BY username_todo
				ORDER BY nr_todo DESC;
			");
		if($stmt->execute()){
			while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
				return $row;
			}
		}

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