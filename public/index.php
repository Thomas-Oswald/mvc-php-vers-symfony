<?php 

declare(strict_types=1);

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


echo $method . '<br>'; 
echo $uri;