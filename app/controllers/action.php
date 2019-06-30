<?php 
require '../core/bootstrap.php';

if (Input::exists() && isset($_GET['edit'])) {
	$crud->editupdate(Input::get('todoedit'), $_GET['edit']);
	header("Refresh:1; url=todo");
} else if (Input::exists() && isset($_GET['delete'])){
	$id = $_GET['delete'];
	$crud->delete('todo', $id);
	header("Refresh:1; url=todo");
}

require '../app/views/action.view.php';
 ?>