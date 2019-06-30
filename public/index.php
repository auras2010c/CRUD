<?php 

require '../vendor/autoload.php';
$router = new \Bramus\Router\Router();

$router->before('GET|POST', '/login', function() {
        require '../app/controllers/login.php';

});
$router->before('GET|POST', '/', function() {
        require '../app/controllers/index.php';

});
$router->before('GET|POST', '/todo', function() {
        require '../app/controllers/todo.php';

});
$router->before('GET|POST', '/register', function() {
        require '../app/controllers/register.php';

});
$router->before('GET|POST', '/logout', function() {
        require '../app/controllers/logout.php';

});
$router->before('GET|POST', '/admin', function() {
        require '../app/controllers/admin.php';

});
$router->before('GET|POST', '/action', function() {
        require '../app/controllers/action.php';

});
$router->run();