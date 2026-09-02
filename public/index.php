<?php 

declare(strict_types=1);

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


if ($method === 'GET' && $uri === '/') {
    echo "Page d'accueil";
} elseif ($method === 'GET' && $uri === '/products') {
    echo "Liste des produits";
} else {
    http_response_code(404);
    echo "Page non trouvée";
}