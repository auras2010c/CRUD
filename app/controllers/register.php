<?php 
require '../core/bootstrap.php';
if (Input::exists()) {
	$validation = $validate->check($_POST, [
		'username'		=> [
			'required'  => true,
			'min' 		=> 5,
			'max'		=> 25
		],

		'password'		=> [
			'required'  => true,
			'min' 		=> 5,
			'max'		=> 55
		],

		'name'			=> [
			'required'  => true,
			'min' 		=> 4,
			'max'		=> 30,
			'string'	=> true
		],

		'email'			=> [
			'required'  => true,
			'min'		=> 5,
			'max'		=> 55,
			'email'		=> true
		]
	]);
	if ($validate->passed()) {
		$data = [
			':username' => htmlspecialchars(Input::get('username')),
			':password' => htmlspecialchars(Hash::makehash(Input::get('password'))),
			':name' => htmlspecialchars(Input::get('name')),
			':email' => htmlspecialchars(Input::get('email')),
			':joined' => htmlspecialchars(date('Y-m-d H:i:s')),
			':groupp' => htmlspecialchars(1)
		];
		$querybuilder->insert($data);
	}
}


require '../app/views/register.view.php';
?>