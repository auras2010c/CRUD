<?php 
session_start();
require '../app/config.php';
require '../app/models/db.php';
require '../lib/validation.php';
require '../app/models/QueryBuilder.php';
require '../lib/hash.php';
require '../lib/User.php';
require '../lib/Session.php';
require '../app/models/crud.php';
$querybuilder = new QueryBuilder(Connection::make($config['database'])); 
$validate = new Validate();
$crud = new crud(Connection::make($config['database']));