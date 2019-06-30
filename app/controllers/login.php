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
		]
	]);
	if ($validate->passed()) {
		$user = new User(Connection::make($config['database']));
		if ($user->login(Input::get('username'), Hash::makehash(Input::get('password')))) {
			Session::put('id', Input::get('username'));
			Header("Location: http://localhost/public/todo");
			Session::put('group', $querybuilder->selectgroup(Session::get('id')));
		}
	}
}	  
require '../app/views/login.view.php';
 ?>