<?php
require_once('../router.php');

$url = trim($_SERVER['REQUEST_URI'], '/');
$router = new router();
$router->route($url);

?>
