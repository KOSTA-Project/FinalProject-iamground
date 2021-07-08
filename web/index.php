<?php
    require_once 'controller/FrontController.php';
    $query = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);
    $controller = new FrontController($query);
    $controller->run();
    exit;            
?>
