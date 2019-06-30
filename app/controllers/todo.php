<?php 

require '../core/bootstrap.php';
if (!Session::exists('id')) {
	Header("Location: 	http://localhost/public/login");
	exit();
}

if (Input::exists()) {
	$crud->insert();
} else if (isset($_GET['done'])) {
	$id = $_GET['done'];

	$crud->updatedone(2,$id,Session::get('id'));
} else if (isset($_GET['undone'])) {
	$id = $_GET['undone'];
	$crud->updatedone(1,$id,Session::get('id'));
} else if (isset($_GET['deletetodos'])) {

	$crud->deletelists();

}

require '../app/views/todo.view.php';
 ?>