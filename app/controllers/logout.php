<?php 
require '../core/bootstrap.php';
if (Session::exists('id')) {
	Session::delete('id');
	Header('Location: login');
}