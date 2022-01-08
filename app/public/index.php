<?php
require_once('../router.php');

$url = trim($_SERVER['REQUEST_URI'], '/');

if (strpos($url, '?') !== false) {
    $url = substr($url, 0, strpos($url, "?"));
}
$router = new router();
$router->route($url);

?>
