<?php 

require '../core/bootstrap.php';
if (!Session::exists('id')) {
	Header("Location: 	http://localhost/public/login");
	exit();
}

if (Input::exists()) {
	$crud->insert();
}

require '../app/views/todo.view.php';
 ?>