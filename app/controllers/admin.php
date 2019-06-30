<?php 
require '../core/bootstrap.php';
if (!(Session::exists('id') && Session::exists('group') && Session::get('group') == 2)) {
	Header("Location:http://localhost/public/");
	exit();
} 
if (Input::exists() && isset($_POST['submit']) && isset($_POST['title'])) {
	$querybuilder->update('title', Input::get('title'));
} else if (Input::exists() && isset($_POST['submit']) && isset($_POST['logo'])) {
	$querybuilder->update('logo', Input::get('logo'));
} 

require '../app/views/admin.view.php';
 ?>