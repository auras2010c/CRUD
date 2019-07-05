<?php 
require '../core/bootstrap.php';
if (Session::exists('id')) {
	Session::delete('id');
	Session::delete('group');
	Header('Location: login');
}