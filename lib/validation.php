<?php 

class Input 

{

	public static function exists($type = 'post') 
	//Verificare daca datele introduse sunt procesate de butonul Trimite.

	{
		switch ($type) {
			case 'post':
				return (!empty($_POST)) ? true : false;
				break;
			case 'get':
				return (!empty($_GET)) ? true : false;
				break;
			default:
				return false;
				break;
		}
	}

	public static function get($item) // Afisare input

	{
		if (isset($_POST[$item])) {

			return $_POST[$item];

		} else if (isset($_GET[$item])){

			return $_GET[$item];

		}

	}

	

}


class Validate 

{

	private $passed = false;
	private $errors = [];

	public function check($source, $items = [])

	{
		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {
				
				$value = trim($source[$item]); // Luam fiecare output in parte

				if ($rule === 'required' && empty($value)) {

					$this->addError("{$item} is required!");	

				} else if (!empty($value)) {

					switch ($rule) {
						case 'min':
							 if (strlen($value) < $rule_value) {
							 	$this->addError("{$item} must be a minimum of {$rule_value} characters..!");
							 }
							break;
						case 'max':
							 if (strlen($value) > $rule_value) {
							 	$this->addError("{$item} must be a maximum of {$rule_value} characters..!");
							 }
							break;
						case 'string':
							 if (is_numeric($value)) {
							 	$this->addError("{$item} should not be numeric!");
							 }
							break;
						case 'email':
							 if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
							 	$this->addError("You need a valid {$item} !");
							 }
							break;
					

					}
				}

			}

		}

		if (empty($this->errors)) {
			$this->passed = true; 
		}

		


	}

	private function addError($error)

	{

		$this->errors[] = $error;

	}

	public function errors()

	{
		return $this->errors;
	}

	public function passed()

	{
		return $this->passed;
	}
}