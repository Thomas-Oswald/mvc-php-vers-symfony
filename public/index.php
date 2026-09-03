<?php 

declare(strict_types=1);

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);

if ($method === 'GET' && $path === '/') {
    echo "Page d'accueil";
} elseif ($method === 'GET' && $path === '/products') {
    echo 'Liste des produits';

    $sort = $_GET['sort'] ?? 'id';
    echo '<br>Tri demandé : ' . htmlspecialchars($sort, ENT_QUOTES, 'UTF-8');
} elseif (
    $method === 'GET'
    && preg_match('#^/products/(\d+)$#', $path, $matches)
) {
    $id = (int) $matches[1];
    echo "Fiche du produit numéro $id";
} else {
    http_response_code(404);
    echo "Page non trouvée";
}